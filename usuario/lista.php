<?php
include("../DB/conexion.php");

$sql = "SELECT * FROM usuarios";
$result = $pdo->query($sql);
$usuarios = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="crear.php"><button>Crear usuario</button></a>
    <table border=1>
        <tr>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Acciones</td>
        </tr>
    <?php foreach($usuarios as $u): ?>
        <tr>
        <td><?= $u['Nombre'] ?></td>
        <td><?= $u['email'] ?></td>
        <td>
            <form action="actualizar.php" method="post">
                <input type="hilden" name="id" value="<?= $u['id'] ?>">
                <input type="submit" value="Editar">
             </form>
            <button>Eliminar</button>
         </td>    
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>