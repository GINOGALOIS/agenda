<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// db.php: Asegúrate de incluir tu archivo de conexión a la base de datos
$host = 'localhost';
$dbname = 'agenda';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero']; // Debe ser 'M' o 'F'
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    // Preparamos una consulta para insertar el nuevo contacto
    $sql = "INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombres, $apaterno, $amaterno, $genero, $fecha_nacimiento, $telefono, $email, $linkedin]);

    // Redirigimos a la página principal después de la inserción
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    Agregar Nuevo Contacto
</header>

<div class="container">
    <!-- Formulario para agregar un nuevo contacto -->
    <form method="POST" action="create.php">
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" required>

        <label for="apaterno">Apellido Paterno</label>
        <input type="text" name="apaterno" required>

        <label for="amaterno">Apellido Materno</label>
        <input type="text" name="amaterno">

        <label for="genero">Género</label>
        <select name="genero" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>

        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento">

        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono">

        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="linkedin">LinkedIn</label>
        <input type="text" name="linkedin">

        <input type="submit" value="Agregar contacto">
    </form>
</div>

<footer>
    &copy; 2024 Agenda Web
</footer>

</body>
</html>




