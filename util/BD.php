<?php

namespace Proyecto\Util;

class BD
{
    public static function connect()
    {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
            $conexion = mysqli_connect('localhost', 'root', '', 'jumac');
            mysqli_set_charset($conexion, "utf8"); 

            return $conexion;
        } catch (\mysqli_sql_exception $e) {
            error_log($e->getMessage());
            die("Error en la conexion"); 
        }
    }
}
