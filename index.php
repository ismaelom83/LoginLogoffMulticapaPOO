<?php

/**
 * requerimos los ficheros de configuarion
 */
require_once './config/confAplicacion.php';
require_once './config/confDB.php';

//iniciamos sesion o la continuamos
session_start();

//si la sesion a sido iniciada entra en el index
if(isset($_SESSION['DAW209POOusuario'])){
   
    if(isset($_GET['pagina'])){
        /**
         * si hay una pagina la carga
         */
        include_once $controladores[$_GET['pagina']];  
    } else {
        /**
         * si no nos dirige al inicio
         */
        include_once $controladores["inicio"]; 
    }  
}else {
    /**
     * si no valida la entrada volvemos al login
     * yes
     */
    include_once $controladores["login"];
}
?>