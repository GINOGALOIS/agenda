<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM contacto');
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Agenda de Contactos</h1>
    <a href="create.php" class="btn">Agregar Contacto</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>LinkedIn</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
            <tr>
                <td><?= $contacto['id'] ?></td>
                <td><?= $contacto['nombres'] ?></td>
                <td><?= $contacto['apaterno'] ?></td>
                <td><?= $contacto['amaterno'] ?></td>
                <td><?= $contacto['genero'] ?></td>
                <td><?= $contacto['fecha_nacimiento'] ?></td>
                <td><?= $contacto['telefono'] ?></td>
                <td><?= $contacto['email'] ?></td>
                <td><?= $contacto['linkedin'] ?></td>
                <td>
                    <a href="update.php?id=<?= $contacto['id'] ?>" class="btn">Editar</a>
                    <a href="delete.php?id=<?= $contacto['id'] ?>" class="btn-delete" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
