<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $fec_fac = $_POST['Fecha_factura'];
<<<<<<< HEAD
    $idCliente = $_POST['Id_Cliente']; // Corregido
    $idMembresia = $_POST['Id_membresia']; // Corregido: no hay espacio extra
    $valorTotal = $_POST['valor_total'];
=======
    $idCliente = $_POST['Id_Cliente'];
    $idMembresia = $_POST['Id_membresia'];
    $valorTotal = $_POST['valor_total'];
    $fecImFac = date('Y-m-d'); // Establecer la fecha actua
    $nomCli = $_POST['Nombre_cliente'];
    $apeCli = $_POST['Apellido_cliente'];
    $metPago = $_POST['Metodo_pago'];
    $subTotal = $_POST['Precio'];
    $adic = $_POST['Id_adicional'];
    $sub2Total = $_POST['precio_adicional'];
    $observaciones = $_POST['Descripcion'];
>>>>>>> temp-branch

    // Remover el símbolo de moneda para que el valor sea numérico
    $valorTotal = str_replace('€', '', $valorTotal);

    try {
        // Obtener el valor del servicio desde la tabla membresía_de_afiliados
        $stmt = $pdo->prepare("SELECT Precio FROM membresía_de_afiliados WHERE Id_membresia = :id_membresia");
        $stmt->execute([':id_membresia' => $idMembresia]);
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD

        if ($servicio) {
            $valorSer = $servicio['Precio'];
            
            // Insertar la nueva factura en la base de datos
            $sql = "INSERT INTO facturas (Fecha_factura, Id_membresia, Precio, valor_total, Id_Cliente) 
                    VALUES (:Fecha_factura, :Id_membresia, :Precio, :valor_total, :Id_Cliente)";
=======
    
        if ($servicio) {
            $subTotal = $servicio['Precio'];
            
            // Insertar la nueva factura en la base de datos
            $sql = "INSERT INTO facturas (Fecha_factura, Id_Cliente, Id_membresia, Precio, valor_total, Fecha_impresion, Nombre_cliente, Apellido_cliente, Metodo_pago, Id_adicional, precio_adicional, Descripcion) 
                    VALUES (:Fecha_factura, :Id_Cliente, :Id_membresia, :Precio, :valor_total, :Fecha_impresion, :Nombre_cliente, :Apellido_cliente, :Metodo_pago, :Id_adicional, :precio_adicional, :Descripcion)";
>>>>>>> temp-branch
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':Fecha_factura' => $fec_fac,
                ':Id_Cliente' => $idCliente,
                ':Id_membresia' => $idMembresia,
<<<<<<< HEAD
                ':Precio' => $valorSer,
                ':valor_total' => $valorTotal
            ]);

=======
                ':Precio' => $subTotal,
                ':valor_total' => $valorTotal,
                ':Fecha_impresion' => $fecImFac,
                ':Nombre_cliente' => $nomCli,
                ':Apellido_cliente' => $apeCli,
                ':Metodo_pago' => $metPago,
                ':Id_adicional' => $adic,
                ':precio_adicional' => $sub2Total,
                ':Descripcion' => $observaciones,
            ]);
    
>>>>>>> temp-branch
            // Redirigir al usuario a la página de éxito o a la lista de facturas
            header("Location: ../publico/index_factura.php");
            exit();
        } else {
            echo "Error: La membresía seleccionada no existe.";
        }
    } catch (PDOException $e) {
        echo "Error al crear la factura: " . htmlspecialchars($e->getMessage());
    }
}
?>
