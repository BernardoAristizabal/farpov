

<!---->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Factura</title>
    <script>
    function calcularValorTotal() {
        var servicioSeleccionado = document.getElementById('Membresia');
        var valorSer = servicioSeleccionado.options[servicioSeleccionado.selectedIndex].getAttribute('data-valor');
        document.getElementById('Precio').value = valorSer ? valorSer : '';
    }
    </script>
</head>
<body>
    <h1>Crear Nueva Factura</h1>
    <form action="../sesiones/crear_factura.php" method="post">
        <label for="Fecha_factura">Fecha de Factura:</label>
        <input type="date" id="Fecha_factura" name="Fecha_factura" required><br><br>
        <label for="Id_Cliente">Cliente:</label>
        <select id="Id_Cliente" name="Id_Cliente" required>
            <?php
            require '../config/db.php';
            try {
                $stmt = $pdo->query("SELECT Id_Cliente, Nombre_cliente FROM cliente");
                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($clientes as $cliente) {
                    echo "<option value='" . $cliente['Id_Cliente'] . "'>" . $cliente['Nombre_cliente'] . "</option>";
                }
            } catch (PDOException $e) {
                echo "Error al obtener los clientes: " . $e->getMessage();
            }
            ?>
        </select><br><br>
        <label for="Membresia">Membresía:</label>
        <select id="Membresia" name="Membresia" required onchange="calcularValorTotal()">
            <option value="">Seleccione una membresía</option>
            <?php
            try {
                $stmt = $pdo->query("SELECT Id_membresia, Membresia, Precio FROM membresía_de_afiliados");
                $membresias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($membresias as $membresia) {
                    echo "<option value='" . $membresia['Id_membresia'] . "' data-valor='" . $membresia['Precio'] . "'>" . $membresia['Membresia'] . " - " . $membresia['Precio'] . "€</option>";
                }
            } catch (PDOException $e) {
                echo "Error al obtener las membresías: " . $e->getMessage();
            }
            ?>
        </select><br><br>
        <!-- Campo oculto para almacenar el valor del servicio seleccionado -->
        <input type="hidden" id="Valor_ser" name="Valor_ser">
        <label for="Precio">Valor Total:</label>
        <input type="text" id="Precio" name="Precio" readonly><br><br>
        <button type="submit">Crear Factura</button>
    </form>
</body>
</html>
 <!-- -->
