<?php 

namespace Proyecto;

//require_once 'Manejadores/ManejadorProveedor.php';
require_once 'Manejadores/ManejadorUsuario.php';
require_once 'Util/Session.php';

//use Proyecto\Manejadores\ManejadorProveedor;
use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Util\Session;

session_start();
ManejadorUsuario::comprobarLogin();
ManejadorUsuario::comprobarCliente(); 
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Área Clientes | García Music</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Gestiona tus pedidos y tu cuenta en García Music.">
        <meta name="title" content="Área Clientes | García Music">
        <meta name="keywords" content="area clientes, García Music">
        <meta name="robots" content="noindex, nofollow">    
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
        
        <!-- Llamada al archivo externo que contiene la cabecera -->
        <?php include "menu_area_clientes.php"; ?>
        
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-sm-4 bienvenida ms-5"><?= "Bienvenido, " . $_SESSION["usuario"]["nombre"]  ?></div>
            <form class="col-3 d-flex me-5" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="row d-flex justify-content-around mt-3" id="seccionesAC">
                <div class="col-md-3 d-flex flex-column align-items-center mb-5">
                    <img src="assets/images/limpieza_saxofon.jpg" class="imgSeccionAC" alt="seccion pedidos">
                    <h2>Mis pedidos</h2>
                    <p class="descripcionSeccion">Aquí puedes consultar el estado de tu pedido. También puedes modificar tu pedido actual, ¡si aún estás a tiempo!</p>
                    <a href="pedidos_web_cliente.php" class="btn btn-warning col-lg-6">Acceder</a>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center mb-5">
                    <img src="assets/images/acabado_vintage_trompeta.jpg" class="imgSeccionAC" alt="seccion perfil">
                    <h2>Mi Cuenta</h2>
                    <p class="descripcionSeccion">Este es el lugar si necesitas modificar los datos de tu cuenta y guardarlos para futuros pedidos.</p>
                    <a href="cuenta_web_cliente.php" class="btn btn-warning col-lg-6">Acceder</a>
                </div>
                <div class="col-md-3 d-flex flex-column align-items-center mb-5">
                    <img src="assets/images/tienda_garcia_music.jpg" class="imgSeccionAC" alt="seccion contacto">
                    <h2>Contacto</h2>
                    <p class="descripcionSeccion">¿Tienes alguna duda? ¡Contáctanos a través de nuestro chat o llámanos si lo prefieres!</p><br>
                    <a href="contacto_web_cliente.php" class="btn btn-warning col-lg-6">Acceder</a>
                </div>
            </div>
        </div>

        <!-- Llamada al archivo externo que contiene el footer -->
        <?php include "footer_web_cliente.php"; ?>
        
    </body>
</html>