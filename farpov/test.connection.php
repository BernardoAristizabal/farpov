<?php
include('config/db.php');// llamar base de datos

try {
    $stmt = $pdo->query("SELECT * FROM cliente");//consulta sql tabla usuarios
    $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Conexión exitosa. La tabla 'cliente' contiene los siguientes registros:<br>";
    foreach ($cliente as $cliente) {
        echo " - Email: " . $cliente['Email_cliente'] . "<br>";
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); //mensajes de error
}
?>