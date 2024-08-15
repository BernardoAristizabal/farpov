<?php
include('config/db.php'); // Incluye el archivo de configuración de la base de datos.

$error = ''; // Variable para almacenar mensajes de error.
$success = ''; // Variable para almacenar mensajes de éxito.

// Verifica si el método de la solicitud es POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Obtiene el correo electrónico del formulario.
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Cifra la nueva contraseña.

    // Verifica que el correo electrónico y la nueva contraseña no estén vacíos.
    if (!empty($email) && !empty($new_password)) {
        // Prepara una consulta para verificar si el correo electrónico existe en la base de datos.
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]); // Ejecuta la consulta con el correo electrónico.
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado de la consulta.

        // Verifica si se encontró un usuario con ese correo electrónico.
        if ($user) {
            // Prepara una consulta para actualizar la contraseña del usuario.
            $stmt = $pdo->prepare("UPDATE usuarios SET password = :password WHERE email = :email");
            // Ejecuta la consulta con la nueva contraseña cifrada.
            if ($stmt->execute(['password' => $new_password, 'email' => $email])) {
                $success = "Contraseña actualizada correctamente."; // Mensaje de éxito si la contraseña se actualizó.
            } else {
                $error = "Error al actualizar la contraseña."; // Mensaje de error si hubo un problema al actualizar.
            }
        } else {
            $error = "El correo electrónico no existe."; // Mensaje de error si el correo electrónico no se encontró.
        }
    } else {
        $error = "Por favor, complete todos los campos."; // Mensaje de error si algún campo está vacío.
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"> <!-- Define la codificación de caracteres. -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define la configuración de la vista para dispositivos móviles. -->
<title>Recuperar Contraseña</title> <!-- Título de la página. -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluye el archivo CSS de Bootstrap. -->
<style>
body {
    background-color: #f8f9fa; /* Color de fondo para la página. */
}
.container {
    max-width: 400px; /* Ancho máximo del contenedor. */
    margin-top: 50px; /* Espacio superior para centrar el contenedor en la página. */
    padding: 20px; /* Espacio interior del contenedor. */
    background: white; /* Color de fondo del contenedor. */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra del contenedor para dar un efecto de profundidad. */
    border-radius: 10px; /* Bordes redondeados para el contenedor. */
}
</style>
</head>
<body>
<?php include('includes/header.php'); ?> <!-- Incluye el archivo de encabezado (header) de la página. -->
<div class="container">
<h2 class="text-center">Recuperar Contraseña</h2> <!-- Título principal de la página. -->
<?php if (!empty($error)): ?> <!-- Verifica si hay un mensaje de error. -->
<div class="alert alert-danger" id="error-alert">
    <?php echo $error; ?> <!-- Muestra el mensaje de error. -->
</div>
<?php endif; ?>
<?php if (!empty($success)): ?> <!-- Verifica si hay un mensaje de éxito. -->
<div class="alert alert-success" id="success-alert">
    <?php echo $success; ?> <!-- Muestra el mensaje de éxito. -->
</div>
<?php endif; ?>
<form action="recuperar_contraseña.php" method="post"> <!-- Formulario para actualizar la contraseña. -->
    <div class="form-group">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required> <!-- Campo para ingresar el correo electrónico. -->
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Nueva Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required> <!-- Campo para ingresar la nueva contraseña. -->
    </div>
    <button type="submit" class="btn btn-primary btn-block">Actualizar Contraseña</button> <!-- Botón para enviar el formulario. -->
</form>
<p class="text-center mt-3">
    <a href="index.php">Iniciar Sesión</a> <!-- Enlace para volver a la página de inicio de sesión. -->
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Incluye jQuery. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> <!-- Incluye el archivo JavaScript de Bootstrap. -->
<script>
$(document).ready(function() {
    $("#error-alert").fadeTo(2000, 500).slideUp(500, function() { // Muestra el mensaje de error y lo oculta después de 2 segundos.
        $(this).slideUp(500);
    });
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() { // Muestra el mensaje de éxito y lo oculta después de 2 segundos.
        $(this).slideUp(500);
    });
});
</script>
<?php include('includes/footer.php'); ?> <!-- Incluye el archivo de pie de página (footer) de la página. -->
</body>
</html>
