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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('imagenes/actividad fisica.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <!-- Imagen redonda centrada -->
        <img src="imagenes/icono.jpg" alt="Perfil" class="profile-img">
        <h2 class="text-center">Iniciar Sesión</h2>
        <?php if (!empty($error)): ?>
        <div class="alert alert-danger" id="error-alert">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>
        <p class="text-center mt-3">
            <a href="login_registro.php">Registrarse</a> | <a href="recuperar_contraseña.php">Recuperar Contraseña</a>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $(this).slideUp(500);
        });
    });
    </script>
</body>
</html>
<?php include('includes/footer.php');
?>