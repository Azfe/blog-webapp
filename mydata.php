<?php require_once 'includes/redirect.php'; // Si no hay sesión iniciada se redirige a la página principal?> 
<?php require_once 'includes/header.php';?>                
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">
    <h1>Mis datos</h1>
    
    <!-- Mostrar errores -->
    <?php if(isset($_SESSION['completado'])): // Si existe...?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado']; ?>
        </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores'] ['general']; ?>
        </div>            
    <?php endif; ?>
    
    <!-- Formulario -->    
    <form action="update-user.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?=$_SESSION['usuario']['email'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') :'';?>  
        
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') :'';?>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos'];?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') :'';?>          

        <input type="submit" name="submit" value="Actualizar"/>
    </form>
    <?php borrarErrores(); ?>
    
</div> <!-- fin principal -->

<?php require_once 'includes/footer.php'; ?>