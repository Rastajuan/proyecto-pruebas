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
        <title>Iniciar sesión</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Inicia sesión con tus datos y accede al contenido.">
        <meta name="title" content="Iniciar sesión">
        <meta name="keywords" content="iniciar sesión, panel administración">
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
    
            <div class="bienvenido">
                <span><?= "Bienvenido, " . $_SESSION["administrador"]["nombre"]  ?></span>
            </div>

            <div class="cajasAlertas">
                <div class="cajaStats">
                    <div>
                        <div class="numeros">3</div>
                        <div class="cardTitulo">Pedidos nuevos</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
                <div class="cajaStats">
                    <div>
                        <div class="numeros">540,20</div>
                        <div class="cardTitulo">En pedidos este mes</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                </div>
                <div class="cajaStats">
                    <div>
                        <div class="numeros">2304,00</div>
                        <div class="cardTitulo">El mes pasado</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                </div>
                <div class="cajaStats">
                    <div>
                        <div class="numeros">12</div>
                        <div class="cardTitulo">Mensajes nuevos</div>
                    </div>
                    <div class="iconBox">
                        <i class="bi bi-chat-left-text"></i>
                    </div>
                </div>
            </div>

            <div class="tablasResumen">
                <div class="pedidosRecientes">
                    <div class="cardCabecera">
                        <h2>Últimos pedidos</h2>
                        <a href="pedidos.php" class="btn">Ver todos</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Cliente</td>
                                <td>Tipo</td>
                                <td>Precio</td>
                                <td>Estado</td>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td>Lucía Gómez</td>
                                <td>Reparación</td>
                                <td>185,75€</td>
                                <td><span class="estado nuevo">Nuevo</span></td>
                            </tr>
                            <tr>
                                <td>Juanjo López</td>
                                <td>Mantenimiento avanzado</td>
                                <td>250,50€</td>
                                <td><span class="estado nuevo">Nuevo</span></td>
                            </tr>
                            <tr>
                                <td>Iván García</td>
                                <td>Limpieza</td>
                                <td>80,00€</td>
                                <td><span class="estado enCurso">En curso</span></td>
                            </tr>
                            <tr>
                                <td>Paul Márquez</td>
                                <td>Reparación</td>
                                <td>92,00€</td>
                                <td><span class="estado enCurso">En curso</span></td>
                            </tr>
                            <tr>
                                <td>María Luisa Pérez</td>
                                <td>Ajuste</td>
                                <td>35,00€</td>
                                <td><span class="estado enviado">Enviado</span></td>
                            </tr>
                            <tr>
                                <td>Pablo Rodriguez</td>
                                <td>Ajuste</td>
                                <td>47,50€</td>
                                <td><span class="estado enCurso">En curso</span></td>
                            </tr>
                            <tr>
                                <td>Diana Aguilar</td>
                                <td>Limpieza</td>
                                <td>75,50€</td>
                                <td><span class="estado cerrado">Cerrado</span></td>
                            </tr>
                            <tr>
                                <td>Mario Pérez</td>
                                <td>Enzapatillado</td>
                                <td>120,20€</td>
                                <td><span class="estado enviado">Enviado</span></td>
                            </tr>
                            <tr>
                                <td>Diana Torres</td>
                                <td>Fabricación</td>
                                <td>175,40€</td>
                                <td><span class="estado cerrado">Cerrado</span></td>
                            </tr>
                    </table>
                </div>
                <div class="mensajesRecientes">
                    <div class="cardCabecera">
                        <h2>Últimos mensajes</h2>
                        <a href="mensajes.php" class="btn">Ver todos</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
        <script src="assets/js/menuLateralJumac.js"></script>

    </body> 
</html>