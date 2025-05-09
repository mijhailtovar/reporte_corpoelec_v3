<!DOCTYPE html>
<html lang="es">
<head>
    <!--<base href="http://localhost/mijhail_server/TP_336_sistema_almacen/">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema automatizador de reportes</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="container">

        <!-- Cabecera -->
        <header id="header">
            <div id="logo">
                <img src="/assets/img/logo_1.png" alt="Almacen Logo"/>
                <a href="index.php">
                    Plan especial de protecciones Aragua
<!--
http://localhost/mijhail_server/reportes_corpoelec//mijhail_server/reportes_corpoelec/assets/img/logo_1.png                    
http://localhost/mijhail_server/reportes_corpoelec/assets/img/logo_1.png
-->
                </a>
            </div>
        </header>
        <!-- Menu -->
        <nav id="menu">
        <button class="menu-toggle">
        <img src="/assets/img/menu.jpeg" alt="Menú" class="menu-icon">
            Menú Principal
        </button>
            <ul class="submenu">
                <li>
                    <a href="?controller=SubestacionController&action=index">Inicio</a>
                </li>
                <li>
                    <a href="?controller=SubestacionController&action=index">Subestaciones</a>
                </li>
                <li>
                    <a href="?controller=Linea_de_transmisionController&action=index">lineas de transmision</a>
                </li>
                <li>
                    <a href="?controller=ProteccionController&action=index">Protecciones</a>
                </li>
                <li >
                    <a href="?controller=DatosReporteController&action=index">Introducir datos del reporte de la proteccion</a>
                </li>
<!--
                                
                <li>
                    <a href="ReporteController/index">Reporte</a>
                </li>
                <li>
                    <a href="InterruptorController/index">Interruptores</a>
                </li>
                <li>
                    <a href="BobinaController/index">Bobinas</a>
                </li>
                <li>
                    <a href="Funcion_recepcionController/index">Funcion recepcion</a>
                </li>
                <li >
                    <a href="DDT_recepcionController/index">DDT recepcion</a>
                </li>
                <li >
                    <a href="Funcion_envioController/index">Funcion envio</a>
                </li>
                <li >
                    <a href="DDT_envioController/index">DDT envio</a>
                </li>
                <li >
                    <a href="Generar_reporte_pdfController/index">Generar reporte detallado pdf</a>
                </li>
-->
                <li >
                    <a href="?controller=Generar_reporte_pdfController&action=general">Generar reporte general html</a>
                </li>
                <li >
                    <a href="?controller=Generar_reporte_pdfController&action=general_pdf">Generar reporte general pdf</a>    
                </li>
            </ul>
        </nav>
