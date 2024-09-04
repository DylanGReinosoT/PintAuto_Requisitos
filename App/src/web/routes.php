<?php

use App\Controllers\RawMaterialController;
use App\Database\MysqlRawMaterialRepository;
use App\UseCases\CreateRawMaterial;
use App\UseCases\GetRawMaterial;
use App\UseCases\UpdateRawMaterial;
use App\UseCases\DeleteRawMaterial;

try {
    $pdo = new PDO('mysql:host=db;dbname=raw_materials_db', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error en la conexión a la base de datos: ' . $e->getMessage());
}

$repository = new MysqlRawMaterialRepository($pdo);
$controller = new RawMaterialController(
    new CreateRawMaterial($repository),
    new GetRawMaterial($repository),
    new UpdateRawMaterial($repository),
    new DeleteRawMaterial($repository)
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $controller->update($_GET['id'], $_POST);
        header('Location: /src/web/views/index.php');
        exit;
    } else {
        $controller->create($_POST);
        header('Location: /src/web/views/index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $controller->delete((int)$_GET['delete']);
    header('Location: /src/web/views/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $material = $controller->get($_GET['id']);
    if ($material) {
        error_log('Material encontrado con ID: ' . $_GET['id']);
    } else {
        error_log('Material no encontrado con ID: ' . $_GET['id']);
        header('Location: /src/web/views/index.php');
        exit;
    }
}

$rawMaterials = $repository->findAll();
