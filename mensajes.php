<?php 

namespace Proyecto;
//require_once 'Manejadores/ManejadorProveedor.php';
//require_once 'Manejadores/ManejadorUsuario.php';
require_once 'Manejadores/ManejadorAdministrador.php';

//use Proyecto\Manejadores\ManejadorProveedor;
use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Manejadores\ManejadorAdministrador;
session_start();

ManejadorAdministrador::comprobarLoginAdministrador();
//ManejadorProveedor::comprobarProveedor(); 
//ManejadorUsuario::comprobarCliente(); 
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mensajes</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Consulta y responde los mensajes de tus clientes en esta sección.">
        <meta name="title" content="Mensajes">
        <meta name="keywords" content="mensajes, chat, mensaje, panel administración">
        <meta name="robots" content="index, follow">    
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
        <!-- Llamada al achivo que contiene el menú lateral-->
        <?php require 'menu_lateral_jumac.php' ?>

        <div class="panel">
            <!-- Llamada al achivo que contiene el menú lateral-->
            <?php require 'menu_superior_jumac.php' ?>
    
            <div class="row cabeceraPanel">
                <div class="col-sm-3">
                    <h1 class="tituloPanel">Mensajes</h1>
                </div>
            </div>
        </div>

        <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
        <script src="assets/js/menuLateralJumac.js"></script>

    </body> 
</html>