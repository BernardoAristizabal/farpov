<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
 
<title>Editar Factura</title>
<script>
function calcularValorTotal() {
var servicioSeleccionado = document.getElementById('Id_membresia ');
var valorSer =
servicioSeleccionado.options[servicioSeleccionado.selectedIndex].getAttribute('data-valor');
document.getElementById('Valor_Total').value = valorSer ? valorSer + '€' : '';
}
</script>
</head>
<body>
<h1>Editar Factura</h1>
<?php
// Aquí debe estar definida la variable $factura antes de renderizar el formulario
require '../config/db.php';
// Verifica que se haya recibido un Id_fac y carga la factura
if (isset($_GET['Id_Cliente '])) {
$Id_fac = $_GET['Id_Cliente '];
try {
$stmt = $pdo->prepare("SELECT * FROM facturas WHERE Id_factura  = :Id_factura ");
$stmt->execute([':Id_factura ' => $Id_fac]);
$factura = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$factura) {
echo "No se encontró la factura con el ID proporcionado.";
exit();
}
} catch (PDOException $e) {
echo "Error al obtener la factura: " . $e->getMessage();
exit();
}
} else {
echo "ID de factura no proporcionado.";
exit();
}
?>
<form action="../sesiones/factura_update.php" method="post">
<input type="hidden" name="Id_factura " value="<?php echo $factura['Id_factura ']; ?>">
 
12
<label for="Fecha_factura">Fecha de Factura:</label>
<input type="date" id="Fecha_factura" name="Fecha_factura" value="<?php echo
$factura['Fecha_factura']; ?>" required><br><br>
<label for="Id_Cliente ">Cliente:</label>
<select id="Id_Cliente " name="Id_Cliente " required>
<?php
try {
$stmt = $pdo->query("SELECT Id_Cliente , Nombre_cliente,  FROM cliente");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($clientes as $cliente) {
$selected = $cliente['Id_Cliente '] == $factura['Id_Cliente '] ? 'selected' : '';
echo "<option value='" . $cliente['Id_Cliente '] . "' $selected>" . $cliente['Nombre_cliente,'] .
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
"</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los clientes: " . $e->getMessage();
}
?>
</select><br><br>
<label for="Id_membresia">Servicio:</label>
<select id="Id_membresia" name="Id_membresia" required onchange="calcularValorTotal()">
<option value="">Seleccione un servicio</option>
<?php
try {
$stmt = $pdo->query("SELECT Id_membresia, Membresia, Precio FROM servicios");
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($servicios as $servicio) {
$selected = $servicio['Id_membresia'] == $factura['Id_membresia'] ? 'selected' : '';
echo "<option value='" . $servicio['Id_membresia'] . "' data-valor='" .
$servicio['Precio'] . "' $selected>" . $servicio['Membresia'] . " - " . $servicio['Precio'] 
. "€</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los servicios: " . $e->getMessage();
}
?>
</select><br><br>
<label for="Valor_Total">Valor Total:</label>
 

<input type="text" id="Valor_Total" name="Valor_Total" value="<?php echo
$factura['Valor_Total']; ?>" readonly><br><br>
<button type="submit">Guardar Cambios</button>
</form>
</body>
</html>