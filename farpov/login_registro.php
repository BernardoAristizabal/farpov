<?php
// Incluir el archivo de configuración y conexión a la base de datos
include('config/db.php');

// Verificar si el método de solicitud es POST (envío del formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico y la contraseña del formulario
    $email = $_POST['email'];
    // Cifrar la contraseña utilizando PASSWORD_BCRYPT para almacenamiento seguro
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verificar que ambos campos (email y password) no estén vacíos
    if (!empty($email) && !empty($password)) {
        // Preparar la consulta SQL para insertar un nuevo usuario en la tabla 'usuarios'
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, password) VALUES (:email, :password)");
        // Ejecutar la consulta con los valores proporcionados
        if ($stmt->execute(['email' => $email, 'password' => $password])) {
            // Redirigir al usuario a la página de registro en caso de éxito
            header("Location: login_registro.php");
            exit(); // Asegurarse de que no se ejecute más código después de redirigir
        } else {
            // Mensaje de error si la consulta no se ejecuta correctamente
            $error = "Error al registrar el usuario.";
        }
    } else {
        // Mensaje de error si los campos están vacíos
        $error = "Por favor, complete todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Definición del conjunto de caracteres para el documento -->
    <meta charset="UTF-8">
    <!-- Configuración para que la página se adapte a diferentes tamaños de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página que aparecerá en la pestaña del navegador -->
    <title>Registrarse</title>
    <!-- Enlace a la hoja de estilos de Bootstrap versión 4.5.2 para el diseño de la página -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos CSS para el cuerpo de la página */
        body {
            background-color: #f8f9fa; /* Color de fondo claro */
        }
        /* Estilos CSS para el contenedor del formulario */
        .container {
            max-width: 400px; /* Ancho máximo del contenedor */
            margin-top: 50px; /* Espacio superior */
            padding: 20px; /* Espaciado interno */
            background: white; /* Color de fondo del contenedor */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra alrededor del contenedor */
            border-radius: 10px; /* Bordes redondeados del contenedor */
        }
    </style>
</head>
<body>
    <!-- Incluir el encabezado del sitio -->
    <?php include('includes/header.php'); ?>
    <!-- Contenedor principal para el formulario de registro -->
    <div class="container">
        <h2 class="text-center">Registrarse</h2>
        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($error)): ?>
        <div class="alert alert-danger" id="error-alert">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <!-- Formulario para el registro de usuarios -->
        <form action="login_registro.php" method="post">
            <div class="form-group">
                <!-- Etiqueta para el campo de correo electrónico -->
                <label for="email" class="form-label">Correo Electrónico</label>
                <!-- Campo de entrada para el correo electrónico -->
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <!-- Etiqueta para el campo de contraseña -->
                <label for="password" class="form-label">Contraseña</label>
                <!-- Campo de entrada para la contraseña -->
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
        <!-- Enlace para volver a la página de inicio de sesión -->
        <p class="text-center mt-3">
            <a href="login.php">Iniciar Sesión</a><!--cambios-->
        </p>
    </div>
    <!-- Incluir el pie de página del sitio -->
    <?php include('includes/footer.php'); ?>
    <!-- Enlace a la biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Desaparecer el mensaje de error después de un tiempo
            $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).slideUp(500);
            });
        });
    </script>
</body>
</html>
