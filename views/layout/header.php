<!DOCTYPE html>
<html lang="es">
<head>
    <!--<base href="http://localhost/mijhail_server/TP_336_sistema_almacen/">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema automatizador de reportes</title>
    <link rel="stylesheet" href="/mijhail_server/reportes_corpoelec/assets/css/styles.css">
</head>
<body>
    <div id="container">

        <!-- Cabecera -->
        <header id="header">
            <div id="logo">
                <img src="/mijhail_server/reportes_corpoelec/assets/img/logo_1.png" alt="Almacen Logo"/>
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
        <img src="/mijhail_server/reportes_corpoelec/assets/img/menu.jpeg" alt="Menú" class="menu-icon">
            Menú Principal
        </button>
            <ul class="submenu">
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
                <li>
                    <a href="<?=base_url;?>SubestacionController/index">Subestaciones</a>
                </li>
                <li>
                    <a href="Linea_de_transmisionController/index">L_transmision</a>
                </li>
                
                <li>
                    <a href="ReporteController/index">Reporte</a>
                </li>
                <li>
                    <a href="ProteccionController/index">Protecciones</a>
                </li>
                <li>
                    <a href="InterruptorController/index">Interruptores</a>
                </li>
                <li>
                    <a href="BobinaController/index">Bobinas</a>
                </li>
                <li>
                    <a href="Funcion_recepcionController/index">Funcion_recepcion</a>
                </li>
                <li >
                    <a href="DDT_recepcionController/index">DDT_recepcion</a>
                </li>
                <li >
                    <a href="Funcion_envioController/index">Funcion_envio</a>
                </li>
                <li >
                    <a href="DDT_envioController/index">DDT_envio</a>
                </li>
                <li >
                    <a href="Generar_reporte_pdfController/index">Generar reporte detallado pdf</a>
                </li>
                <li >
                    <a href="Generar_reporte_pdfController/index_general">Generar reporte general pdf</a>
                </li>
            </ul>
        </nav>
