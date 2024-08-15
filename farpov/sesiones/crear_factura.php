<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $fec_fac = $_POST['Fecha_factura'];
    $idCliente = $_POST['Id_Cliente']; // Corregido
    $idMembresia = $_POST['Id_membresia']; // Corregido: no hay espacio extra
    $valorTotal = $_POST['valor_total'];

    // Remover el símbolo de moneda para que el valor sea numérico
    $valorTotal = str_replace('€', '', $valorTotal);

    try {
        // Obtener el valor del servicio desde la tabla membresía_de_afiliados
        $stmt = $pdo->prepare("SELECT Precio FROM membresía_de_afiliados WHERE Id_membresia = :id_membresia");
        $stmt->execute([':id_membresia' => $idMembresia]);
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($servicio) {
            $valorSer = $servicio['Precio'];
            
            // Insertar la nueva factura en la base de datos
            $sql = "INSERT INTO facturas (Fecha_factura, Id_membresia, Precio, valor_total, Id_Cliente) 
                    VALUES (:Fecha_factura, :Id_membresia, :Precio, :valor_total, :Id_Cliente)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':Fecha_factura' => $fec_fac,
                ':Id_Cliente' => $idCliente,
                ':Id_membresia' => $idMembresia,
                ':Precio' => $valorSer,
                ':valor_total' => $valorTotal
            ]);

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
