<?php require_once 'includes/redirect.php'; // Si no hay sesión iniciada se redirige a la página principal?> 
<?php require_once 'includes/header.php';?>                
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blogpara que los usuarios puedan
        leerlas y disfrutar de nuestro contenido.
    </p>
    <br/>
    
    <form action="save-post.php" method="POST">
        <label for="nombre">Título:</label>
        <input type="text" name="titulo"/>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        
        <label for="categoria">Categoría:</label>
        <select name="categoria">
            <?php 
                $categorias = getCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)): // mysqli_fetch_assoc -> consigue arrays asociativos de categorias
            ?>
                <option value="<?=$categoria['id']?>"> <!-- Se pasa como valor el id de la categoria -->
                    <?=$categoria['nombre'] ?>
                </option>
            <?php                
                endwhile;
                endif;
            ?>
            
        </select>
        
        <input type="submit" value="Guardar"/>        
    </form>    

</div> <!-- Fin main-box -->

<?php require_once 'includes/footer.php';?>