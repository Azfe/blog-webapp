<?php require_once 'includes/header.php';?>
                
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">
    <h1>Todas las entradas</h1>
    
    <?php 
        $entradas = getEntradas($db);
        if(!empty($entradas)):
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
        endif;
    ?>
  
</div> <!-- Fin main-box -->

<?php require_once 'includes/footer.php';?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

