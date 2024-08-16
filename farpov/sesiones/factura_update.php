<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $Id_fac = $_POST['Id_factura'];
    $fec_fac = $_POST['Fecha_factura'];
    $idCliente = $_POST['Id_Cliente'];
    $idMembresia = $_POST['Id_membresia'];
    $idAdicional = $_POST['Id_adicional'];
    $valorTotal = str_replace('€', '', $_POST['Valor_Total']); // Limpiar símbolo de euro
    $fecImFac = date('Y-m-d'); // Fecha actual
    $metPago = $_POST['Metodo_pago'];
    $subTotal = $_POST['Precio'];
    $sub2Total = $_POST['precio_adicional'];
    $observaciones = $_POST['Descripcion'];

    try {
        // Actualizar la factura en la base de datos
        $sql = "UPDATE facturas SET 
            Fecha_factura = :Fecha_factura, 
            Id_Cliente = :Id_Cliente, 
            Id_membresia = :Id_membresia, 
            Id_adicional = :Id_adicional,
            Valor_Total = :Valor_Total,
            Metodo_pago = :Metodo_pago, 
            Precio = :Precio, 
            precio_adicional = :precio_adicional,
            Descripcion = :Descripcion
            WHERE Id_factura = :Id_factura";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':Fecha_factura' => $fec_fac,
            ':Id_Cliente' => $idCliente,
            ':Id_membresia' => $idMembresia,
            ':Id_adicional' => $idAdicional,
            ':Valor_Total' => $valorTotal,
            ':Metodo_pago' => $metPago,
            ':Precio' => $subTotal,
            ':precio_adicional' => $sub2Total,
            ':Descripcion' => $observaciones,
            ':Id_factura' => $Id_fac
        ]);

        // Redirigir después de la actualización exitosa
        header("Location: ../publico/index_factura.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar la factura: " . htmlspecialchars($e->getMessage());
        exit();
    }
}
?>
>>>>>>> temp-branch
