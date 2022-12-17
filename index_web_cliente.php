<?php 

namespace Proyecto;

require_once "util/Session.php";

use Proyecto\Util\Session;

session_start();
 
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <title>García Music Luthier</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Especialistas en mantenimiento y reparación de instrumentos de viento-metal. También fabricamos piezas a medida.">
        <meta name="title" content="García Music Luthier">
        <meta name="keywords" content="García Music, Luthier, reparar instrumentos, viento-metal, reparar">
        <meta name="robots" content="index, follow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        
    </head>

    <body>

        <!-- Llamada al archivo externo que contiene la cabecera -->
        <?php include "menu_web_cliente.php"; ?>

        <div class="row" id="bannerPrincipalHome">
            <div class="col-md-8 d-flex flex-column mt-5 ms-5">
                <h1>Dale vida a tu música</h1>
                <p class="banner">En García Music somos especialistas en mantenimiento y reparación de instrumentos de viento-metal. También fabricamos piezas a medida.</p>
                <p class="banner">Contamos con muchos años de experiencia y realizamos envíos a toda España, ¿nos ponemos en contacto?</p>
            </div>
        </div>

        <div class="row" id="serviciosHome">
            <div class="col-12 d-flex justify-content-center">
                <ul class="nav nav-pills">
                    <li class="nav-item ms-2 me-2">
                        <button id="botReparacion" type="button" class="btn btn-light" href="#">Reparación</button>
                    </li>
                    <li class="nav-item active ms-2 me-2" aria-current="page">
                        <button id="botMantenimiento" type="button" class="btn btn-warning" href="#">Mantenimiento</button>

                    </li>
                    <li class="nav-item ms-2 me-2">
                        <button id="botRestauracion" class="btn btn-light" href="#">Restauración y fabricación</a>
                    </li>
                </ul>
            </div>


            <!--  REPARACION-->
            <div id="cardsReparacion" class="ocultarCard">
                <div class="d-flex justify-content-around mt-5 ">
                    <div class="card cardTabs">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Reparación</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                </div>
            </div>


            <!--  MANTENIMIENTO-->
            <div id="cardsMantenimiento" class="mostrarCard">
                <div class="d-flex justify-content-center mt-5 ">
                    <div class="card cardTabs ms-2 me-2">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Limpieza</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                    <div class="card cardTabs ms-2 me-2">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Enzapatillado</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                    <div class="card cardTabs ms-2 me-2">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Ajuste</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                    <div class="card cardTabs ms-2 me-2">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Mantenimiento Avanzado</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  RESTAURACION-->
            <div id="cardsRestauracion" class="ocultarCard">
                <div class="d-flex justify-content-around mt-5">
                    <div class="card cardTabs">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">Restauración y fabricación</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <a href="<?= (Session::sesionIniciada()) ? "formulario_crear_pedido.php" : "formulario_login.php" ?>" class="btn btn-warning mb-2">Contratar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row mb-5" id="quienesSomosHome">
            <div class="col-sm-4 ms-5 mt-3 mb-3 d-flex justify-content-end">
                <img src="assets/images/garcia_music_reparacion.jpg" class="imgGaleria" alt="luthier reparando instrumento">
            </div>
            <div class="col-sm-6 mt-3 d-flex flex-column justify-content-center">
                <h3>¿Quiénes somos?</h3>
                <p>En García Music somos especialistas en mantenimiento y reparación de instrumentos de viento-metal. También fabricamos piezas a medida.</p>
                <p>Contamos con muchos años de experiencia y realizamos envíos a toda España, ¿nos ponemos en contacto?</p>
            </div>
        </div>

        <div class="row mb-5" id="contactoHome">
            <h2 class="mb-5">¿Nos ponemos en contacto?</h2>
            <div class="col-md-12 d-flex">
                <div class="col-md-5 ms-5">
                    <?php include "formulario_contacto_web_cliente.php"?>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="assets/images/ubicacion_garcia_music.jpg" class="imgGrande" alt="ubicación taller García Music">
                </div>
            </div>
        </div>

        <div class="row mb-5" id="galeriaHome">
            <h2 class="mb-5">Galería</h2>
            <div class="col-sm-12" style="text-align: center;"> <!--Quitar este CSS inline cuando se haga el carrusel-->
                <img src="assets/images/garcia_music_luthiers.jpg" class="imgGaleria m-2" alt="García Music luthier">
                <img src="assets/images/acabado_vintage_saxofon.jpg" class="imgGaleria m-2" alt="Acabado vintage saxofon">
                <img src="assets/images/acabado_vintage_saxofon2.jpg" class="imgGaleria m-2" alt="Acabado vintage saxofon">
                <img src="assets/images/acabado_vintage_trompeta.jpg" class="imgGaleria m-2" alt="Acabado vintage saxofon">
                <img src="assets/images/acabado_vintage_trompeta2.jpg" class="imgGaleria m-2" alt="Acabado vintage trompeta">
                <img src="assets/images/acabado_vintage_trompeta3.jpg" class="imgGaleria m-2" alt="Acabado vintage trompeta">
                <img src="assets/images/enzapatillado1.JPG" class="imgGaleria m-2" alt="Enzapatillado">
                <img src="assets/images/enzapatillado2.JPG" class="imgGaleria m-2" alt="Enzapatillado">
                <img src="assets/images/fabricacion_boquilla.jpeg" class="imgGaleria m-2" alt="Fabricacion boquilla trompeta">
                <img src="assets/images/fabricacion_piezas_instrumentos.jpg" class="imgGaleria m-2" alt="Fabricacion piezas instrumentos">
                <img src="assets/images/limpieza_instrumentos.png" class="imgGaleria m-2" alt="Limpieza instrumentos">
                <img src="assets/images/limpieza_saxofon.jpg" class="imgGaleria m-2" alt="Limpieza saxofon">
                <img src="assets/images/restauracion_boquillas.jpg" class="imgGaleria m-2" alt="Restauracion boquillas instrumentos">
                <img src="assets/images/restauracion_boquillas2.jpg" class="imgGaleria m-2" alt="Restauracion boquillas instrumentos">
                <img src="assets/images/taller_garcia_music.jpg" class="imgGaleria m-2" alt="Taller García Music">
                <img src="assets/images/taller_garcia_music2.jpg" class="imgGaleria m-2" alt="Taller García Music">
                <img src="assets/images/tienda_garcia_music.jpg" class="imgGaleria m-2" alt="Tienda García Music">
                <img src="assets/images/tienda_garcia_music2.png" class="imgGaleria m-2" alt="Tienda García Music">
            </div>
        </div>

        <!-- Llamada al archivo externo que contiene el footer -->
        <?php include "footer_web_cliente.php"; ?>

        <!-- Archivo JS -->
        <script src="assets/js/cardsIndexCliente.js"></script>
        <script src="assets/js/slider.js"></script>
    </body>

</html>