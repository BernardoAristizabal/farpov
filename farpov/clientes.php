<?php include('includes/header.php'); ?>
<?php
// Incluye el archivo de configuración de la base de datos
require 'config/db.php';

/* Esta sección es para depuración y será eliminada más adelante */

// Define la consulta SQL para seleccionar todos los registros de la tabla 'cliente'
$sql = "SELECT * FROM cliente";
// Ejecuta la consulta y guarda el resultado en la variable $stmt
$stmt = $pdo->query($sql);
// Recupera todos los registros como un arreglo asociativo
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <table class="styled-table">
    <h1>Clientes</h1>
    <!-- Enlace para crear un nuevo cliente , carpeta vista, archivo crear_clientes.php -->
    <a href="vistas/crear_clientes.php">Crear Cliente</a>
    <style>
    body {
        height: 100%; /* Asegura que el HTML y el cuerpo ocupen toda la altura del viewport */
        margin: 0;
        color: #fff;
        text-align: center;
        font-family: Arial, sans-serif;
        background: url('imagenes/clientes.jpg') no-repeat center center fixed; /* Imagen de fondo */
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

    th, td {
        border: 2px solid grey; /* Borde de 2 píxeles de ancho alrededor de cada celda */
        padding: 10px; /* Espacio interno de 10 píxeles dentro de cada celda */
    }

    th {
        background-color: rgba(69, 218, 251, 0.8); /* Color de fondo para los encabezados */
    }

    tr:nth-child {
        background-color: rgba(255, 255, 255, 0.7); /* Color de fondo para las filas pares */
    }
</style>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo doc</th>
        <th>Num Doc</th>
        <th>Tel</th>
        <th>Dirección</th>
        <th>Edad</th>
        <th>Email</th>
        <th>F Inicio</th>
        <th>F expiración</th>
        <th>Estado de pago</th>
        <th>Acciones</th>
    </tr>
    <!-- Itera sobre cada cliente en el arreglo $clientes -->
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['Id_Cliente'] ?></td>
            <td><?= $cliente['Nombre_cliente'] ?></td>
            <td><?= $cliente['Apellido_cliente'] ?></td>
            <td><?= $cliente['TipoDocumento_cliente'] ?></td>
            <td><?= $cliente['Numero_identificacion'] ?></td>
            <td><?= $cliente['Tel_cliente'] ?></td>
            <td><?= $cliente['Direccion_cliente'] ?></td>
            <td><?= $cliente['Edad_cliente'] ?></td>
            <td><?= $cliente['Email_cliente'] ?></td>
            <td><?= $cliente['Fecha_inicio'] ?></td>
            <td><?= $cliente['Fecha_expiracion'] ?></td>
            <td><?= $cliente['Estado_pago'] ?></td>
            <td>
                <a href="vistas/clientes_update.php?id=<?= htmlspecialchars($cliente['Id_Cliente']) ?>">Editar</a>
                <a href="sesiones/clientes_eliminar.php?id=<?= htmlspecialchars($cliente['Id_Cliente']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
    <?php include('includes/footer.php');?>
</body>
</html>