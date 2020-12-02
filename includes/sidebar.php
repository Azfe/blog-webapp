<!-- SIDEBAR -->
<aside id="sidebar">  
    
    <div id="searcher" class="block-aside">
        <h3>Buscar</h3>
       
        <form action="search.php" method="POST">
            <input type="text" name="busqueda"/>
            <input type="submit" value="Buscar"/>
        </form>
    </div>
    
    <?php if(isset($_SESSION['usuario'])): ?> <!-- Si existe el usuario identificado -->        
        <div id="usuario-logueado" class="block-aside">
            <h3>Bienvenido, <?=$_SESSION['usuario'] ['nombre']. ' '.$_SESSION['usuario']['apellidos']; ?></h3> <!-- Se imprimen los datos por pantalla -->            
            <!-- Botones -->
            <a href="create-post.php" class="boton boton-verde">Crear entradas</a>
            <a href="create-category.php" class="boton">Crear categoría</a>
            <a href="mydata.php" class="boton boton-naranja">Mis datos</a>
            <a href="logout.php" class="boton boton-rojo">Cerrar sesión</a>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['usuario'])): ?> <!-- Si NO existe el usuario identificado --> 
    <div id="login" class="block-aside">
        <h3>Identifícate</h3>
        
        <?php if(isset($_SESSION['error_login'])): ?> <!-- Si existe el usuario identificado -->        
            <div class="alerta alerta-error">                         
                <?=$_SESSION['error_login']; ?>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <div id="register" class="block-aside">
        
        <?php// if(isset($_SESSION['errores'])): ?>
            <?php //var_dump($_SESSION['errores']); ?>
        <?php //endif; ?>
        
        <h3>Regístrate</h3>
        
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
        
        <form action="register.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') :'';?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') :'';?>            

            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') :'';?>            

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') :'';?>            

            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <?php borrarErrores(); ?>
    </div>
    <?php endif?>    
</aside>