<?php
// db.php: Asegúrate de incluir tu archivo de conexión a la base de datos
include 'db.php';

// Verificar si se envió el ID del contacto a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el registro en la base de datos
    $stmt = $pdo->prepare("DELETE FROM contacto WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Redirigir a la página de inicio
        header('Location: index.php');
        exit();
    } else {
        echo "Error al eliminar el contacto.";
    }
} else {
    echo "ID no válido.";
}
?>
