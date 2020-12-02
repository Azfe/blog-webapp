<?php
    // Se verifica si existe una búsqueda, de lo contrario devuelve al index
    if(!isset($_POST['busqueda'])){
        header("Location: index.php");
    }
?>

<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">

    <h1>Búsqueda: <?=$_POST['busqueda']?></h1>
    
    <?php 
        $entradas = getEntradas($db, null, null, $_POST['busqueda']);
        
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entrada">            
            <a href="post.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo'] ?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha'] ?></span>
                <p>
                    <?= substr($entrada['descripcion'], 0, 180)."[...]" ?>
                </p>
            </a>
        </article>        
    <?php
            endwhile;
        else:
    ?>
    <div class="alerta">No hay entradas en esta categoría</div>
    <?php endif; ?>
  
</div> <!-- Fin main-box -->

<?php require_once 'includes/footer.php';?>

