<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?> 

<?php
    $entrada_actual = getEntrada($db, $_GET['id']);
    
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>
<?php require_once 'includes/header.php';?>  
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">
    <h1>Editar Entradas</h1>
    <p>                
        Edita tu entrada <?=$entrada_actual['titulo'] ?>
    </p>
    <br/>
    
    <form action="save-post.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="nombre">Título:</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo'] ?>"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'titulo'):'';?>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'descripcion'):'';?>
        
        <label for="categoria">Categoría:</label>
        <select name="categoria">            
            <?php 
                // Mostrar información categorias en desplegable del formulario:
                $categorias = getCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)): // mysqli_fetch_assoc -> consigue arrays asociativos de categorias
            ?>
                <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected = "selected"' : '' ?>> <!-- Se pasa como valor el id de la categoria -->
                    <?=$categoria['nombre'] ?>
                </option>
            <?php                
                endwhile;
                endif;
            ?>            
        </select>
        
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'categoria'):'';?>
        
        <input type="submit" value="Guardar"/>        
    </form>   
    <?php borrarErrores();?>
</div> <!-- Fin main-box -->

<?php require_once 'includes/footer.php';?>