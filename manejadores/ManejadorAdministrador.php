<?php

namespace Proyecto\Manejadores;

require_once 'Util/BD.php';
require_once 'Entidades/administrador.php';

use Proyecto\Util\BD;
use Proyecto\Entidades\Administrador;

class ManejadorAdministrador
{
    public static function comprobarLoginAdministrador() 
    {
        if(!isset($_SESSION["administrador"]) && isset($_COOKIE["cookie_administrador"])) {
            $_SESSION["administrador"] = self::obtenerAdministradorPorId($_COOKIE["cookie_administrador"]); 
        }

        if(!isset($_SESSION["administrador"])) {
            header("Location: formulario_login_jumac.php");
            exit();
        }
    }

    public static function obtenerAdministradorPorId($id)
    {
        $conexion = BD::connect(); 
        $consulta = "SELECT id, nombre, apellidos, mail FROM administradores WHERE id = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $administrador_db = mysqli_fetch_assoc($resultado);
            return $administrador_db; 
        }

        return null;
    }

    public static function obtenerAdministrador($correo)
    {
        $conexion = BD::connect(); 

        $consulta = "SELECT id, nombre, mail, password 
                    FROM administradores 
                    WHERE mail = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $administrador_db = mysqli_fetch_assoc($resultado);
            return $administrador_db; 
        }

        return null;
    }

    public static function obtenerAdministradorToken($token)
    {
        $conexion = BD::connect(); 

        $consulta = "SELECT id, mail, password 
                    FROM administradores 
                    WHERE token = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $administrador_db = mysqli_fetch_assoc($resultado);
            return $administrador_db; 
        }

        return null;
    }

    public static function comprobarDuplicidadAdministrador($correo){
        $conexion = BD::connect(); 

        $consulta = "SELECT id, nombre, mail FROM administradores WHERE mail = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $administrador_db = mysqli_fetch_assoc($resultado);
            return $administrador_db; 
        }

        return null;

    }

    public static function hacerLoginAdministrador($administrador, $password, &$error) 
    {   /*si no ha encontrado (empty) un administrador, devuelve un mensaje de error*/
        if (empty($administrador)) {
            $error = "El usuario o la contraseña  no son correctos";
            return; 
        }
        $id_usuario = $administrador["id"]; //id del array obtenido en obtenerUsuario (fila de la select)
        $password_encriptada = $administrador["password"];  //pasword del array de obtenerUsuario
        unset($administrador["password"]); //elimino del array la password para que no esté en sesión
        /*si la contraseña del post no es igual que la encriptada en la base de datos, 
        devuelve un mensaje de error*/
        /*El metodo password_verify pide por parámetros primero la contraseña del post, y luego la de la base de datos*/
        if (!password_verify($password, $password_encriptada)) {
            $error = "El usuario o la contraseña  no son correctos";
            return; 
        }
        //almacena en sesión el administrador de obtener administrador
        $_SESSION["administrador"] = $administrador;
        //crea la cookie
        setcookie('cookie_administrador', $id_usuario, time() + 3600, '/'); 
        
        header("Location: index_jumac.php"); 
        exit(); 
    }

    public static function signinAdministrador()
    {
        if(isset($_POST["registrarse"])) {
            $correo = $_POST["correo"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            //metodo password_hash para encriptar la passsword
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            self::registrarAdministrador($correo, $nombre, $apellidos, $password);
            $administrador = self::obtenerAdministrador($correo);
            $error = ""; 
            self::hacerLoginAdministrador($administrador, $_POST["password"], $error);
        }
    }

    public static function registrarAdministrador($correo, $nombre, $apellidos, $password)
    {
        $conexion = BD::connect();

        $consulta = "INSERT INTO administradores (mail, nombre, apellidos, password) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ssss', $correo, $nombre, $apellidos, $password);

        return $stmt->execute();
    }

    public static function modificarCuentaAdministrador($id) 
    {
            $nombre = $_POST["nombre"]; 
            $apellidos = $_POST["apellidos"]; 
            $correo = $_POST["correo"]; 

            self::registrarCambiosAdmin($id, $nombre, $apellidos, $correo);
            $_SESSION["administrador"]["nombre"] = $nombre; 
            $_SESSION["administrador"]["mail"] = $correo; 

    }

    public static function registrarCambiosAdmin($id, $nombre, $apellidos, $correo)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE administradores SET nombre = ?, apellidos = ?, mail = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('sssi', $nombre, $apellidos, $correo, $id);
        
        return $stmt->execute();
        
    }

    public static function cambiarContrasenaAdministrador($administrador, $password, $nuevo_password)
    {   
        $password_encriptada = $administrador["password"];
        if (!password_verify($password, $password_encriptada)) {
            $error = "El usuario o la contraseña  no son correctos";
            return false; 
        }else{                     
            $new_password = password_hash($nuevo_password, PASSWORD_DEFAULT);
            $id_usuario = $administrador['id'];
            self::modificarContrasena($id_usuario, $new_password); 
        }
        return true; 
    }

    public static function recuperarContrasena($id_usuario, $contrasena)
    {
        $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
        self::modificarContrasena($id_usuario, $contrasena_encriptada);

        return true;
    }

    public static function modificarContrasena($id_usuario, $contrasena_encriptada)
    {
        $conexion = BD::connect();       
        $consulta = "UPDATE administradores SET password = ? 
                    WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('si', $contrasena_encriptada, $id_usuario);              
        $stmt->execute();
    }

    public static function modificarTokenContrasenaAdministrador($id, $token)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE administradores SET token = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('si', $token, $id);
        
        return $stmt->execute();
    }

}

