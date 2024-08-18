<?php
require '../config/db.php';
// Primera consulta para obtener todas las facturas
$sql = "SELECT f.Id_factura, f.Fecha_factura, f.Fecha_impresion, c.Id_Cliente , c.Nombre_cliente,
 c.Apellido_cliente, s.Id_membresia, f.Metodo_pago, f.Precio , f.valor_total, f.Descripcion, a.Id_adicional, a.precio_adicional
FROM facturas f
JOIN cliente c ON f.Id_Cliente  = c.Id_Cliente 
JOIN adicional a ON f.Id_adicional   = a.Id_adicional  
JOIN membresía_de_afiliados s ON f.Id_membresia  = s.Id_membresia";
$stmt = $pdo->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<h1>Lista de Facturas</h1>";
echo "<a href='../vistas/crear_factura.php'>Crear Nueva Factura</a><br><br>"; //Enlace para crear una nueva factura
echo "<table border='1'>
<tr>
<th>ID Factura</th>
<th>Fecha de facturación</th>
<th>Fecha de impresión</th>
<th>Id_Cliente</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Método de pago</th>
<th>Membresía</th>
<th>Sub_Total</th>
<th>Adicionales</th>
<th>Sub2_Total</th>
<th>Valor Total</th>
<th>Observaciones</th>
<th>Acciones</th>
</tr>";

foreach ($resultado as $fila) {
    $idFac = htmlspecialchars($fila['Id_factura']); 
    $fecFac = htmlspecialchars($fila['Fecha_factura']);
    $fecImFac = htmlspecialchars($fila['Fecha_impresion']);
    $idCli = htmlspecialchars($fila['Id_Cliente']);
    $nomCli = htmlspecialchars($fila['Nombre_cliente']);
    $apeCli = htmlspecialchars($fila['Apellido_cliente']);
    $metPago = htmlspecialchars($fila['Metodo_pago']);
    $nomMem = htmlspecialchars($fila['Id_membresia']);
    $subTotal = htmlspecialchars($fila['Precio']);
    $adic = htmlspecialchars($fila['Id_adicional']);
    $sub2Total = htmlspecialchars($fila['precio_adicional']);
    $valorTotal = htmlspecialchars($fila['valor_total']);
    $observaciones = htmlspecialchars($fila['Descripcion']);
    
    echo "<tr>
    <td>" . $idFac . "</td>
    <td>" . $fecFac . "</td>
    <td>" . $fecImFac . "</td>
    <td>" . $idCli . "</td>
    <td>" . $nomCli . "</td>
    <td>" . $apeCli . "</td>
    <td>" . $metPago . "</td>
    <td>" . $nomMem . "</td>
    <td>$ " . $subTotal . "</td>
    <td>" . $adic . "</td>
    <td>$ " . $sub2Total . "</td>
    <td>$ " . $valorTotal . "</td>
    <td>" . $observaciones . "</td>
    <td>
    <a href='../vistas/factura_update.php?Id_factura=" . $idFac . "'>Editar</a> |
    <a href='../sesiones/factura_eliminar.php?Id_factura=" . $idFac . "' onclick=\"return confirm('¿Estás seguro?')\">Eliminar</a>
    </td>
    </tr>";
}



echo "</table>";
?>