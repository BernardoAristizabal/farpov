<?php include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membresia</title>
    <style>
    body {
        height: 100%;
        margin: 0;
        color: #fff;
        text-align: center;
        font-family: Arial, sans-serif;
        background: url('imagenes/fitness.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        flex-direction: column;
    }

    .container {
        display: flex;
        justify-content: center; /* Centra las tablas */
        gap: 37px; /* Ajusta la distancia entre las tablas */
        padding: 20px; /* Agrega un pequeño padding si lo deseas */
        flex-wrap: wrap; /* Permite que las tablas se envuelvan si hay poco espacio */
    }

    .service-card {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 20px;
        border-radius: 15px;
        width: 300px;
        text-align: center;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Asegura que el botón esté en la parte inferior */
    }

    .service-card h2 {
        font-size: 1.5em;
        margin: 0;
    }

    .service-card .price {
        font-size: 2.5em;
        font-weight: bold;
        margin: 10px 0;
    }

    .service-card .description {
        font-size: 1em;
        margin: 10px 0;
    }

    .service-card .services {
        display: flex;
        justify-content: space-between;
        margin: 15px 0;
        flex-grow: 1; /* Permite que el contenedor de servicios ocupe el espacio disponible */
    }

    .service-card ul {
        list-style: none;
        padding: 0;
        text-align: left;
        margin: 0;
    }

    .service-card ul li {
        margin: 5px 0;
        font-size: 0.9em;
        position: relative;
        padding-left: 20px;
    }

    .service-card ul li::before {
        content: "✔";
        color: #007BFF;
        font-weight: bold;
        position: absolute;
        left: 0;
        top: 0;
    }

    .cta-button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 15px; /* Espacio adicional encima del botón */
    }

    .cta-button:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>
    <div class="container">
        <!-- Primera tabla de servicios -->
        <div class="service-card">
            <h2>1 SESION BASICO</h2>
            <p class="price">$6.000</p>
            <p class="description">Escoge uno de los servicios fitness</p>
            <div class="services">
                <ul>
                    <li>Yoga</li>
                    <li>HIIT</li>
                    <li>Spinning</li>
                    <li>Combate</li>
                    <li>Baile</li>
                </ul>
                <ul>
                    <li>Ejercicios acuáticos</li>
                    <li>Entrenamiento funcional</li>
                    <li>Pilates</li>
                </ul>
            </div>
            <button class="cta-button">Obten básico ➜</button>
        </div>

        <!-- Segunda tabla de servicios -->
        <div class="service-card">
            <h2>15 DIAS PLATINUM</h2>
            <p class="price">$70.000</p>
            <p class="description">Escoge cuatro de los servicios fitness</p>
            <div class="services">
                <ul>
                    <li>Yoga</li>
                    <li>HIIT</li>
                    <li>Spinning</li>
                    <li>Combate</li>
                    <li>Baile</li>
                </ul>
                <ul>
                    <li>Ejercicios acuáticos</li>
                    <li>Entrenamiento funcional</li>
                    <li>Pilates</li>
                </ul>
            </div>
            <button class="cta-button">Obten platinum ➜</button>
        </div>

        <!-- Tercera tabla de servicios -->
        <div class="service-card">
            <h2>1 MES DORADO</h2>
            <p class="price">$120.000</p>
            <p class="description">Escoge cualquiera de los servicios fitness</p>
            <div class="services">
                <ul>
                    <li>Acceso ilimitado</li>
                </ul>
                
            </div>
            <button class="cta-button">Obten dorado ➜</button>
        </div>
    </div>
</body>
</html>
<?php include('includes/footer.php'); ?>