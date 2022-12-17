<?php

namespace Proyecto\Manejadores;

require_once 'Util/BD.php';
require_once 'Entidades/pedido.php';

use mysqli;
use Proyecto\Entidades\Pedido;
use Proyecto\Util\BD;
use DateTime;

class ManejadorPedido
{

    public static function comprobarPedido()
    {
        if (isset($_POST["crearPedido"]) &&
            $_SERVER["REQUEST_METHOD"] === 'POST'
        ) {
            $usuarios_id = $_SESSION["usuario"]["id"];

            $servicios_id = $_POST["servicio"];

            $calleRecogida = $_POST["direccionRecogida"];
            $numeroRecogida = $_POST["numeroRecogida"];
            $pisoRecogida = $_POST["pisoRecogida"];
            $CPRecogida = $_POST["codpostalRecogida"];
            $ciudadRecogida = $_POST["ciudadRecogida"];
            $paisRecogida = $_POST["paisRecogida"];

            $calleEnvio = $_POST["direccionEnvio"];
            $numeroEnvio = $_POST["numeroEnvio"];
            $pisoEnvio = $_POST["pisoEnvio"];
            $CPEnvio = $_POST["codpostalEnvio"];
            $ciudadEnvio = $_POST["ciudadEnvio"];
            $paisEnvio = $_POST["paisEnvio"];

            if(self::registrarDireccionRecogida($calleRecogida, $numeroRecogida, $pisoRecogida, $CPRecogida, $ciudadRecogida, $paisRecogida)==true){
                $direccionRecogida_id = self:: obtenerIdDireccionRecogida();
            }//Si se registra la direccion, se hace un select para ya almacenar la direccionrecogida_id.


            if(self::registrarDireccionEnvio($calleEnvio, $numeroEnvio, $pisoEnvio, $CPEnvio, $ciudadEnvio, $paisEnvio)==true){
                $direccionEnvio_id = self:: obtenerIdDireccionEnvio();
            }//Igual que antes pero en direccionenvio_id

            if($direccionRecogida_id != null && $direccionEnvio_id != null){

                $codigoPedido = self::numeroPedidoRandom();

                if(self::registrarPedido($codigoPedido, $usuarios_id, $direccionEnvio_id, $direccionRecogida_id)==true) {
                    $pedido_id = self::obtenerPedidoId();
                    self::registrarDetallePedido($pedido_id, $servicios_id);
                }
            }


        }
    }

    public static function numeroPedidoRandom(){
        $letraAleatoria = chr(rand(ord("A"), ord("Z")));
        $numeroAleatorio = rand(1, 100000);
        $codigoPedido = $letraAleatoria.$numeroAleatorio;
        while(self::comprobarCodigos($codigoPedido) == true){
            $letraAleatoria = chr(rand(ord("A"), ord("Z")));
            $numeroAleatorio = rand(1, 100000);
            $codigoPedido = $letraAleatoria.$numeroAleatorio;
        }
        return $codigoPedido;
    }

    public static function comprobarCodigos($codigoPedido){

        $conexion = BD::connect();
        $consulta = "SELECT codigopedido
                        FROM pedidos
                        WHERE codigopedido = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('s', $codigoPedido);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

    public static function registrarDireccionRecogida($calleRecogida, $numeroRecogida, $pisoRecogida, $CPRecogida, $ciudadRecogida, $paisRecogida)
    {
        //Guardar en $direccionrecogida_id el resultado de una SELECT id FROM direcciones LIMIT 1 ORDER BY DESC.
        $conexion = BD::connect();
        $consulta = "INSERT INTO direcciones (calle, numero, piso, cp, ciudad, pais)
                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('sisiss', $calleRecogida, $numeroRecogida, $pisoRecogida, $CPRecogida, $ciudadRecogida, $paisRecogida);
        $stmt->execute();
        return true;

    }

    public static function registrarDireccionEnvio($calleEnvio, $numeroEnvio, $pisoEnvio, $CPEnvio, $ciudadEnvio, $paisEnvio)
    {
        //Guardar en $direccionenvio_id el resultado de una SELECT id FROM direcciones LIMIT 1 ORDER BY DESC.
        $conexion = BD::connect();
        $consulta = "INSERT INTO direcciones (calle, numero, piso, cp, ciudad, pais)
                    VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('sisiss', $calleEnvio, $numeroEnvio, $pisoEnvio, $CPEnvio, $ciudadEnvio, $paisEnvio);
        $stmt->execute();
        return true;
    }


    public static function obtenerIdDireccionRecogida(){

        $conexion = BD::connect();
        $consulta = "SELECT id
        FROM direcciones
        ORDER BY id DESC
        LIMIT 1";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado) {
        $direccionrecogida_id = mysqli_fetch_assoc($resultado);
        return reset($direccionrecogida_id);
        }
        return null;
    }

    public static function obtenerIdDireccionEnvio(){

        $conexion = BD::connect();
        $consulta = "SELECT id
        FROM direcciones
        ORDER BY id DESC
        LIMIT 1";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado) {
        $direccionenvio_id = mysqli_fetch_assoc($resultado);
        return reset($direccionenvio_id);
        }
        return null;

    }

    public static function registrarPedido($codigoPedido, $usuarios_id, $direccionEnvio_id, $direccionRecogida_id)
    {

        $conexion = BD::connect();
        $consulta = "INSERT INTO pedidos (codigopedido, usuarios_id, direccionenvio_id, direccionrecogida_id)
                    VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('siii', $codigoPedido, $usuarios_id, $direccionEnvio_id, $direccionRecogida_id);
        $stmt->execute();
        return true;
    }

    public static function registrarDetallePedido($pedido_id, $id_servicios)
    {
        $conexion = BD::connect();
        $consulta = "INSERT INTO detallespedido (pedido_id, servicios_id)
                    VALUES (?, ?)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param('ii', $pedido_id, $id_servicios);
        $stmt->execute();

    }

    public static function obtenerPedidoId(){

        $conexion = BD::connect();
        $consulta = "SELECT id
        FROM pedidos
        ORDER BY id DESC
        LIMIT 1";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado) {
        $pedido_id = mysqli_fetch_assoc($resultado);
        return reset($pedido_id);
        }
        return null;

    }

    public static function mostrarPedidos()
    {
        $conexion = BD::connect();
        $consulta = "SELECT p.id,
                            p.codigopedido,
                            p.fecha,
                            p.codigopedido,
                            p.horas,
                            p.costetransporte,
                            p.descripcion,
                            u.nombre as nombreusuario,
                            u.apellidos as apellidosusuario,
                            u.telefono, 
                            s.nombre as nombreservicio,
                            dp.precio as precio,
                            dp.IVA as precioiva,
                            ep.tipo as estadopedido,
                            pa.estado as pago,
                            t.nombre as transportista,
                            de.calle as calleenvio,
                            de.numero as numeroenvio,
                            de.piso as pisoenvio,
                            de.cp as cpenvio,
                            de.ciudad as ciudadenvio,
                            dr.calle as callerecogida,
                            dr.numero as numerorecogida,
                            dr.piso as pisorecogida,
                            dr.cp as cprecogida,
                            dr.ciudad as ciudadrecogida
                    FROM pedidos p
                    INNER JOIN usuarios u ON p.usuarios_id = u.id
                    LEFT JOIN estadopago pa ON p.estadopago_id = pa.id
                    LEFT JOIN detallespedido dp ON dp.pedido_id = p.id
                    INNER JOIN servicios s ON dp.servicios_id = s.id
                    INNER JOIN estadopedido ep ON p.estadopedido_id = ep.id
                    INNER JOIN direcciones de ON p.direccionenvio_id = de.id
                    INNER JOIN direcciones dr ON p.direccionrecogida_id = dr.id
                    LEFT JOIN transportistas t ON P.transportistas_id = t.id";
        $resultado =  mysqli_query($conexion, $consulta);
        $pedidos = [];

        while($pedido = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $pedido['fecha'] = (new DateTime($pedido['fecha']))->format('d/m/Y');
            array_push($pedidos, $pedido);
        }

        return $pedidos;

    }

    public static function mostrarPedidosUsuario()
    {
        $conexion = BD::connect();
        $usuario = $_SESSION["usuario"]["id"];
        $consulta = "SELECT p.id,
                            p.fecha,
                            p.codigopedido,
                            s.nombre as nombreservicio,
                            ep.tipo as estadopedido,
                            de.calle as calleenvio,
                            de.numero as numeroenvio,
                            de.piso as pisoenvio,
                            de.cp as cpenvio,
                            de.ciudad as ciudadenvio,
                            dr.calle as callerecogida,
                            dr.numero as numerorecogida,
                            dr.piso as pisorecogida,
                            dr.cp as cprecogida,
                            dr.ciudad as ciudadrecogida
                    FROM pedidos p
                    INNER JOIN detallespedido dp ON dp.pedido_id = p.id
                    INNER JOIN servicios s ON dp.servicios_id = s.id
                    INNER JOIN estadopedido ep ON p.estadopedido_id = ep.id
                    INNER JOIN direcciones de ON p.direccionenvio_id = de.id
                    INNER JOIN direcciones dr ON p.direccionrecogida_id = dr.id
                    WHERE usuarios_id = $usuario";

        $resultado =  mysqli_query($conexion, $consulta);
        $pedidos = [];

        while($pedido = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $pedido['fecha'] = (new DateTime($pedido['fecha']))->format('d/m/Y');
            array_push($pedidos, $pedido);
        }

        return $pedidos;

    }

}