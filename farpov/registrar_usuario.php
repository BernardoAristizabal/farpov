<!-- registrar_usuario.php -->
<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'farpov');

if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

// Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, telefono, password) VALUES ('$nombre', '$email', '$telefono', '$password')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>
