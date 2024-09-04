<?php

use App\Controllers\RawMaterialController;
use App\Database\MysqlRawMaterialRepository;
use App\UseCases\CreateRawMaterial;
use App\UseCases\GetRawMaterial;
use App\UseCases\UpdateRawMaterial;
use App\UseCases\DeleteRawMaterial;

$pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
$repository = new MysqlRawMaterialRepository($pdo);

$controller = new RawMaterialController(
    new CreateRawMaterial($repository),
    new GetRawMaterial($repository),
    new UpdateRawMaterial($repository),
    new DeleteRawMaterial($repository)
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $controller->create($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    echo $controller->get((int)$_GET['id']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    echo $controller->update((int)$put_vars['id'], $put_vars);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    echo $controller->delete((int)$_GET['id']);
}
