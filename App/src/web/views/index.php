<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../routes.php';

include __DIR__ . '/header.php';
?>

<div class="container mt-5">
    <h2>Añadir Nuevo Material Prima</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="code">Código:</label>
            <input type="text" id="code" name="code" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" id="description" name="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" step="0.01" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="value">Valor:</label>
            <input type="number" id="value" name="value" step="0.01" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="unit">Unidad:</label>
            <input type="text" id="unit" name="unit" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Añadir Material</button>
    </form>

    <h1 class="mt-5">Gestión de Materia Prima</h1>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Unidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rawMaterials as $material): ?>
                <tr>
                    <td><?= htmlspecialchars($material->getId()) ?></td>
                    <td><?= htmlspecialchars($material->getName()) ?></td>
                    <td><?= htmlspecialchars($material->getCode()) ?></td>
                    <td><?= htmlspecialchars($material->getDescription()) ?></td>
                    <td><?= htmlspecialchars($material->getQuantity()) ?></td>
                    <td><?= htmlspecialchars($material->getValue()) ?></td>
                    <td><?= htmlspecialchars($material->getUnit()) ?></td>
                    <td><?= htmlspecialchars($material->getDate()->format('Y-m-d')) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $material->getId() ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?delete=<?= $material->getId() ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este material?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/footer.php'; ?>