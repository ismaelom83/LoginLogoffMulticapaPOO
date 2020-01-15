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

        //creamos una consulta para saber el codigo del usuario y la contraseña
        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=?"; 
       // array para almacenar todos los valores de la consulta
        $arrayUsuarios = [];
        //pedimos el metodo ejecutar consulta y la ejecutamos
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]); 
        //Si ahya algun resultado alamacenamos en el array todos los resultados.
        if ($resConsulta->rowCount() == 1) { 
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

