<?php 

namespace Proyecto;

require_once 'Util/Session.php';

use Proyecto\Util\Session;
?>

<footer class="footerCliente">
    <div class="row mb-4">
        <div class="col-sm-12 d-flex justify-content-around">
            <div class="ms-2 me-2">
                <a href="#">Servicios</a>
            </div>
            <div class="ms-2 me-2">
                <a href="<?= (Session::sesionIniciada()) ? "pedidos_web_cliente.php" : "formulario_login.php" ?>">Mis pedidos</a>
            </div>
            <div class="ms-2 me-2">
                <a href="<?= (Session::sesionIniciada()) ? "contacto_web_cliente.php" : "formulario_login.php" ?>">Contacto</a>
            </div>
            <div class="ms-2 me-2">
                <a href="#">Preguntas Frecuentes</a>
            </div>
            <div class="ms-2 me-2">
                <a href="#">Sobre Nosotros</a>
            </div>
        </div>
    </div>
    <div class="row mb-4 d-flex justify-content-center">
        <div class="col-sm-2">
            <a href="#"><i class="bi bi-facebook me-2"></i></a>
            <a href="#"><i class="bi bi-instagram me-2"></i></a>
            <a href="#"><i class="bi bi-envelope-fill"></i></a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-sm-12 d-flex justify-content-center">
            <div class="ms-2 me-2">
                <a href="#">Política de Privacidad</a>
            </div>
            <div class="ms-2 me-2">
                <a href="#">Política de Cookies</a>
            </div>
            <div class="ms-2 me-2">
                <a href="#">Términos de Uso</a>
            </div>
        </div>
    </div>
    <div class="row">
        <p style="font-size:12px; color:#fff; text-align:center">Grupo 4 - Proyecto final Desarrollo de Aplicaciones Web - 2022/2023</p>
    </div>
</footer>