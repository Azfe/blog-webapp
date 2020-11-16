<?php require_once 'includes/redirect.php'; // Si no hay sesión iniciada se redirige a la página principal?> 
<?php require_once 'includes/header.php';?>                
<?php require_once 'includes/sidebar.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main-box">
    <h1>Crear categorías</h1>
    <p>
        Añade nuevas categorías al blog para que los usuarios puedan usarlas al crear sus entradas.
    </p>
    <br/>
    
    <form action="save-category.php" method="POST">
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" name="nombre"/>
        
        <input type="submit" value="Guardar"/>        
    </form>    

</div> <!-- Fin main-box -->

<?php require_once 'includes/footer.php';?>