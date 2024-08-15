<?php
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Obtener los datos del formulario
$Id_fac = $_POST['Id_factura '];
$fec_fac = $_POST['Fecha_factura'];
// Asegúrate de que este nombre coincida con el formulario HTML
$Id_ser = $_POST['Id_membresia '];
$Valor_Total = $_POST['Valor_Total'];
$Id = $_POST['Id_Cliente'];
try {
// Actualizar la factura en la base de datos
 

$sql = "UPDATE factura SET Fecha_factura = :Fecha_factura, Id_membresia  = :Id_membresia , Valor_Total =
:Valor_Total, Id_Cliente = :Id_Cliente WHERE Id_factura  = :Id_factura ";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':Fecha_factura' => $fec_fac,
':Id_membresia ' => $Id_ser,
':Valor_Total' => $Valor_Total,
':Id_factura ' => $Id_fac, // Faltaba una coma aquí
':Id_Cliente' => $Id,
]);
// Redirigir después de la actualización exitosa
header("Location: ../publico/index_factura.php");
exit();
} catch (PDOException $e) {
echo "Error al actualizar la factura: " . $e->getMessage();
exit();
}
}
?>