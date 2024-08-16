<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Definición del conjunto de caracteres para el documento -->
    <meta charset="UTF-8">
    <!-- Configuración para que la página se adapte a diferentes tamaños de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página que aparecerá en la pestaña del navegador -->
    <title>GIMNASIO & MEDICINA DEPORTIVA FARPOV</title>
    <!-- Enlace a la hoja de estilos de Bootstrap versión 5.1.3 para el diseño de la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--
    El atributo href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" dentro de una etiqueta <link> en HTML sirve para vincular una hoja de estilos CSS externa, en este caso la biblioteca Bootstrap versión 5.1.3. Bootstrap es un framework de CSS que proporciona estilos y componentes predefinidos para facilitar y acelerar el desarrollo de interfaces web.-->
</head>
<body>
    <!-- Barra de navegación de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Enlace a la página principal del sitio -->
            <a class="navbar-brand" href="index.php">GIMNASIO & MEDICINA "FARPOV"</a>
            <!-- Botón de menú para pantallas pequeñas (responsive) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenedor del menú de navegación que se colapsa en pantallas pequeñas -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Enlace a la página de inicio -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <!-- Enlace a la página de inicio de sesión -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </li>
                    <!-- Enlace a la página de registro -->
                    <li class="nav-item">
                        <a class="nav-link" href="login_registro.php"> Registrarse.</a>
                    </li>
                    <!-- Enlace a la página de clientes -->
                    <li class="nav-item">
                        <a class="nav-link" href="../Sesiones/crear_clientes.php">Clientes</a>
                    </li>
                    <!-- Enlace a la página de servicios -->
                    <li class="nav-item">
                        <a class="nav-link" href="Servicios.php">Servicios</a>
                    </li>
                    <!-- Enlace a la página de membresía -->
                    <li class="nav-item">
                        <a class="nav-link" href="Membresia.php">Membresia</a>
                    </li>
                    <!-- Enlace a la página de facturación -->
                    <li class="nav-item">
                        <a class="nav-link" href="Facuracion.php">Facturacion</a>
                    </li>
                    <!-- Enlace a la página "Conocenos" -->
                    <li class="nav-item">
                        <a class="nav-link" href="conocenos">Conocenos!</a>
                    </li>
                    <!-- Enlace a la página de contacto -->
                    <li class="nav-item">
                        <a class="nav-link" href="contactanos">Contactanos</a>
                    </li>
                    <!-- Enlace para cerrar sesión -->
                    <li class="nav-item">
                        <a class="nav-link" href="Cerrar_sesion">Cerrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
