<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../routes.php';

if (!isset($_GET['id'])) {
    header('Location: /src/web/views/index.php');
    exit;
}

?>

<?php include __DIR__ . '/header.php'; ?>

<div class="container mt-5">
    <h2>Editar Material Prima</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($material->getName()) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" id="description" name="description" class="form-control" value="<?= htmlspecialchars($material->getDescription()) ?>" required>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" step="0.01" class="form-control" value="<?= htmlspecialchars($material->getQuantity()) ?>" required>
        </div>

        <div class="form-group">
            <label for="unit">Unidad:</label>
            <input type="text" id="unit" name="unit" class="form-control" value="<?= htmlspecialchars($material->getUnit()) ?>" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Actualizar Material</button>
        <a href="/src/web/views/index.php" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . '/footer.php'; ?>