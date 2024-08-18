<?php include('includes/header.php'); ?>
<?php require 'config/db.php';
// Primera consulta para obtener todas las facturas
$sql = "SELECT f.Id_factura, f.Fecha_factura, f.Fecha_impresion, c.Id_Cliente , c.Nombre_cliente,
 c.Apellido_cliente, s.Id_membresia, f.Metodo_pago, f.Precio , f.valor_total, f.Descripcion, a.Id_adicional, a.precio_adicional
FROM facturas f
JOIN cliente c ON f.Id_Cliente  = c.Id_Cliente 
JOIN adicional a ON f.Id_adicional   = a.Id_adicional  
JOIN membresía_de_afiliados s ON f.Id_membresia  = s.Id_membresia";
$stmt = $pdo->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Facturas</title>
</head>
<body>
<table class="styled-table">
    <h1>Lista de Facturas</h1>
    <!-- Enlace para crear un nuevo cliente , carpeta vista, archivo crear_clientes.php -->
<a href='vistas/crear_factura.php'>Crear Nueva Factura</a><br><br>
<style>
    body {
        height: 100%; /* Asegura que el HTML y el cuerpo ocupen toda la altura del viewport */
        margin: 0;
        color: #fff;
        text-align: center;
        font-family: Arial, sans-serif;
        background: url('imagenes/facturacion.jpg') no-repeat center center fixed; /* Imagen de fondo */
        background-size: cover; /* Hace que la imagen cubra todo el fondo */
        display: flex;
        flex-direction: column;
    }

    table.styled-table {
        margin: 10px; /* Márgenes externos alrededor de la tabla */
        border-collapse: collapse; /* Colapsa los bordes para evitar doble borde */
        background-color: rgba(0, 0, 0, 0.7); /* Color de fondo de la tabla con transparencia */
        color: white; /* Color del texto dentro de la tabla */
        width: 100%; /* Ancho completo de la tabla */
        max-width: 1000px; /* Tamaño máximo para la tabla */
        margin: 20px auto; /* Centra la tabla horizontalmente */
        border-radius: 20px; /* Bordes redondeados */
    }

    table {
        margin: 10px; /* Márgenes externos alrededor de la tabla */
        border-collapse: collapse; /* Colapsa los bordes para evitar doble borde */
    }

    th, td {
        border: 2px solid grey; /* Borde de 2 píxeles de ancho alrededor de cada celda */
        padding: 5px; /* Espacio interno de 10 píxeles dentro de cada celda */
    }

    th {
        background-color: rgba(69,218,251); /* Color de fondo para los encabezados */
    }

    tr:nth-child {
        background-color: #f9f9f9; /* Color de fondo para las filas pares */
    }
</style>
<table>
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
</tr>
<?php foreach ($resultado as $fila): ?>
    <?php 
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
    ?>
    <tr>
        <td><?php echo $idFac; ?></td>
        <td><?php echo $fecFac; ?></td>
        <td><?php echo $fecImFac; ?></td>
        <td><?php echo $idCli; ?></td>
        <td><?php echo $nomCli; ?></td>
        <td><?php echo $apeCli; ?></td>
        <td><?php echo $metPago; ?></td>
        <td><?php echo $nomMem; ?></td>
        <td>$ <?php echo $subTotal; ?></td>
        <td><?php echo $adic; ?></td>
        <td>$ <?php echo $sub2Total; ?></td>
        <td>$ <?php echo $valorTotal; ?></td>
        <td><?php echo $observaciones; ?></td>
        <td>
            <a href='vistas/factura_update.php?Id_factura=<?php echo $idFac; ?>'>Editar</a> |
            <a href='sesiones/factura_eliminar.php?Id_factura=<?php echo $idFac; ?>' onclick="return confirm('¿Estás seguro?')">Eliminar</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
    <?php include('includes/footer.php');?>
</body>
</html>