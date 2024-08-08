<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIMNASIO & MEDICINA "FARPOV"</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: rgba(69,218,251);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="index.php">
                <img src="imagenes/icono.png" alt="Descripción de la imagen" style="width: 50px; height: auto;">
            </a>
            <a class="navbar-brand fs-6" href="index.php">GIMNASIO & MEDICINA "FARPOV"</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">INICIAR SESIÓN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">REGISTRARSE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Sesiones/crear_clientes.php">CLIENTES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Membresia.php">MEMBRESIA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Servicios.php">SERVICIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Facuracion.php">FACTURACIÓN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cerrar_sesion.php">CERRAR SESIÓN</a>
                    </li>
                </ul>
                <div class="social-icons ms-auto">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
