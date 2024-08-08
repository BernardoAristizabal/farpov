<?php include('includes/header.php'); ?>
<?php include('config/db.php'); ?>
<?php

session_start(); // Inicia una nueva sesión o reanuda la sesión existente para manejar la información del usuario durante la navegación.

 // Incluye el archivo de configuración de la base de datos para establecer la conexión con la base de datos.

$error = ''; // Inicializa una variable para almacenar mensajes de error.

try {
    // Verifica si el método de la solicitud es POST (es decir, si se ha enviado el formulario).
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email']; // Obtiene el correo electrónico enviado desde el formulario.
        $password = $_POST['password']; // Obtiene la contraseña enviada desde el formulario.

        // Verifica que tanto el correo electrónico como la contraseña no estén vacíos.
        if (!empty($email) && !empty($password)) {
            // Prepara una consulta SQL para seleccionar el usuario cuyo correo electrónico coincide con el proporcionado.
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]); // Ejecuta la consulta con el correo electrónico proporcionado.
            $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado de la consulta en formato asociativo (un solo registro de usuario).

            // Verifica si se ha encontrado un usuario con el correo electrónico proporcionado.
            if ($user) {
                // Verifica si la contraseña proporcionada coincide con la contraseña almacenada en la base de datos.
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id']; // Almacena el ID del usuario en la sesión.
                    header("Location: test_connection.php"); // Redirige al usuario a la página de prueba de conexión después de iniciar sesión.
                    exit(); // Termina la ejecución del script para asegurarse de que no se ejecute código adicional después de la redirección.
                } else {
                    $error = "Credenciales incorrectas: la contraseña no coincide."; // Mensaje de error si la contraseña no coincide.
                }
            } else {
                $error = "Credenciales incorrectas: el correo electrónico no existe."; // Mensaje de error si el correo electrónico no se encuentra en la base de datos.
            }
        } else {
            $error = "Por favor, complete todos los campos."; // Mensaje de error si algún campo del formulario está vacío.
        }
    }
} catch (PDOException $e) {
    $error = "Error de base de datos: " . $e->getMessage(); // Mensaje de error en caso de una excepción relacionada con la base de datos.
} catch (Exception $e) {
    $error = "Error del servidor: " . $e->getMessage(); // Mensaje de error en caso de una excepción general del servidor.
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"> <!-- Define la codificación de caracteres del documento para que sea UTF-8. -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista para dispositivos móviles y el escalado inicial. -->
<title>Iniciar Sesión</title> <!-- Título que aparece en la pestaña del navegador. -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluye el archivo CSS de Bootstrap para aplicar estilos. -->
<style>
body {
    background-color: #f8f9fa; /* Define el color de fondo para toda la página. */
}
.container {
    max-width: 400px; /* Define el ancho máximo del contenedor del formulario. */
    margin-top: 50px; /* Agrega un margen superior para centrar el contenedor verticalmente. */
    padding: 20px; /* Define el espaciado interno del contenedor. */
    background: white; /* Define el color de fondo del contenedor del formulario. */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Agrega una sombra sutil al contenedor para darle profundidad. */
    border-radius: 10px; /* Redondea las esquinas del contenedor. */
}
</style>
</head>
<body>
<div class="container"> <!-- Contenedor principal para centrar el formulario en la página. -->
<h2 class="text-center">Iniciar Sesión</h2> <!-- Título principal del formulario, centrado en la página. -->
<?php if (!empty($error)): ?> <!-- Verifica si hay un mensaje de error. -->
<div class="alert alert-danger" id="error-alert">
    <?php echo $error; ?> <!-- Muestra el mensaje de error si está presente. -->
</div>
<?php endif; ?>
<form action="login.php" method="post"> <!-- Formulario para iniciar sesión. Envía los datos al archivo 'login.php'. -->
    <div class="form-group">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required> <!-- Campo para ingresar el correo electrónico, obligatorio. -->
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required> <!-- Campo para ingresar la contraseña, obligatorio. -->
    </div>
    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button> <!-- Botón para enviar el formulario. -->
</form>
<p class="text-center mt-3">
    <a href="login_registro.php">Registrarse</a> | <a href="recuperar_contraseña.php">Recuperar Contraseña</a> <!-- Enlaces para registrarse o recuperar la contraseña. -->
</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Incluye jQuery para manejar la interactividad en la página. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> <!-- Incluye el archivo JavaScript de Bootstrap para funcionalidades adicionales. -->
<script>
$(document).ready(function() {
    $("#error-alert").fadeTo(2000, 500).slideUp(500, function() { // Muestra el mensaje de error y luego lo oculta gradualmente.
        $(this).slideUp(500);
    });
});
</script>
</body>
</html>
<?php include('includes/footer.php');
?>