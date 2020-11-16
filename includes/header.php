<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php';?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto PHP - Blog de videojuegos</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
        
    </head>
    <body>
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <a href="index.php">
                    Proyecto PHP - Blog de videojuegos
                </a>                
            </div>  
            
            <!-- MENU -->            
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias = getCategorias($db);
                        if(!empty($categorias)): // Se comprueba que no está vacío el array categorias
                            while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                                <li>
                                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                                </li>
                    <?php                    
                            endwhile;
                        endif;?>                    
                    <li>
                        <a href="index.php">Sobre mí</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            
            <div class="clearfix"></div>
            
        </header>
        
        <div id="container">