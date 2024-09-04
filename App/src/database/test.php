<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Database\MysqlRawMaterialRepository;

$pdo = new PDO('mysql:host=db;dbname=raw_materials_db', 'user', 'password');
$repository = new MysqlRawMaterialRepository($pdo);

echo "Class loaded successfully!";
