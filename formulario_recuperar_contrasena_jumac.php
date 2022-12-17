<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorAdministrador.php';
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorAdministrador;

$error = "";
$confirmacion = "";

$administrador = null;
if(isset($_GET["token"])) {
    $administrador = ManejadorAdministrador::obtenerAdministradorToken($_GET["token"]);
}

if (is_null($administrador) || !isset($_GET["token"])) {
    header("Location: index_web_cliente.php");
}

if (isset($_POST["recuperarContrasena"])) {
    $nueva_contrasena = $_POST['nuevaContrasena'];
    $nueva_contrasena_2 = $_POST['repiteContrasena'];
    if ($nueva_contrasena == $nueva_contrasena_2) {
        if (ManejadorAdministrador::recuperarContrasena($administrador["id"], $nueva_contrasena)) {
            $confirmacion = "Contraseña modificada con éxito";
        } else {
            $error = "El correo o la contraseña son erróneo.";
        }
    } else {
        $error = "Las contraseñas deben ser iguales";
    }
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Recuperar contraseña</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Recupera la contraseña de tu cuenta.">
    <meta name="title" content="Recuperar contraseña">
    <meta name="keywords" content="recuperar contraseña, contraseña cuenta, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <div class="row">
            <a href="formulario_login_jumac.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Iniciar sesión</a>
        </div>
        <form role="form" method="post" class="col-md-6" name="formulario">

            <h1 class="tituloForm">Recuperar mi contraseña</h1>
            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating">
                    <input type="password" id="nuevaContrasena" class="form-control" name="nuevaContrasena" placeholder="Nueva contraseña">
                    <label for="nuevaContrasena">Nueva contraseña:</label>
                </div>
                <button type="button" id="mostraOcultar" class="input-group-text" name="mostraOcultar" value="mostraOcultar"><i class=" bi bi-eye-fill"></i></button>
            </div>

            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating">
                    <input type="password" id="repiteContrasena" class="form-control" name="repiteContrasena" placeholder="Confirma la nueva contraseña">
                    <label for="repiteContrasena">Confirma la nueva contraseña:</label>
                </div>
                <button type="button" id="mostraOcultar2" class="input-group-text" name="mostraOcultar2" value="mostraOcultar2"><i class=" bi bi-eye-fill"></i></button>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <button type="submit" id="recuperarContrasena" class="btn btn-secondary" name="recuperarContrasena" value="recuperar contrasena">Recuperar contraseña</button>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;text-align:center"><?= $error ?> </div>
            <div style="margin-top: 10px; color:green;font-weight:bold;text-align:center"><?= $confirmacion ?> </div>
        </form>

    </div>

    <!--Llamada al archivo de JavaScript-->
    <script src="assets/js/validaciones/validacionRecCont.js"></script>
    <script src="assets/js/mostrarOcultarContra.js"></script>

</body>

</html>