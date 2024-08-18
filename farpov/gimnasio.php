<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Fondo y Footer en el Fondo</title>
    <style>
        html, body {
            height: 100%; /* Asegura que el HTML y el cuerpo ocupen toda la altura del viewport */
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: url('imagenes/fondo gin.jpg') no-repeat center center fixed; /* Imagen de fondo */
            background-size: cover; /* Hace que la imagen cubra todo el fondo */
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .blue-table {
            background-color: rgba(69, 218, 251, 0.2); /* 20% opaco */
            border-radius: 15px;
            width: 80%; /* Ajusta el ancho según lo necesites */
            table-layout: fixed; /* Fija el ancho de las columnas */
            margin-top: 140px; /* Mantén el margen superior si es necesario */
        }

        .blue-table td {
            padding: 10px;
            vertical-align: top; /* Alinea el contenido en la parte superior */
        }

        .button-column {
            text-align: center;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }

        .description {
            margin: 5px 0 0;
            color: #fff;
        }

        .right-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .image-column {
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <table class="blue-table">
            <tr>
                <td class="button-column">
                    <button class="btn">Musculación y Fuerza</button>
                    <p class="description">Desarrolla y fortalece los musculos mediante ejercicio fisico</p>
                    <button class="btn">Aeróbicos</button>
                    <p class="description">Aumente la frecuencia cardiaca y la respiracion pra mejorar la salud cardiovascular y la resistencia</p>
                    <button class="btn">Fitness</button>
                    <p class="description">Realiza actividades diaras con vigor y sin fatiga excesiva, ten la capacidad de resistir enfermedades y 
                        lesiones relacionadas con el estilo de vida sedentario
                    </p>
                </td>
                <td class="button-column">
                    <button class="btn">Equilibrio</button>
                    <p class="description">Manten una postura estable y controlada durante movimiento o posicion estatica</p>
                    <button class="btn">Coordinación</button>
                    <p class="description">Trabaja de una manera armonica y eficiente en la realizacion de movimientos controlados y precisos</p>
                    <button class="btn">Flexibilidad</button>
                    <p class="description">Muevete a traves de un rango de movimientos especificos de forma fluida y sin restricciones</p>
                </td>
                <td class="image-column">
                    <img src="imagenes/icono dinero.png" alt="Imagen" class="right-image">
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php include('includes/footer.php'); ?>