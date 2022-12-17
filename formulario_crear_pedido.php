<?php
namespace Proyecto;

require_once 'Manejadores/ManejadorPedido.php';
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorPedido;

session_start();
if (!Session::sesionIniciada()) {
    header("Location: formulario_login.php");
}

if (isset($_POST["crearPedido"])) {
    ManejadorPedido::comprobarPedido();
    header("Location: pedidos_web_cliente.php");
}

?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Realizar un pedido</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Selecciona el tipo de servicio y añade tus datos para realizar un pedido.">
        <meta name="title" content="Realizar un pedido">
        <meta name="keywords" content="realizar pedido, formulario">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
        <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <div class="row">
            <a href="index_web_cliente.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver</a>
        </div>
            <form id="formulario" role="form" method="post" class="col-md-10" name="formulario">

                <h1 class="tituloForm">Realizar un pedido</h1>
                <div class="col-12 form-floating mb-3">
                    <select id="servicio" class="form-select" name="servicio" required>
                        <option value="" selected>Selecciona el servicio</option>
                        <option value="7">Reparación</option>
                        <option value="1">Restauración</option>
                        <option value="2">Limpieza</option>
                        <option value="3">Enzapatillado</option>
                        <option value="4">Ajuste</option>
                        <option value="5">Mantenimiento Avanzado</option>
                        <option value="6">Fabricación de piezas</option>
                    </select>
                    <label for="servicio">Servicio</label>
                </div>
                <hr class="mt-5 mb-5">
                <p><b>Dirección de recogida del instrumento:</b></p> <!--Añadir tooltip de que solo lo tiene que rellenar si
                quiere enviar el instrumento a la tienda en lugar de llevarlo en persona-->
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="direccionRecogida" class="form-control" name="direccionRecogida" placeholder="Dirección">
                    <label for="direccionRecogida">Dirección:</label>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="numeroRecogida" class="form-control" name="numeroRecogida" placeholder="Número">
                        <label for="numeroRecogida">Número:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="pisoRecogida" class="form-control" name="pisoRecogida" placeholder="Piso">
                        <label for="pisoRecogida">Piso:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="codpostalRecogida" class="form-control" name="codpostalRecogida" placeholder="Código postal">
                        <label for="codpostalRecogida">Código postal:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="ciudadRecogida" class="form-control" name="ciudadRecogida" placeholder="Ciudad">
                        <label for="paisRecogida">Ciudad:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="paisRecogida" class="form-control" name="paisRecogida" placeholder="País">
                        <label for="paisRecogida">País:</label>
                    </div>
                </div>
                <hr class="mt-5 mb-5">
                <p><b>Dirección de envío del instrumento:</b></p> <!--Añadir tooltip de que solo lo tiene que rellenar si
                quiere que enviemos el instrumento a su casa en lugar de recogerlo en persona-->
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="direccionEnvio" class="form-control" name="direccionEnvio" placeholder="Dirección">
                    <label for="direccionEnvio">Dirección:</label>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="numeroEnvio" class="form-control" name="numeroEnvio" placeholder="Número">
                        <label for="numeroEnvio">Número:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="pisoEnvio" class="form-control" name="pisoEnvio" placeholder="Piso">
                        <label for="pisoEnvio">Piso:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="codpostalEnvio" class="form-control" name="codpostalEnvio" placeholder="Código postal">
                        <label for="codpostalEnvio">Código postal:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="ciudadEnvio" class="form-control" name="ciudadEnvio" placeholder="Ciudad">
                        <label for="paisEnvio">Ciudad:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="paisEnvio" class="form-control" name="paisEnvio" placeholder="País">
                        <label for="paisEnvio">País:</label>
                    </div>
                </div>
                <hr class="mt-5 mb-5">
                <p><b>Aquí puedes adjuntar una imagen del instrumento si es necesario:</b></p>
                <div class="col-12 input-group mb-5">
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-12 mb-3">
                    <a href="mailto:garciamusic@gmail.com">¿Necesitas ayuda? ¡Contacta con nosotros!</a>
                </div>
                <div class="col-12 d-flex justify-content-center flex-wrap">
                    <button type="submit" id="iniciarSesion" class="btn btn-secondary" name="crearPedido" value="crear pedido">Realizar pedido</button>
                </div>
                <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
            </form>

        </div>

        <?php
        if (isset($error) && !empty($error)) {
        ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php
        }
        ?>
        <!--Llamada al archivo de JavaScript-->
        <script src="assets/js/validacioncrearPedido.js"></script>
    </body>

</html>

