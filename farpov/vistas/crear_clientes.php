<!DOCTYPE html>
<html>
<head>
<title>Crear Cliente</title>
</head>
<body>
<h1>Crear Cliente</h1>
<form action="../sesiones/crear_clientes.php" method="post">



<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required>
<br>

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" required>
<br>

<label for="tipo_documento">Tipo de documento:</label>
<input type="text" id="tipo_documento" name="tipo_documento" required>
<br>

<label for="numero_identificacion">Número de Documento:</label>
<input type="text" id="numero_identificacion" name="numero_identificacion" required>
<br>

<label for="telefono">Teléfono:</label>
<input type="text" id="telefono" name="telefono" required>
<br>

<label for="direccion">Dirección:</label>
<input type="text" id="direccion" name="direccion" required>
<br>

<label for="edad">Edad:</label>
<input type="text" id="edad" name="edad" required>
<br>

<label for="email">Email:</label>
<input type="email" id="email" name="email" required>
<br>


<label for="fecha_ingreso">Fecha Ingreso:</label>
<input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
<br>
 


<button type="submit">Enviar</button>
</form>

</body>
</html>