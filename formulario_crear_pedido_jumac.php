<?php

namespace Proyecto;

require_once "util/BD.php";
require_once "util/Session.php";
require_once "manejadores/ManejadorProveedor.php";
require_once "entidades/estadopago.php";
require_once "entidades/estadopedido.php";
require_once "entidades/servicios.php";

use Proyecto\Entidades\Estado;
use Proyecto\Entidades\estadopedido;
use Proyecto\Entidades\servicio;
use Proyecto\Entidades\Pago;
use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorProveedor;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

?>
<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Crear un pedido</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Selecciona el tipo de servicio y añade los datos del cliente para crear un pedido.">
        <meta name="title" content="Crear un pedido">
        <meta name="keywords" content="crear pedido, formulario">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
        <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <div class="row">
            <a href="index_jumac.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver a la página principal</a>
        </div>
            <form role="form" method="post" class="col-md-10" name="formulario">

                <h1 class="tituloForm">Crear un pedido</h1>

                <div class="d-flex flex-row justify-content-between">
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="horas" class="form-control" name="horas" placeholder="horas">
                        <label for="horas">Horas:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="precioSinIVA" class="form-control" name="precioSinIVA" placeholder="Precio sin IVA">
                        <label for="precioSinIVA">Precio sin IVA:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="precioConIVA" class="form-control" name="precioConIVA" placeholder="Precio con IVA">
                        <label for="precioConIVA">Precio con IVA:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <select id="estadoPago" class="form-select" name="estadoPago">
                            <option value="" selected>Selecciona un estado</option>
                            <?php
                                $pagos = Pago::list();
                                foreach($pagos as $clave => $pago): ?>
                                    <option value="<?= $clave ?>"><?= $pago ?></div>
                            <?php  endforeach;  ?>
                        </select>
                        <label for="estadoPago">Estado de pago</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <select id="estadoPago" class="form-select" name="estadoPago">
                            <option value="" selected>Selecciona un estado</option>
                            <?php
                                $estados = Estado::list();
                                foreach($estados as $clave => $estado): ?>
                                    <option value="<?= $clave ?>"><?= $estado ?></div>
                            <?php  endforeach;  ?>
                        </select>
                        <label for="estadoPago">Estado del pedido</label>
                    </div>
                </div>
                <div class="col-12 form-floating mb-3">
                    <select id="servicio" class="form-select" name="servicio">
                        <option value="" selected>Selecciona el servicio</option>
                        <?php
                                $servicios = servicio::list();
                                foreach($servicios as $clave => $servicio): ?>
                                    <option value="<?= $clave ?>"><?= $servicio ?></div>
                            <?php  endforeach;  ?>
                    </select>
                    <label for="servicio">Servicio</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción del pedido">
                    <label for="descripcion">Descripción del pedido:</label>
                </div>
                <p><b>Aquí puedes adjuntar una imagen del instrumento si es necesario:</b></p>
                <div class="col-12 input-group mb-5">
                    <input class="form-control" type="file" id="formFile">
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
                        <label for="ciudadRecogida">Ciudad:</label>
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
                        <label for="ciudadEnvio">Ciudad:</label>
                    </div>
                    <div class="col-2 form-floating mb-3">
                        <input type="text" id="paisEnvio" class="form-control" name="paisEnvio" placeholder="País">
                        <label for="paisEnvio">País:</label>
                    </div>
                </div>
                <hr class="mt-5 mb-5">
                <div class="d-flex flex-row justify-content-between">
                    <div class="col-7 form-floating mb-3">
                        <select id="transportista" class="form-select" name="transportista">
                            <option value="" selected>Selecciona la empresa de transporte</option>
                            <?php
                            $transportistas = ManejadorProveedor::mostrarTransportistas();
                            foreach($transportistas as $transportista): ?>
                                <option value="<?= $transportista->getId() ?>"><?= $transportista->getNombre() ?></div>
                            <?php  endforeach;  ?>
                        </select>
                        <label for="transportista">Transportista:</label>
                    </div>
                    <div class="col-4 form-floating mb-3">
                        <input type="text" id="costeTransporte" class="form-control" name="costeTransporte" placeholder="Coste del transporte">
                        <label for="costeTransporte">Coste del transporte:</label>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center flex-wrap">
                    <button type="submit" id="iniciarSesion" class="btn btn-secondary" name="crearPedido" value="crear pedido">Crear pedido</button>
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
        <script src="assets/js/validacionLogin.js"></script>
    </body>

</html>