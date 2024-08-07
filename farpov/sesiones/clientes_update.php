<?php
require '../config/db.php'; // Incluye el archivo de configuración para la conexión a la base de datos

// Valida que todos los datos del formulario estén presentes
if (!isset($_POST['id']) || !isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['tipo_documento']) || 
!isset($_POST['numero_identificacion']) || !isset($_POST['telefono']) || !isset($_POST['direccion']) || !isset($_POST['edad']) || !isset($_POST['email']) || !isset($_POST['fecha_ingreso'])) {
    die('Datos del formulario incompletos.'); // Muestra un mensaje de error y detiene la ejecución si faltan datos
}

// Asigna los valores de los campos del formulario a variables
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo_documento'];
$numero_identificacion = $_POST['numero_identificacion'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$fecha_ingreso = $_POST['fecha_ingreso'];

// Consulta SQL para actualizar los datos del cliente en la base de datos
// vienen las tablas de la BASE de datos
$sql = "UPDATE cliente SET Nombre_cliente = ?, Apellido_cliente = ?, TipoDocumento_cliente = ?, Numero_identificacion = ?, Tel_cliente = ?, Direccion_cliente = ?, Edad_cliente = ?, Email_cliente = ?, Fecha_inicio = ? WHERE Id_Cliente = ?";

// Prepara la consulta SQL
$stmt = $pdo->prepare($sql);

try {
    // Ejecuta la consulta con los datos del formulario como parámetros
    $stmt->execute([$nombre, $apellido, $tipo_documento, $numero_identificacion, $telefono, $direccion, $edad, $email, $fecha_ingreso, $id]);
    
    // Redirige a la página principal después de la actualización
    header("Location: ../publico/index.php");
    exit(); // Termina la ejecución del script para evitar la ejecución de código adicional
} catch (PDOException $e) {
    // Captura y muestra cualquier error que ocurra durante la ejecución de la consulta
    echo 'Error: ' . $e->getMessage();
}
?>

