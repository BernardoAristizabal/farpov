<?php
require '../config/db.php';
$sql = "SELECT * FROM cliente";
$stmt = $pdo->query($sql);
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Depura los datos para ver la estructura
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
<a href="../vistas/crear_clientes.php">Crear Cliente</a>
<table border="1">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Email</th>
<th>Acciones</th>
</tr>
<?php foreach ($clientes as $cliente): ?>
<tr>
<td><?= $cliente['Id_Cliente'] ?></td>
<td><?= $cliente['Nombre_cliente'] ?></td>
<td><?= $cliente['Apellido_cliente'] ?></td>
<td><?= $cliente['Direccion_cliente'] ?></td>
<td><?= $cliente['Telefono_cliente'] ?></td>
<td><?= $cliente['Email_cliente'] ?></td>
<td>
<a href="../vistas/clientes_update.php?id=<?= htmlspecialchars($cliente['Id']) ?>">Editar</a>
<a href="../sesiones/clientes_eliminar.php?id=<?= htmlspecialchars($cliente['Id']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
</td>
</tr>
<?php endforeach;
?>
</table>
</body>
</html>  