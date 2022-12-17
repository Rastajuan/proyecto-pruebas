<?php

namespace Proyecto;

require_once "util/BD.php";
require_once "util/Session.php";
require_once "manejadores/ManejadorPedido.php";

use Proyecto\Manejadores\ManejadorPedido;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionIniciada()) {
    header("Location: formulario_login.php");
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mis pedidos | García Music Luthier</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Consulta el estado y modifica tus pedidos realizados en García Music.">
        <meta name="title" content="Mis pedidos | García Music Luthier">
        <meta name="keywords" content="García Music, Luthier, reparar instrumentos, pedidos">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>

        <!-- Llamada al archivo externo que contiene la cabecera -->
        <?php include "menu_area_clientes.php"; ?>

        <div class="row submenuAC">
            <div class="row">
                <a href="index_area_clientes.php" class="volverInicioAC">
                    <i class="bi bi-arrow-left-short"></i>Volver
                </a>
            </div>
            <div class="row d-flex justify-content-between align-items-center mt-5">
                <div class="col-sm-4 bienvenida">
                    <h1>Mis pedidos</h1>
                </div>
                <form class="col-3 d-flex me-5" role="search">
                    <input class="form-control me-2 buscadorAC" type="search" placeholder="Buscar" aria-label="Search">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="panelClientes">
                <div class="fichasClientes">
                    <table cellspacing=0>
                        <tr>
                            <th>Fecha</th>
                            <th>Código</th>
                            <th>Servicio</th>
                            <th>Estado</th>
                            <th>Dirección recogida</th>
                            <th>Direccion envio</th>
                        </tr>
                        <?php
                            $pedidos = ManejadorPedido::mostrarPedidosUsuario();
                            foreach($pedidos as $pedido): ?>
                                <tr>
                                    <td><?= $pedido['fecha'] ?></td>
                                    <td><?= $pedido['codigopedido'] ?></td>
                                    <td><?= $pedido['nombreservicio'] ?></td>
                                    <td><?= $pedido['estadopedido'] ?></td>
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
                                </tr>
                        <?php  endforeach;  ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Llamada al archivo externo que contiene el footer -->
        <?php include "footer_web_cliente.php"; ?>
    </body>
</html>