<!DOCTYPE html>
<html>
<head>
    <title>Crear Cliente</title>
    <style>
        table {
            width: 50%;
            margin: 0 auto; /* Centrará la tabla en la página */
            border-collapse: collapse;
        }   

        .container {
            max-width: 400px;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            color: white;
        }

        td {
            padding: 10px;
            border: none; /* Elimina las líneas dentro de las celdas */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, button {
            width: 90%;
            padding: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Crear Cliente</h1>
    <table border="1">
        <form action="../sesiones/crear_clientes.php" method="post">
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" id="nombre" name="nombre" required></td>
            </tr>
            <tr>
                <td><label for="apellido">Apellido:</label></td>
                <td><input type="text" id="apellido" name="apellido" required></td>
            </tr>
            <tr>
                <td><label for="tipo_documento">Tipo de documento:</label></td>
                <td><input type="text" id="tipo_documento" name="tipo_documento" required></td>
            </tr>
            <tr>
                <td><label for="numero_identificacion">Número de Documento:</label></td>
                <td><input type="text" id="numero_identificacion" name="numero_identificacion" required></td>
            </tr>
            <tr>
                <td><label for="telefono">Teléfono:</label></td>
                <td><input type="text" id="telefono" name="telefono" required></td>
            </tr>
            <tr>
                <td><label for="direccion">Dirección:</label></td>
                <td><input type="text" id="direccion" name="direccion" required></td>
            </tr>
            <tr>
                <td><label for="edad">Edad:</label></td>
                <td><input type="text" id="edad" name="edad" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="fecha_ingreso">Fecha Ingreso:</label></td>
                <td><input type="date" id="fecha_ingreso" name="fecha_ingreso" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Enviar</button>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>