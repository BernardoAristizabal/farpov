<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Servicios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%; /* Asegura que el HTML y el cuerpo ocupen toda la altura del viewport */
            margin: 0;
            color: #fff;
            text-align: center;
            font-family: Arial, sans-serif;
            background: url('imagenes/fondo serv.jpg') no-repeat center center fixed; /* Imagen de fondo */
            background-size: cover; /* Hace que la imagen cubra todo el fondo */
            display: flex;
            flex-direction: column;
        }
        .table-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px; /* Espacio entre las tablas */
            margin-top: 140px; /* Mantén el margen superior si es necesario */
        }
        .custom-table {
            width: 80%; /* Ajusta el tamaño de la tabla según tus necesidades */
            border-radius: 15px;
            margin: 20px; /* Espacio entre el borde de la página y las tablas */
            overflow: hidden; /* Necesario para aplicar los bordes redondeados a las imágenes */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
        }
        .custom-table img {
            width: 100%;
            height: auto;
            display: block;
        }
        .custom-table h3 {
            margin: 0;
            padding: 10px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7); /* Fondo del título */
            color: white;
        }
        .custom-table .btn-container {
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>
    <div class="table-container">
        <!-- Tabla 1: Ejercicio Físico -->
        <div class="custom-table">
            <h3>Ejercicio Físico</h3>
            <img src="imagenes/ejercicio fisico.jpg" alt="Ejercicio Físico">
            <div class="btn-container">
                <!-- Actualiza el botón para enlazar al archivo del código número 2 -->
                <a href="gimnasio.php" class="btn btn-primary">Conoce nuestros planes</a>
            </div>
        </div>

        <!-- Tabla 2: Médicos Deportivos -->
        <div class="custom-table">
            <h3>Médicos Deportivos</h3>
            <img src="imagenes/medicos deportivos.jpg" alt="Médicos Deportivos">
            <div class="btn-container">
                <button class="btn btn-primary">Conoce nuestros especialistas</button>
            </div>
        </div>

        <!-- Tabla 3: Promociones -->
        <div class="custom-table">
            <h3>Promociones</h3>
            <img src="imagenes/promociones.jpg" alt="Promociones">
            <div class="btn-container">
                <button class="btn btn-primary">Conoce nuestras promociones</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include('includes/footer.php'); ?>
