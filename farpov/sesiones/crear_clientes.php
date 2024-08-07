<?php
require '../config/db.php';

// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo_documento'];
$numero_identificacion = $_POST['numero_identificacion'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$fecha_ingreso = $_POST['fecha_ingreso'];

// Consulta SQL para insertar datos
$sql = "INSERT INTO cliente (Nombre_cliente, Apellido_cliente, TipoDocumento_cliente, Numero_identificacion, Tel_cliente, Direccion_cliente, Edad_cliente, Email_cliente, Fecha_inicio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nombre, $apellido, $tipo_documento, $numero_identificacion, $telefono, $direccion, $edad, $email, $fecha_ingreso]);

// Redirige a la página de lista de clientes
header("Location: ../publico/index.php");
exit();
?>
