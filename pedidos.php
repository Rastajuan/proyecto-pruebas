<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorAdministrador.php';
require_once 'Manejadores/ManejadorPedido.php';

use Proyecto\Manejadores\ManejadorPedido;
use Proyecto\Manejadores\ManejadorAdministrador;
session_start();

ManejadorAdministrador::comprobarLoginAdministrador();

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pedidos</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Consulta y gestiona los pedidos de tus clientes.">
        <meta name="title" content="Pedidos">
        <meta name="keywords" content="pedidos, panel administración">
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
                    <h1 class="tituloPanel">Pedidos</h1>
                </div>
                <div class="col-sm-6">
                    <a href="formulario_crear_pedido_jumac.php" class="btn btn-secondary">Añadir pedido</a>
                </div>
            </div>

            <div class="panelPedidos">
                <div class="fichasPedidos">
                    <table cellspacing=0>
                    <tr>
                        <th>Fecha</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                        <th>Horas</th>
                        <th>Pago</th>
                        <th>Precio</th>
                        <th>Precio IVA</th>
                        <th>Transportista</th>
                        <th>Coste transporte</th>
                        <th>Dirección recogida</th>
                        <th>Direccion envio</th>
                        <th>Descripción</th>
                    </tr>
                    <?php
                        $pedidos = ManejadorPedido::mostrarPedidos();
                        foreach($pedidos as $pedido): ?>
                            <tr>
                                <td><?= $pedido['fecha'] ?></td>
                                <td><?= $pedido['codigopedido'] ?></td>
                                <td><?= $pedido['nombreusuario'] ?></td>
                                <td><?= $pedido['apellidosusuario'] ?></td>
                                <td><?= $pedido['telefono'] ?></td>
                                <td><?= $pedido['nombreservicio'] ?></td>
                                <td><?= $pedido['estadopedido'] ?></td>
                                <td><?= $pedido['horas'] ?></td>
                                <td><?= $pedido['pago'] ?></td>
                                <td><?= $pedido['precio'] ?></td>
                                <td><?= $pedido['precioiva'] ?></td>
                                <td><?= $pedido['transportista'] ?></td>
                                <td><?= $pedido['costetransporte'] ?></td>
                                <td>
                                    <?php echo "C/. " . $pedido['callerecogida'] .
                                               " Nº" . $pedido['numerorecogida'] .
                                               " Piso " . $pedido['pisorecogida'] .
                                               " CP: " . $pedido['cprecogida'] .
                                               "  " . $pedido['ciudadrecogida'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo "C/. " . $pedido['calleenvio'] .
                                               " Nº" . $pedido['numeroenvio'] .
                                               " Piso " . $pedido['pisoenvio'] .
                                               " CP: " . $pedido['cpenvio'] .
                                               "  " . $pedido['ciudadenvio'];
                                    ?>
                                </td>
                                <td><?= $pedido['descripcion'] ?></td>
                            </tr>
                    <?php  endforeach;  ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
        <script src="assets/js/menuLateralJumac.js"></script>

    </body>
</html>