<?php include('includes/header.php'); ?>

<div class="container" style="display: flex; flex-direction: column; height: 80vh;">
    <h1>BIENVENIDO A FARPOV GYM</h1>

    <style>
        html, body {
            height: 100%; /* Asegura que el HTML y el cuerpo ocupen toda la altura del viewport */
            margin: 0;
            color: #fff;
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            background: url('imagenes/actividad fisica.jpg') no-repeat center center fixed; /* Imagen de fondo */
            background-size: cover; /* Hace que la imagen cubra todo el fondo */
            display: flex;
            flex-direction: column;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 50px; /* Reduce el padding para hacer el footer más pequeño */
            font-size: 1.0em; /* Ajusta el tamaño de la fuente */
        }
    </style>

</div>
<?php include('includes/footer.php');
?>