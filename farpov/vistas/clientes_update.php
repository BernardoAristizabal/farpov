<?php
require '../config/db.php';
if (!isset($_GET['id']) || empty($_GET['id'])) {
die('Id del cliente no proporcionado');
}
$id = $_GET['id'];
$sql = "SELECT * FROM cliente WHERE Id_Cliente  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$cliente) {
die('Cliente no encontrado');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Cliente</title>
</head>
<body>
<h1>Editar Cliente</h1>
<form action="../sesiones/clientes_update.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['Id_Cliente']) ?>">

    <!-- Campo de entrada para mostrar y editar el nombre del cliente -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($cliente['Nombre_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar el apellido del cliente -->
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($cliente['Apellido_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar el tipo_documento del cliente -->
    <label for="tipo_documento">Tipo de Documento:</label>
    <input type="text" name="tipo_documento" id="tipo_documento" value="<?= htmlspecialchars($cliente['TipoDocumento_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar el numero_identificacion del cliente -->
    <label for="numero_identificacion">Cédula:</label>
    <input type="text" name="numero_identificacion" id="numero_identificacion" value="<?= htmlspecialchars($cliente['Numero_identificacion']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar el teléfono del cliente -->
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($cliente['Tel_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar la dirección del cliente -->
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($cliente['Direccion_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar la edad del cliente -->
    <label for="edad">Edad:</label>
    <input type="text" name="edad" id="edad" value="<?= htmlspecialchars($cliente['Edad_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar el email del cliente -->
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($cliente['Email_cliente']) ?>" required>
    <br>

    <!-- Campo de entrada para mostrar y editar la fecha de ingreso del cliente -->
    <label for="fecha_ingreso">Fecha de Ingreso:</label>
    <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?= htmlspecialchars($cliente['Fecha_inicio']) ?>" required>
    <br>

    <input type="submit" value="Actualizar">
</form>
</body>
</html>
