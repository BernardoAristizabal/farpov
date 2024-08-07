<?php
// Incluye el archivo de configuración de la base de datos
require '../config/db.php';

/* Esta sección es para depuración y será eliminada más adelante */

// Define la consulta SQL para seleccionar todos los registros de la tabla 'cliente'
$sql = "SELECT * FROM cliente";
// Ejecuta la consulta y guarda el resultado en la variable $stmt
$stmt = $pdo->query($sql);
// Recupera todos los registros como un arreglo asociativo
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Imprime la estructura de los datos recuperados para depuración
echo '<pre>';
print_r($clientes);
echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <!-- Enlace para crear un nuevo cliente , carpeta vista, archivo crear_clientes.php -->
    <a href="../vistas/crear_clientes.php">Crear Cliente</a>
       <table border="1">
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
            <th>F expiracion</th>
            <th>Estado de pago</th>
        </tr>
        <!-- Itera sobre cada cliente en el arreglo $clientes -->
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <!-- Imprime el ID del cliente -->
                <td><?= $cliente['Id_Cliente'] ?></td>
                <!-- Imprime el nombre del cliente -->
                <td><?= $cliente['Nombre_cliente'] ?></td>
                <!-- Imprime la apellido del cliente -->
                <td><?= $cliente['Apellido_cliente'] ?></td>
                <!-- Imprime el tipo doc del cliente -->
                <td><?= $cliente['TipoDocumento_cliente'] ?></td>
                <!-- Imprime el numero doc del cliente -->
                <td><?= $cliente['Numero_identificacion'] ?></td>
                     <!-- Imprime el telefono del cliente -->
                <td><?= $cliente['Tel_cliente'] ?></td>
                <!-- Imprime el direccion del cliente -->
                <td><?= $cliente['Direccion_cliente'] ?></td>
                <!-- Imprime la edad del cliente -->
                <td><?= $cliente['Edad_cliente'] ?></td>
                <!-- Imprime el email del cliente -->
                <td><?= $cliente['Email_cliente'] ?></td>
                <!-- Imprime el fecha inicio del cliente -->
                <td><?= $cliente['Fecha_inicio'] ?></td>
                 <!-- Imprime el fecha final del cliente -->
                 <td><?= $cliente['Fecha_expiracion'] ?></td>
                <!-- Imprime la estado de pago del cliente -->
                <td><?= $cliente['Estado_pago'] ?></td>
            

                <td>
                    <!-- Enlace para editar el cliente, pasando el ID del cliente como parámetro -->
                    <a href="../vistas/clientes_update.php?id=<?= htmlspecialchars($cliente['Id_Cliente']) ?>">Editar</a>
                    <!-- Enlace para eliminar el cliente, pasando el ID del cliente como parámetro -->
                    <!-- Se pide confirmación antes de eliminar -->
                    <a href="../sesiones/clientes_eliminar.php?id=<?= htmlspecialchars($cliente['Id_Cliente']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
