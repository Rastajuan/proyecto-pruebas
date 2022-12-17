<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorUsuario.php';
require_once 'Manejadores/ManejadorAdministrador.php';
require_once "util/Session.php";

use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Manejadores\ManejadorAdministrador;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

ManejadorAdministrador::comprobarLoginAdministrador();

$error = "";
if (isset($_POST["crearCliente"])) {
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    if (ManejadorUsuario::comprobarDuplicidad($correo) == false) {
        ManejadorUsuario::comprobarCliente();
    } else {
        $error = "El usuario ya existe";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Clientes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta y administra la información de tus clientes, así como los pedidos que han realizado y los mensajes que habéis intercambiado.">
    <meta name="title" content="Clientes">
    <meta name="keywords" content="clientes, panel administrador">
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
                <h1 class="tituloPanel">Clientes</h1>
            </div>
            <div class="col-sm-6">
                <a href="formulario_insertar_cliente.php" class="btn btn-secondary">Añadir cliente</a>
            </div>
        </div>

        <div class="panelClientes">
            <div class="fichasClientes">
                <table cellspacing=0>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>

                    </tr>
                    <?php
                    $usuarios = ManejadorUsuario::mostrarClientes();
                    foreach ($usuarios as $usuario) :  ?>
                        <tr>
                            <td><?= $usuario->getNombre() ?></td>
                            <td><?= $usuario->getApellidos() ?></td>
                            <td><?= $usuario->getMail() ?></td>
                            <td><?= $usuario->getTelefono() ?></td>
                            <td><?= $usuario->getFecha() ?></td>
                            <td><?= $usuario->getDescripcion() ?></td>
                            <td>
                                <a class="button_delete" href="borrarcliente.php?id=<?= $usuario->getId() ?>">
                                    Eliminar
                                </a>
                            </td>
                            <td>
                                <a class="button_delete" href="modificarcliente.php?id=<?= $usuario->getId() ?>">
                                    Editar
                                </a>
                            </td>

                        </tr>
                    <?php endforeach;  ?>
                </table>
            </div>
        </div>
        <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;"></div>
    </div>

    <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
    <script src="assets/js/menuLateralJumac.js"></script>
</body>

</html>