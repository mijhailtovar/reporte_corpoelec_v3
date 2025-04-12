<div id="content">
        
<!-- Barra lateral -->
<!--mensaje de que se regristro un registro con exito-->

    <?php if(!isset($_SESSION['identificado']) || empty($_SESSION['identificado'])):?>
    <!--no hace nada si insertas los registros vacios-->
    <?php else: ?>
        <div class="box">
            <div class="alert_green" >registro insertado correctamente</div>
        </div>
    <?php endif; 
        $_SESSION['identificado'] = false;
    ?>

<!-- Contenido central -->
<div id="contenido_central">