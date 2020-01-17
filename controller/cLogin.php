<?php

//variable para controlar el formulario
$entradaOK = true;
//Array de los errores
$aErrores = [];
//si pulsamos el boton salir nos saca de la aplicacion
if (isset($_POST["salir"])) {
    $_SESSION["DAW209POOusuario"] = $codUsuario;
    header("Location: ../DWES.php");
}
//si pulsamos el votor enviar del formulario nos ejecuta el programa y comprueba si se valida al usuario o no
if (isset($_POST["enviar"])) {
    $aErrores["codUsuario"] = validacionFormularios::comprobarAlfaNumerico($_POST["usuario"], 250, 1, 1);
    $aErrores["password"] = validacionFormularios::comprobarAlfaNumerico($_POST["password"], 255, 4, 1);
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaOK = false;
        }
    }

    //si la entrada  es correcta entramos en el if
    if ($entradaOK) {
        //almacenamos en una variable el usuario tecleado en el formulario
        $codUsuario = $_POST["usuario"];
        //alamacenamos en una variable el hash y la contraseña del usuario
        $password = hash("SHA256", $codUsuario . $_POST["password"]);
        //alamacenamos en una variable el valor dde la consulta validar usuario
        $obUsuario = Usuario::validarUsuario($codUsuario, $password);
        //si existe el usuario nos direcciona al index
        if (!is_null($obUsuario)) {
            $_SESSION["DAW209POOusuario"] = $codUsuario;
            header("Location: index.php");
        } else {
            /**
             * si no  existe el usuario nos direcciona al login
             */
            $vista = $vistas["login"];
            require_once $vistas["layout"];
        }
    } else {
        /**
         * si no  existe el usuario nos direcciona al login
         */
        $vista = $vistas["login"];
        require_once $vistas["layout"];
    }
} else {
    /**
     * si no  existe el usuario nos direcciona al login
     */
    $vista = $vistas["login"];
    require_once $vistas["layout"];
}
