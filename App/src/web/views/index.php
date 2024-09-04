<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$pdo = new PDO('mysql:host=localhost;dbname=raw_materials_db', 'user', 'password');
$repository = new \App\Database\MysqlRawMaterialRepository($pdo);
$controller = new \App\Controllers\RawMaterialController(
    new \App\UseCases\CreateRawMaterial($repository),
    new \App\UseCases\GetRawMaterial($repository),
    new \App\UseCases\UpdateRawMaterial($repository),
    new \App\UseCases\DeleteRawMaterial($repository)
);

$rawMaterials = $repository->findAll();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materia Prima</title>
</head>

<body>
    <h1>Gestión de Materia Prima</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Unidad</th>
        </tr>
        <?php foreach ($rawMaterials as $material): ?>
            <tr>
                <td><?= htmlspecialchars($material->getId()) ?></td>
                <td><?= htmlspecialchars($material->getName()) ?></td>
                <td><?= htmlspecialchars($material->getDescription()) ?></td>
                <td><?= htmlspecialchars($material->getQuantity()) ?></td>
                <td><?= htmlspecialchars($material->getUnit()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>