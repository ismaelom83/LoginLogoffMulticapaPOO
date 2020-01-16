<?php

//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["salir"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    //nos dirige al login
    header("location: index.php");
} else { //si no estaremos en el inicio

    //almacenamos en variables la sesion del usuario para pasarsela a la vista
    $sUsuario = $_SESSION['usuarioLogin'];
    $sPerfil = $_SESSION['perfil'];
    $sConexiones = $_SESSION['numeroConexiones'];
    $sUltimaConexion = $_SESSION['ultimaConexion'];
    
     $sNumeroConexiones = $_SESSION['numeroConexiones'];
     
     //condicional para diferenciar de la primera vez que te logeas a las demas veces
     if($sNumeroConexiones==1){
         $salidaConexion = $sUsuario." Esta es la primera vez que te logeas";
         $salidaUltimaConexion = "No tienes todavia hora de ultima conexion al ser la primera vez que te logeas";
     } else {
         $salidaConexion = $sUsuario." Esta es la ".$sNumeroConexiones."º vez que te logeas";
         $salidaUltimaConexion = "Tu ultima conexion fue el ".$sUltimaConexion;
     }
     
    $vista = $vistas['inicio']; 
    /**
     * requerimosa el layout de la vista
     */
    require_once $vistas['layout'];
}
