<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }
        .container {
            border: 2px solid black;
            border-radius: 5px;
            padding: 20px;
            width: 600px;
        }
        .header {
            display: flex; /* Flexbox para alinear elementos horizontalmente */
            justify-content: center; /* Centrar el contenido en la línea horizontal */
            position: relative; /* Para posicionar la imagen absolutamente */
            margin-bottom: 20px;
        }
        .header img {
            position: absolute; /* Posicionar la imagen sin afectar al texto */
            left: 0; /* Fijar la imagen al lateral izquierdo */
            top: 3%; /* Centrarla en relación con el texto */
            transform: translateY(-50%); /* Ajustar el centro vertical */
            width: 70px; /* Tamaño de la imagen */
            height: 60px;
        }
        .header-text {
            text-align: center; /* Mantener el texto centrado horizontalmente */
            flex: 1; /* Ocupar todo el espacio restante para que quede bien centrado */
        }
        .header-text span {
            font-weight: bold;
            text-decoration: underline;
        }
        .section {
            margin-bottom: 10px;
        }
        .section span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Imagen del escudo -->
            <img src="assets/escudo.png" alt="Escudo de Sullana">
            <!-- Texto centrado -->
            <div class="header-text">
                MUNICIPALIDAD PROVINCIAL DE SULLANA<br>
                SUB GERENCIA DE TRANSPORTE PUBLICO<br>
                <span>TARJETA DE CIRCULACIÓN VEHICULAR</span><br>
                N° {{ $numero }}
            </div>
        </div>
        <div class="section">
            <span>1.- RAZÓN SOCIAL:</span> {{ $razon_social }}
        </div>
        <div class="section">
            <span>2.- VEHÍCULO:</span>
            <div>2.1 Placa: {{ $placa }}</div>
            <div>2.2 Color: {{ $color }}</div>
            <div>2.3 Marca: {{ $marca }}</div>
            <div>2.4 Chasis: {{ $chasis }}</div>
            <div>2.5 Tipo de Servicio: {{ $tipo_servicio }}</div>
            <div>2.6 Nº de Motor: {{ $numero_motor }}</div>
        </div>
        <div class="section">
            <span>3.- Fecha de Expedición:</span> {{ $fecha_expedicion }}
        </div>
        <div class="section">
            <span>4.- Fecha de Vencimiento:</span> {{ $fecha_vencimiento }}
        </div>
        <div class="section">
            <span>5.- Nº de Expediente:</span> {{ $tramite_id }}
        </div>
        <div class="section" style="margin-top: 20px;">
            NOTA: El número de motor está inscrito en el Registro de Motores y Vehículos de esta Municipalidad Provincial, en la Sub Gerencia de Transportes Público.
        </div>
    </div>
</body>
</html>
