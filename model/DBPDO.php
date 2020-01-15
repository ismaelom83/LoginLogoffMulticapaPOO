<?php

/**
 * Class DBPDO
 *
 * Clase para ejecutar consultas a la base de datos
 *
 * Clase que es la unica que tiene acceso a la base de datos y ejecuta las consultas a la misma.
 * 
 * PHP version 7.3
 *
 * @category ejecucion
 * @package  LoginLogoffMulticapaMVC
 * @source DBPDO.php
 * @since 1.0
 * @copyright 15-01-2020
 * @author  Ismael Heras Salvador
 * 
 * 
 */
class DBPDO {
      /**
       * funcion para ejecutar una o varias consultas  a la base de datos.
       * 
       * @param type $sentenciaSQL sentencia de tipo sql (insert, delete, update , select). 
       * @param type $parametros parametros que nos piden para consulta
       * @return type devuelve un tipo de consulta a la base de datos
       */
    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        require_once 'config/confDB.php';
        try {
            $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exception) {
            $consulta = null; //Destruimos la consulta.
            echo $exception->getMessage();
            unset($miDB);
        }
        return $consulta;
    }  
}

?>
