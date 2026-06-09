<?php
include("../DB/conexion.php");

if (!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
    die("ID de producto no válido.");
}

$id = $_POST['id'];

$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    die("Producto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>

    <form action="procesar_actualizacion.php" method="POST">

        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <label for="nombre">Nombre del producto:</label>
        <input type="text" id="nombre" name="nombre"
               value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        <br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio"
               value="<?= htmlspecialchars($producto['precio']) ?>" required>
        <br><br>

        <button type="submit">Actualizar Producto</button>

    </form>

</body>
</html>