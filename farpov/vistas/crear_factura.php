<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>CREAR NUEVA FACTURA</title>
<link rel="stylesheet" href="../publico/styles.css"> <!-- Asegúrate de tener un archivo CSS vinculado -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 140vh;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #333;
        margin-bottom: 20px;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    label {
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    select {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button[type="submit"] {
        padding: 10px;
        background-color: #45DAFB;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button[type="submit"]:hover {
        background-color: orange;
    }
</style>
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
<div class="container">
    <h1>Crear Nueva Factura</h1>
    <form action="../sesiones/crear_factura.php" method="post">
        <label for="Fecha_factura">Fecha de Factura:</label>
        <input type="date" id="Fecha_factura" name="Fecha_factura" required><br>

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
        </select><br>

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
        </select><br>

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
        </select><br>

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
        </select><br>

        <!-- Total -->
        <input type="hidden" id="Precio" name="Precio">
        <label for="valor_total">Valor Total:</label>
        <input type="text" id="valor_total" name="valor_total" readonly><br>

        <!-- Descripción -->
        <label for="Descripcion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion" required><br>

        <button type="submit">Crear Factura</button>
    </form>
</div>
</body>
</html>
