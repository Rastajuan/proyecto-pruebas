<?php

namespace Proyecto\Manejadores;

require_once 'Util/BD.php';
require_once 'Entidades/proveedor.php';
require_once 'Entidades/transportista.php';

use Proyecto\Entidades\Proveedor;
use Proyecto\Entidades\Transportista;
use Proyecto\Util\BD;

class ManejadorProveedor
{
    public static function comprobarProveedor() 
    {
        if (isset($_POST["crearProveedor"]) &&
            $_SERVER["REQUEST_METHOD"] === 'POST'
        ) {
            $nombre = $_POST["nombre"]; 
            $correo = $_POST["correo"]; 
            $telefono = $_POST["telefono"]; 
            $descripcion = $_POST["descripcion"]; 

            self::registrarProveedor($nombre, $correo, $telefono, $descripcion);
            header("Location: proveedores.php");
        }
    }
    public static function comprobarProveedorCreado($correo) 
    {
        $conexion = BD::connect();
        $consulta = "SELECT mail FROM proveedores WHERE mail = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado) {
            $proveedor_db = mysqli_fetch_assoc($resultado);
            return $proveedor_db;              
        }
        return null;
    }

    public static function registrarProveedor($nombre, $correo, $telefono, $descripcion)
    {
        $conexion = BD::connect();

        $consulta = "INSERT INTO proveedores (nombre, mail, telf, descripcion) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ssss', $nombre, $correo, $telefono, $descripcion);

        return $stmt->execute();
    }

    public static function mostrarProveedores()
    {
        $conexion = BD::connect();
        $proveedores = array(); 
        $consulta = "SELECT * FROM proveedores";
        $resultado =  mysqli_query($conexion, $consulta);
        
        while ($proveedor = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $id = $proveedor['id'];
            $nombre = $proveedor['nombre']; 
            $mail = $proveedor['mail']; 
            $telf = $proveedor['telf']; 
            $descripcion = $proveedor['descripcion'];

            $nuevoProveedor = new Proveedor($id, $nombre, $mail, $telf, $descripcion); 
            array_push($proveedores, $nuevoProveedor);   
        }

        return $proveedores; 
    }

    public static function eliminarProveedor($id)
    {
        $conexion = BD::connect();

        $consulta = "DELETE FROM proveedores WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }

    public static function comprobarTransportista() 
    {
        if (isset($_POST["nuevoTransportista"]) &&
            $_SERVER["REQUEST_METHOD"] === 'POST'
        ) {
            $nombre = $_POST["nombre"];  
            self::registrarTransportista($nombre);
            header("Location: proveedores.php");
        }
    }

    public static function registrarTransportista($nombre)
    {
        $conexion = BD::connect();

        $consulta = "INSERT INTO transportistas (nombre) VALUES (?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $nombre);

        return $stmt->execute();
    }

    public static function mostrarTransportistas()
    {
        $conexion = BD::connect();
        $transportistas = array(); 
        $consulta = "SELECT * FROM transportistas";
        $resultado =  mysqli_query($conexion, $consulta);
        
        while ($transportista = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $id = $transportista['id'];
            $nombre = $transportista['nombre']; 

            $nuevoTransportista = new Transportista($id, $nombre); 
            array_push($transportistas, $nuevoTransportista);   
        }

        return $transportistas; 
    }

    public static function eliminarTransportista($id)
    {
        $conexion = BD::connect();

        $consulta = "DELETE FROM transportistas WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('i', $id);

        return $stmt->execute();
    }

    public static function obtenerProveedor($id)
    {
        $conexion = BD::connect();

        $consulta = "SELECT id, nombre, mail, telf, descripcion FROM proveedores where id = ?"; 
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado) {
            $proveedor = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
            $id = $proveedor['id'];
            $nombre = $proveedor['nombre']; 
            $mail = $proveedor['mail']; 
            $telf = $proveedor['telf']; 
            $descripcion = $proveedor['descripcion']; 
    

            return new Proveedor($id, $nombre, $mail, $telf, $descripcion); 
        }

        return null;
    }

    public static function modificarProveedor($id) 
    {
            $nombre = $_POST["nombre"]; 
            $correo = $_POST["correo"]; 
            $telefono = $_POST["telefono"]; 
            $descripcion = $_POST["descripcion"]; 

            self::modificarRegistro($id, $nombre, $correo, $telefono, $descripcion);
    }

    public static function modificarRegistro($id, $nombre, $correo, $telefono, $descripcion)
    {
        $conexion = BD::connect();

        $consulta = "UPDATE proveedores SET nombre = ?, mail = ?, telf = ?, descripcion = ? WHERE id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ssssi', $nombre, $correo, $telefono, $descripcion, $id);
        
        return $stmt->execute();
    }
}
