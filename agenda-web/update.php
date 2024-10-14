<?php
// Incluimos la conexión a la base de datos
include 'db.php';

// Verificamos si se ha proporcionado un ID de contacto a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparamos una consulta para obtener los datos del contacto con el ID proporcionado
    $stmt = $pdo->prepare("SELECT * FROM contacto WHERE id = ?");
    $stmt->execute([$id]);
    $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificamos si se encontró el contacto
    if (!$contacto) {
        die('El contacto no existe.');
    }
} else {
    die('ID de contacto no proporcionado.');
}

// Comprobamos si el formulario ha sido enviado para actualizar los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    // Preparamos una consulta para actualizar el contacto
    $sql = "UPDATE contacto 
            SET nombres = ?, apaterno = ?, amaterno = ?, genero = ?, fecha_nacimiento = ?, telefono = ?, email = ?, linkedin = ?
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombres, $apaterno, $amaterno, $genero, $fecha_nacimiento, $telefono, $email, $linkedin, $id]);

    // Redirigimos a la página principal después de la actualización
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    Editar Contacto
</header>

<div class="container">
    <!-- Formulario para editar el contacto -->
    <form method="POST" action="update.php?id=<?= $id ?>">
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" value="<?= $contacto['nombres'] ?>" required>

        <label for="apaterno">Apellido Paterno</label>
        <input type="text" name="apaterno" value="<?= $contacto['apaterno'] ?>" required>

        <label for="amaterno">Apellido Materno</label>
        <input type="text" name="amaterno" value="<?= $contacto['amaterno'] ?>">

        <label for="genero">Género</label>
        <select name="genero" required>
            <option value="M" <?= $contacto['genero'] == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $contacto['genero'] == 'F' ? 'selected' : '' ?>>Femenino</option>
        </select>

        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="<?= $contacto['fecha_nacimiento'] ?>">

        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" value="<?= $contacto['telefono'] ?>">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $contacto['email'] ?>">

        <label for="linkedin">LinkedIn</label>
        <input type="text" name="linkedin" value="<?= $contacto['linkedin'] ?>">

        <input type="submit" value="Actualizar contacto">
    </form>
</div>

<footer>
    &copy; 2024 Agenda Web
</footer>

</body>
</html>
