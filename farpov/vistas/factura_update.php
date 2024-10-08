<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Factura</title>
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
            width: 100%;
            max-width: 600px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
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
            width: 100%;
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
            
            var valorMembresia = parseFloat(membresiaSeleccionada.options[membresiaSeleccionada.selectedIndex].getAttribute('data-valor')) || 0;
            var valorAdicional = parseFloat(adicionalSeleccionado.options[adicionalSeleccionado.selectedIndex].getAttribute('data-valor')) || 0;
            
            var total = valorMembresia + valorAdicional;
            
            document.getElementById('Valor_Total').value = total + '€';
            document.getElementById('Precio').value = valorMembresia;
            document.getElementById('precio_adicional').value = valorAdicional;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>EDITAR FACTURA</h1>
        <?php
        // Conexión a la base de datos
        require '../config/db.php';

        // Verifica que se haya recibido un Id_factura y carga la factura
        if (isset($_GET['Id_factura'])) {
            $Id_fac = $_GET['Id_factura'];
            try {
                $stmt = $pdo->prepare("SELECT * FROM facturas WHERE Id_factura = :Id_factura");
                $stmt->execute([':Id_factura' => $Id_fac]);
                $factura = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$factura) {
                    echo "No se encontró la factura con el ID proporcionado.";
                    exit();
                }
            } catch (PDOException $e) {
                echo "Error al obtener la factura: " . htmlspecialchars($e->getMessage());
                exit();
            }
        } else {
            echo "ID de factura no proporcionado.";
            exit();
        }
        ?>

        <form action="../sesiones/factura_update.php" method="post">
            <input type="hidden" name="Id_factura" value="<?php echo htmlspecialchars($factura['Id_factura']); ?>">

            <label for="Fecha_factura">Fecha de Factura:</label>
            <input type="date" id="Fecha_factura" name="Fecha_factura" value="<?php echo htmlspecialchars($factura['Fecha_factura']); ?>" required>

            <label for="Id_Cliente">Cliente:</label>
            <select id="Id_Cliente" name="Id_Cliente" required>
                <?php
                try {
                    $stmt = $pdo->query("SELECT Id_Cliente, Nombre_cliente, Apellido_cliente FROM cliente");
                    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clientes as $cliente) {
                        $selected = $cliente['Id_Cliente'] == $factura['Id_Cliente'] ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($cliente['Id_Cliente']) . "' $selected>" . htmlspecialchars($cliente['Nombre_cliente']) . " " . htmlspecialchars($cliente['Apellido_cliente']) . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener los clientes: " . htmlspecialchars($e->getMessage());
                }
                ?>
            </select>

            <label for="Metodo_pago">Método de pago:</label>
            <select id="Metodo_pago" name="Metodo_pago" required>
                <?php
                try {
                    $stmt = $pdo->query("SELECT Metodo_pago FROM metodo_pago");
                    $metodos_pago = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($metodos_pago as $metodo) {
                        $selected = $metodo['Metodo_pago'] == $factura['Metodo_pago'] ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($metodo['Metodo_pago']) . "' $selected>" . htmlspecialchars($metodo['Metodo_pago']) . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener los métodos de pago: " . htmlspecialchars($e->getMessage());
                }
                ?>
            </select>

            <label for="Id_membresia">Membresía:</label>
            <select id="Id_membresia" name="Id_membresia" required onchange="calcularValorTotal()">
                <option value="">Seleccione una membresía</option>
                <?php
                try {
                    $stmt = $pdo->query("SELECT Id_membresia, Membresia, Precio FROM membresía_de_afiliados");
                    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($servicios as $servicio) {
                        $selected = $servicio['Id_membresia'] == $factura['Id_membresia'] ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($servicio['Id_membresia']) . "' data-valor='" . htmlspecialchars($servicio['Precio']) . "' $selected>" . htmlspecialchars($servicio['Membresia']) . " - " . htmlspecialchars($servicio['Precio']) . "€</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener los servicios: " . htmlspecialchars($e->getMessage());
                }
                ?>
            </select>

            <label for="Id_adicional">Adicional:</label>
            <select id="Id_adicional" name="Id_adicional" required onchange="calcularValorTotal()">
                <option value="">Seleccione un adicional</option>
                <?php
                try {
                    $stmt = $pdo->query("SELECT Id_adicional, Adicional, Precio_adicional FROM adicional");
                    $adicionales = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adicionales as $adicional) {
                        $selected = $adicional['Id_adicional'] == $factura['Id_adicional'] ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($adicional['Id_adicional']) . "' data-valor='" . htmlspecialchars($adicional['Precio_adicional']) . "' $selected>" . htmlspecialchars($adicional['Adicional']) . " - " . htmlspecialchars($adicional['Precio_adicional']) . "€</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener los adicionales: " . htmlspecialchars($e->getMessage());
                }
                ?>
            </select>

            <label for="Valor_Total">Valor Total:</label>
            <input type="text" id="Valor_Total" name="Valor_Total" value="<?php echo htmlspecialchars($factura['valor_total']); ?>" readonly>

            <label for="Descripcion">Descripción:</label>
            <input type="text" id="Descripcion" name="Descripcion" value="<?php echo htmlspecialchars($factura['Descripcion']); ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
