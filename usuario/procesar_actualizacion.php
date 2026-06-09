<?php
include("../DB/conexion.php");

if (!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
    die("ID de usuario no válido.");
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET Nombre = ?, email = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nombre, $email, $id]);

header("Location: lista.php");
exit();
?>  