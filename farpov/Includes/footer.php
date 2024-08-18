<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Transparente</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        footer {
            background-color: rgba(255, 255, 255, 0.5); /* Fondo transparente */
            color: black;
            text-align: center;
            padding: 5px; /* Ajusta este valor para cambiar la altura */
        }
        .footer-content {
            margin: 0;
        }
        .footer-content span {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Contenido de la página -->
    
    <footer>
        <div class="footer-content">
            <span>GIMNASIO & MEDICINA "FARPOV" ® 2024</span>
            <p>TU SALUD Y BIENESTAR, NUESTRA PRIORIDAD</p>
        </div>
    </footer>
</body>
</html>

