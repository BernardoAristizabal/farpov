<?php
require '../config/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM cliente WHERE Id_Cliente  = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);
header("Location: ../publico/index.php");
?>

