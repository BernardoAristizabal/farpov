<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear Nueva Factura</title>
<script>
function calcularValorTotal() {
    var membresiaSeleccionada = document.getElementById('Id_membresia');
    var adicionalSeleccionado = document.getElementById('Id_adicional');
    
    var valorMembresia = membresiaSeleccionada.options[membresiaSeleccionada.selectedIndex].getAttribute('data-valor') || 0;
    var valorAdicional = adicionalSeleccionado.options[adicionalSeleccionado.selectedIndex].getAttribute('data-valor') || 0;

    var total = parseFloat(valorMembresia) + parseFloat(valorAdicional);
    
    document.getElementById('Precio').value = valorMembresia;
    document.getElementById('valor_total').value = total;
}
</script>
</head>
<body>
<h1>Crear Nueva Factura</h1>
<form action="../sesiones/crear_factura.php" method="post">

<label for="Fecha_factura">Fecha de Factura:</label>
<input type="date" id="Fecha_factura" name="Fecha_factura" required><br><br>
<<<<<<< HEAD

<label for="Fecha_impresion">Fecha de Impresión:</label>
<input type="date" id="Fecha_impresion" name="Fecha_impresion" required><br><br>
=======
<!--  
<label for="Fecha_impresion">Fecha de Impresión:</label>
<input type="date" id="Fecha_impresion" name="Fecha_impresion" required><br><br>
-->
>>>>>>> temp-branch

<!-- Cliente -->
<label for="Id_Cliente">Cliente:</label>
<select id="Id_Cliente" name="Id_Cliente" required>
<?php
require '../config/db.php';
try {
    $stmt = $pdo->query("SELECT Id_Cliente, Nombre_cliente, Apellido_cliente FROM cliente");
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($clientes as $cliente) {
        echo "<option value='" . htmlspecialchars($cliente['Id_Cliente']) . "'>" . htmlspecialchars($cliente['Nombre_cliente']) . " " . htmlspecialchars($cliente['Apellido_cliente']) . "</option>";
    }
} catch (PDOException $e) {
    echo "Error al obtener los clientes: " . htmlspecialchars($e->getMessage());
}
?>
</select><br><br>

<!-- Método de pago -->
<label for="Metodo_pago">Método de Pago:</label>
<select id="Metodo_pago" name="Metodo_pago" required onchange="calcularValorTotal()">
<option value="">Seleccione método de pago</option>
<?php
try {
    $stmt = $pdo->query("SELECT Metodo_pago FROM metodo_pago");
    $metodos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($metodos as $metodo) {
        echo "<option value='" . htmlspecialchars($metodo['Metodo_pago']) . "'>" . htmlspecialchars($metodo['Metodo_pago']) . "</option>";
    }
} catch (PDOException $e) {
    echo "Error al obtener los métodos de pago: " . htmlspecialchars($e->getMessage());
}
?>
</select><br><br>

<!-- Membresía -->
<label for="Id_membresia">Membresía:</label>
<select id="Id_membresia" name="Id_membresia" required onchange="calcularValorTotal()">
<option value="">Seleccione una membresía</option>
<?php
try {
    $stmt = $pdo->query("SELECT Id_membresia, Membresia, Precio FROM membresía_de_afiliados");
    $membresias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($membresias as $membresia) {
        echo "<option value='" . htmlspecialchars($membresia['Id_membresia']) . "' data-valor='" . htmlspecialchars($membresia['Precio']) . "'>" . htmlspecialchars($membresia['Membresia']) . " - " . htmlspecialchars($membresia['Precio']) . "</option>";
    }
} catch (PDOException $e) {
    echo "Error al obtener las membresías: " . htmlspecialchars($e->getMessage());
}
?>
</select><br><br>

<!-- Adicional -->
<label for="Id_adicional">Adicional:</label>
<select id="Id_adicional" name="Id_adicional" required onchange="calcularValorTotal()">
<option value="">Seleccione un adicional</option>
<?php
try {
    $stmt = $pdo->query("SELECT Id_adicional, Adicional, Precio_adicional FROM adicional");
    $adicionales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adicionales as $adicional) {
        echo "<option value='" . htmlspecialchars($adicional['Id_adicional']) . "' data-valor='" . htmlspecialchars($adicional['Precio_adicional']) . "'>" . htmlspecialchars($adicional['Adicional']) . " - " . htmlspecialchars($adicional['Precio_adicional']) . "€</option>";
    }
} catch (PDOException $e) {
    echo "Error al obtener los adicionales: " . htmlspecialchars($e->getMessage());
}
?>
</select><br><br>

<!-- Total -->
<input type="hidden" id="Precio" name="Precio">
<label for="valor_total">Valor Total:</label>
<input type="text" id="valor_total" name="valor_total" readonly><br><br>

<<<<<<< HEAD
=======
</select><br><br>


<!-- Descripción -->
<label for="Descripcion">Descripción:</label>
<input type="text" id="Descripcion" name="Descripcion" required><br><br>




>>>>>>> temp-branch
<button type="submit">Crear Factura</button>
</form>
</body>
</html>
