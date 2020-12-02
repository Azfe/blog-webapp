<?php

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}

// Se comprueba si no existe sesión de usuario y si no la hay redirige al index. Esto sirve para que no acceda a páginar a través de escribir la ruta de la url en navegador.
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

