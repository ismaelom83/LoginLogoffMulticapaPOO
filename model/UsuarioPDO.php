<?php

/**
 * Class UsuarioPDO
 *
 * Clase que ejecutas las consultas
 *
 * Clase que ejecuta todas las consultas de la basee de datos 
 * 
 * PHP version 7.3
 *
 * @package  LoginLogoffMulticapaMVC
 * @source UsuarioPDO.php
 * @since 1.0
 * @copyright 15-01-2020
 * @author  Ismael Heras Salvador
 * 
 * 
 */
class UsuarioPDO {

    /**
     * funcion que valida usuarios y pide a la clase DBPDO el metodo ejecutarConsultas
     * 
     * @param type $codUsuario el codigo del usuario que recivimos en el formulario
     * @param type $password la contraseña del usuario que recivimos por el formulario
     * @return type devuelve un array con toos los valores de la base de datos del usuario
     */
    public function validarUsuario($codUsuario, $password) {

        //funcion para poner la hora en madrid
        date_default_timezone_set("Europe/Madrid");
        //almacenamos en una variable la instancicocion de datatime.
        $fechaNacional = date('d-m-Y H:i:s');

        //creamos una consulta para saber el codigo del usuario y la contraseña
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=?";
        // array para almacenar todos los valores de la consulta
        $arrayUsuarios = [];
        //pedimos el metodo ejecutar consulta y la ejecutamos
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]);

        //almacenamos todos los datos de la consulta en un array para mostar por pantalla luego los datos del registro en la sesion del usuario.
        $resultado = $resConsulta->fetch(PDO::FETCH_ASSOC);

        //Si ahya algun resultado alamacenamos en el array todos los resultados.
        if ($resConsulta->rowCount() == 1) {

            //almacenamos en la sesion los campos que queramos mostrar de la base de datos del usuario.
            $_SESSION['usuarioLogin'] = $resultado['T01_CodUsuario'];
            $_SESSION['descLogin'] = $resultado['T01_DescUsuario'];
            $_SESSION['perfil'] = $resultado['T01_Perfil'];
             $_SESSION['numeroConexiones'] = $resultado['T01_NumAccesos'] + 1;

            if ($_SESSION['numeroConexiones'] > 1) {//si el numero de conexiones es mayor de una entonces mostraremos la hora de la ultima conexion si no no podriamos al ser la primera
                $_SESSION['ultimaConexion'] = $resultado['T01_FechaHoraUltimaConexion'];
            }
            //update a la base de datos para amuntar el numero de visitas
            $consulta = "UPDATE T01_Usuarios SET T01_NumAccesos=T01_NumAccesos+1, T01_FechaHoraUltimaConexion=now() WHERE T01_CodUsuario=?";
            DBPDO::ejecutaConsulta($consulta, [$_SESSION['usuarioLogin']]);


            //almacenamos en un array para crear un objeto 
            $resFetch = $resConsulta->fetchObject();
            $arrayUsuarios['CodUsuario'] = $resFetch->T01_CodUsuario;
            $arrayUsuarios['DescUsuario'] = $resFetch->T01_DescUsuario;
            $arrayUsuarios['Password'] = $resFetch->T01_Password;
            $arrayUsuarios['Perfil'] = $resFetch->T01_Perfil;
            $arrayUsuarios['ContadorAccesos'] = $resFetch->T01_NumAccesos;
            $arrayUsuarios['UltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
        }
        return $arrayUsuarios;
    }

}
?>

