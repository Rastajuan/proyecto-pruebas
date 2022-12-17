<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorProveedor.php';
require_once "util/Session.php";
require_once "Manejadores/ManejadorAdministrador.php";

use Proyecto\Manejadores\ManejadorAdministrador;
use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorProveedor;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

ManejadorAdministrador::comprobarLoginAdministrador();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Proveedores</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta y administra la información de tus provedores.">
    <meta name="title" content="Proveedores">
    <meta name="keywords" content="provedores, panel administrador">
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
                <h1 class="tituloPanel">Proveedores</h1>
            </div>
            <div class="col-sm-8">
                <a href="formulario_insertar_transportista.php" class="btn btn-light me-3">Añadir transportista</a>
                <a href="formulario_insertar_proveedor.php" class="btn btn-secondary">Añadir proveedor</a>
            </div>
        </div>

        <div class="panelProveedores">
            <div class="fichasProveedores">
                <table cellspacing=0>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                    <?php
                    $proveedores = ManejadorProveedor::mostrarProveedores();
                    foreach ($proveedores as $proveedor) : ?>
                        <tr>
                            <td><?= $proveedor->getNombre() ?></td>
                            <td><?= $proveedor->getMail() ?></td>
                            <td><?= $proveedor->getTelefono() ?></td>
                            <td><?= $proveedor->getDescripcion() ?></td>
                            <td>
                                <a href="borrarproveedor.php?id=<?= $proveedor->getId() ?>">Eliminar</a>
                                <a href="modificarproveedor.php?id=<?= $proveedor->getId() ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach;  ?>
                </table>
            </div>

            <div>
                <div class="col-sm-12">
                    <h3 class="tituloSubseccion">Empresas de transporte</h3>
                </div>

                <div class="cajasTransportistas">
                    <?php
                    $transportistas = ManejadorProveedor::mostrarTransportistas();
                    foreach ($transportistas as $transportista) :  ?>
                        <div class="cajaTransportista">
                            <div class="nombreTransportista"><?= $transportista->getNombre() ?></div>
                            <div class="iconBorrarTrasnportista">
                                <a href="borrartransportista.php?id=<?= $transportista->getId() ?>">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;  ?>
                </div>
            </div>
        </div>

    </div>
    <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;"></div>
    <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
    <script src="assets/js/menuLateralJumac.js"></script>

</body>

</html>