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

$error="";

ManejadorAdministrador::comprobarLoginAdministrador(); 
ManejadorProveedor::comprobarTransportista();
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Añadir transportista</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registra una nueva empresa de transportes para recoger y entregar los pedidos de tus clientes.">
        <meta name="title" content="Añadir transportista">
        <meta name="keywords" content="insertar transportista, inserta empresa de transporte, formulario">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>

        <div id="formulario" class="row d-flex justify-content-center align-content-center">
            <div class="row">
                <a href="proveedores.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver al panel de proveedores</a>
            </div>
            <form role="form" method="post" class="col-md-6" name="formulario" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h1 class="tituloForm">Nuevo transportista</h1>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" >
                    <label for="nombre">Nombre de la empresa de transporte:</label>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                    <button type="submit" id="nuevoTransportista" class="btn btn-secondary" name="nuevoTransportista" value="Nuevo Transportista">Añadir transportista</button>
                </div>
                <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
            </form>
        </div>
    <script src="assets/js/validaInserTransportista.js"></script>
    </body>

</html>