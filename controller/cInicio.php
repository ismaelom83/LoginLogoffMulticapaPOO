<?php

//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["salir"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    //nos dirige al login
    header("location: index.php");
} else { //si no estaremos en el inicio
    $vista = $vistas['inicio']; 
    /**
     * requerimosa el layout de la vista
     */
    require_once $vistas['layout'];
}
