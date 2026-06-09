<?php

include("../DB/conexion.php");

if($_POST) {
   $sql ="INSERT INTO usuarios
   (Nombre, email)
   VALUES (?, ?)";
   $stmt = $pdo->prepare($sql);
   $stmt->executive([$_POST['nombre'],
                     $_POST['email']]);

    header("Location: ../index.php");              

}