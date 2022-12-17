<?php

namespace Proyecto\Manejadores;

require_once 'Util/BD.php';
require_once 'Entidades/usuario.php';

use Proyecto\Util\BD;
use Proyecto\Entidades\Usuario;

class ManejadorUsuario
{
    public static function comprobarLogin() 
    {
        if(!isset($_SESSION["usuario"]) && isset($_COOKIE["cookie_usuario"])) {
            $_SESSION["usuario"] = self::obtenerUsuarioPorId($_COOKIE["cookie_usuario"]); 
        }

        if(!isset($_SESSION["usuario"])) {
            header("Location: formulario_login.php");
            exit();
        }
    }

    public static function obtenerUsuarioPorId($id)
    {
        $conexion = BD::connect(); 
        $consulta = "SELECT id, mail, nombre FROM usuarios WHERE id = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $usuario_db = mysqli_fetch_assoc($resultado);
            return $usuario_db; 
        }

        return null;
    }

    public static function comprobarDuplicidad($correo){
        $conexion = BD::connect(); 

        $consulta = "SELECT id, nombre, mail FROM usuarios WHERE mail = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $usuario_db = mysqli_fetch_assoc($resultado);
            return $usuario_db; 
        }

        return null;

    }

    public static function obtenerUsuario($correo)
    {
        $conexion = BD::connect(); 

        $consulta = "SELECT id, nombre, mail, password 
                    FROM usuarios 
                    WHERE mail = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $usuario_db = mysqli_fetch_assoc($resultado);
            return $usuario_db; 
        }

        return null;
    }

    public static function obtenerUsuarioToken($token)
    {
        $conexion = BD::connect(); 

        $consulta = "SELECT id, mail, password 
                    FROM usuarios 
                    WHERE token = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $usuario_db = mysqli_fetch_assoc($resultado);
            return $usuario_db; 
        }

        return null;
    }

    /*Si añadimos & al parámetro le pasamos la referencia de la variable, y la variable cambiará fuera del método*/
    public static function hacerLogin($usuario, $password, &$error) 
    {   /*si no ha encontrado (empty) un usuario, devuelve un mensaje de error*/
        if (empty($usuario)) {
            $error = "El usuario o la contraseña  no son correctos";
            return; 
        }
        $id_usuario = $usuario["id"]; //id del array obtenido en obtenerUsuario (fila de la select)
        $password_encriptada = $usuario["password"];  //pasword del array de obtenerUsuario
        unset($usuario["password"]); //elimino del array la password para que no esté en sesión
        /*si la contraseña del post no es igual que la encriptada en la base de datos, 
        devuelve un mensaje de error*/
        /*El metodo password_verify pide por parámetros primero la contraseña del post, y luego la de la base de datos*/
        if (!password_verify($password, $password_encriptada)) {
            $error = "El usuario o la contraseña  no son correctos";
            return; 
        }
        //almacena en sesión el usuario de obtener usuario
        $_SESSION["usuario"] = $usuario;
        //crea la cookie
        setcookie('cookie_usuario', $id_usuario, time() + 3600, '/'); 
        
        header("Location: index_area_clientes.php"); 
        exit(); 
    }


    public static function signin()
    {
        if(isset($_POST["registrarse"])) {
            $correo = $_POST["correo"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $telefono = $_POST["telefono"];
            //metodo password_hash para encriptar la passsword
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            self::registrarUsuario($correo, $nombre, $apellidos, $telefono, $password);
            $usuario = self::obtenerUsuario($correo);
            $error = ""; 
            self::hacerLogin($usuario, $_POST["password"], $error);
        }
    }

    public static function registrarUsuario($correo, $nombre, $apellidos, $telefono, $password)
    {
        $conexion = BD::connect();

        $consulta = "INSERT INTO usuarios (mail, nombre, apellidos, telefono, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('sssss', $correo, $nombre, $apellidos, $telefono, $password);

        return $stmt->execute();
    }

    public static function comprobarCliente() 
    {
        if (isset($_POST["crearCliente"])  
            && $_SERVER["REQUEST_METHOD"] === 'POST') {
            $nombre = $_POST["nombre"]; 
            $apellidos = $_POST["apellidos"]; 
            $mail = $_POST["correo"]; 
            $telefono = $_POST["telefono"]; 
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $descripcion = $_POST["descripcion"]; 
            // if(self::comprobarDuplicidad($mail)==false){
            self::registrarCliente($mail, $password, $nombre, $apellidos, $descripcion, $telefono);
            // }else{
            //     return false;
            //     //return $error = "El usuario ya existe";
            // }
            header("Location: clientes.php");
        }
    }

    public static function registrarCliente($mail, $password, $nombre, $apellidos, $descripcion, $telefono)
    {
        $conexion = BD::connect();

        $consulta = "INSERT INTO usuarios (mail, nombre, apellidos, telefono, password, descripcion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ssssss', $mail, $nombre, $apellidos, $telefono, $password, $descripcion);

        return $stmt->execute();
    }

    public static function mostrarClientes()
    {
        $conexion = BD::connect();
        $usuarios = array(); 
        $consulta = "SELECT * FROM usuarios";
        $resultado =  mysqli_query($conexion, $consulta);
        
        while ($usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $id = $usuario['id'];
            $nombre = $usuario['nombre']; 
            $apellidos = $usuario['apellidos']; 
            $mail = $usuario['mail']; 
            $fecha = $usuario['fecha']; 
            $telf = $usuario['telefono']; 
            $descripcion = $usuario['descripcion'];


            $nuevoUsuario = new Usuario($id, 2, $nombre, $apellidos, $mail, $fecha, $descripcion, $telf); 
            array_push($usuarios, $nuevoUsuario);   
        }

        return $usuarios; 
    }

    public static function eliminarCliente($id)
    {
        $conexion = BD::connect();

        $consulta = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }

    public static function obtenerCliente($id)
    {
        $conexion = BD::connect();

        $consulta = "SELECT id, nombre, apellidos, mail, fecha, descripcion, telefono FROM usuarios where id = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
            $id = $usuario['id'];
            $nombre = $usuario['nombre']; 
            $apellidos = $usuario['apellidos']; 
            $mail = $usuario['mail']; 
            $fecha = $usuario['fecha'];
            $telf = $usuario['telefono']; 
            $descripcion = $usuario['descripcion']; 
    

            return new Usuario($id, 2, $nombre, $apellidos, $mail, $fecha, $descripcion, $telf); 
        }

        return null;
    }

    public static function modificarCliente($id) 
    {
            $nombre = $_POST["nombre"]; 
            $apellidos = $_POST["apellidos"]; 
            $correo = $_POST["correo"]; 
            $telefono = $_POST["telefono"]; 
            $descripcion = $_POST["descripcion"]; 

            self::modificarRegistroCliente($id, $nombre, $apellidos, $correo, $telefono, $descripcion);
    }

    public static function modificarRegistroCliente($id, $nombre, $apellidos, $correo, $telefono, $descripcion)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE usuarios SET nombre = ?, apellidos = ?, mail = ?, telefono = ?, descripcion = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('sssssi', $nombre, $apellidos, $correo, $telefono, $descripcion, $id);
        
        return $stmt->execute();
    }

    public static function cambiarContrasena($usuario, $password, $nuevo_password)
    {   
        $password_encriptada = $usuario["password"];
        if (!password_verify($password, $password_encriptada)) {
            $error = "El usuario o la contraseña  no son correctos";
            return false; 
        }else{                     
            $new_password = password_hash($nuevo_password, PASSWORD_DEFAULT);
            $id_usuario = $usuario['id'];
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
        $consulta = "UPDATE usuarios SET password = ? 
                    WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('si', $contrasena_encriptada, $id_usuario);              
        $stmt->execute();
    }

    public static function modificarTokenContrasena($id, $token)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE usuarios SET token = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('si', $token, $id);
        
        return $stmt->execute();
    }

    public static function modificarCuenta($id) 
    {
            $nombre = $_POST["nombre"]; 
            $apellidos = $_POST["apellidos"]; 
            $correo = $_POST["correo"]; 
            $telefono = $_POST["telefono"]; 

            self::modificarCuentaCliente($id, $nombre, $apellidos, $correo, $telefono);
            $_SESSION["usuario"]["nombre"] = $nombre; 
            $_SESSION["usuario"]["mail"] = $correo; 

    }

    public static function modificarCuentaCliente($id, $nombre, $apellidos, $correo, $telefono)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE usuarios SET nombre = ?, apellidos = ?, mail = ?, telefono = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ssssi', $nombre, $apellidos, $correo, $telefono, $id);
        
        return $stmt->execute();
        
    }
}


