<?php

if(isset($_POST)){ // Se valida si llega alguna información por POST desde form
    // Conexión a la bbdd:
    require_once 'includes/conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
        
    // VALIDACIÓN
    // Array de errores
    $errores = array();
    
    // Validar los datos antes de guardarlos en la base de datos    
    if(empty($titulo)){
        $errores['titulo'] = "El título no es válido";
    }
    
    if(empty($descripcion)){
        $errores['descripcion'] = "La descripción no es válida";
    }
    
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoría no es válida";
    }
        
    if(count($errores == 0)){
        $sql = "INSERT INTO entradas VALUES(null, '$usuario', $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql); // Se ejecuta la consulta
    }else{
        $_SESSION["errores_entrada"] = $errores;
    }
}

header("Location: index.php");