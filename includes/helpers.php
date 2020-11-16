<?php
function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}

function borrarErrores(){
    $borrado = false;
    
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = session_unset();
        //$borrado = session_unset($_SESSION['errores']);
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);        
    }

    
    return $borrado;
}

// Categorías:
function getCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }
    
    return $result;            
}

function getLastEntradas($conexion){
    // Se define la consulta:
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
            INNER JOIN categorias c ON e.categoria_id = c.id
            ORDER BY e.id DESC LIMIT 4";
    
    $entradas = mysqli_query($conexion, $sql); // Se ejecuta la consulta y se almacena resultado
    
    $result = array();    
    if($entradas && mysqli_num_rows($entradas)>= 1){
        $result = $entradas;
    } 
    return $entradas;
}