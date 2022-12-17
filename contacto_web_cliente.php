<?php 

namespace Proyecto;

require_once "util/BD.php";
require_once "util/Session.php";
require_once "manejadores/ManejadorUsuario.php"; 

use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionIniciada()) {
    header("Location: formulario_login.php");
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Contacto | García Music Luthier</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Contacta con García Music como prefieras: chat, email o teléfono">
        <meta name="title" content="Contacto | García Music Luthier">
        <meta name="keywords" content="García Music, Luthier, reparar instrumentos, contacto">
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
                    <h1>Contacto</h1>
                </div>
                <form class="col-3 d-flex me-5 buscadorAC" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="row panelAC">
                <!-- Aquí podéis meter todo el HTML, PHP os JS necesario para mostrar el chat
                Ya lo pondré yo bonito una vez hayáis puesto aquí todo el código-->
            </div>
            <div class="row d-flex justify-content-center mb-3">
                <h3>O si lo prefieres también puedes contactarnos por email o teléfono</h3>
            </div>
            <div class="row d-flex justify-content-center mb-5">
                <a href="mailto:ifpdawgrupo4@gmail.com" class="btn btn-warning col-sm-3 me-2">ifpdawgrupo4@gmail.com</a>
                <a href="tel:900 900 900" class="btn btn-warning col-sm-3">900 900 900</a>
            </div>
        </div>

        <!-- Llamada al archivo externo que contiene el footer -->
        <?php include "footer_web_cliente.php"; ?>
    </body>
</html>