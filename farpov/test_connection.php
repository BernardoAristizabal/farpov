<?php
include('config/db.php');// llamar base de datos
try {
$stmt = $pdo->query("SELECT * FROM usuarios");/*consulta sql tabla cliente, pilas en el caso de farpov tenemos clientes no usuarios*/
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "Conexión exitosa. La tabla 'cliente' contiene los siguientes 
registros:<br>";
foreach ($cliente as $cliente) {
echo " - Email: " . $cliente['email'] . "<br>";
}
} catch (PDOException $e) {
echo "Error: " . $e->getMessage(); //mensajes de error
}
?>
