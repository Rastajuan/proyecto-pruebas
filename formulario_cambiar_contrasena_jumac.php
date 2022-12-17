<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorAdministrador.php';
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorAdministrador;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

$error = "";
$confirmacion = "";
if (isset($_POST["cambiarContrasena"])) {
    $mail = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nueva_contrasena = $_POST['nuevaContrasena'];
    $nueva_contrasena_2 = $_POST['repiteContrasena'];
    if ($nueva_contrasena == $nueva_contrasena_2) {
        $administrador = ManejadorAdministrador::obtenerAdministrador($mail, $contrasena);
        if ($administrador && ManejadorAdministrador::cambiarContrasenaAdministrador($administrador, $contrasena, $nueva_contrasena)) {
            header("location: confirmacion_cambio_contrasena_jumac.php");
        } else {
            $error = "El correo o la contraseña son erróneos.";
        }
    } else {
        $error = "Escriba bien la nueva contraseña en ambas secciones";
    }
}
?>
<!DOCTYPE html>

<html lang="es">

<head>
    <title>Cambiar contraseña</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cambia la contraseña de tu cuenta.">
    <meta name="title" content="Cambiar contraseña">
    <meta name="keywords" content="cambio contraseña, contraseña cuenta, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <div id="formulario">
        <div class="row">
            <a href="index_jumac.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver a la página principal</a>
        </div>
        <div class="row d-flex justify-content-center align-content-center">
            <form role="form" method="post" class="col-md-6" name="formulario">

                <h1 class="tituloForm">Cambiar mi contraseña</h1>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Email">
                    <label for="usuario">Email:</label>
                </div>
                <div class="col-12 input-group mb-3">
                    <div class="col-12 form-floating">
                        <input type="password" id="contrasena" class="form-control" name="contrasena" placeholder="Contraseña actual">
                        <label for="contrasena">Contraseña actual:</label>
                    </div>
                    <button type="button" id="mostraOcultar" class="input-group-text" name="mostraOcultar" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
                </div>
                <div class="col-12 input-group mb-3">
                    <div class="col-12 form-floating">
                        <input type="password" id="nuevaContrasena" class="form-control" name="nuevaContrasena" placeholder="Nueva contraseña">
                        <label for="nuevaContrasena">Nueva contraseña:</label>
                    </div>
                    <button type="button" id="mostraOcultar2" class="input-group-text" name="mostraOcultar2" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
                </div>
                <div class="col-12 input-group mb-3">
                    <div class="col-12 form-floating">
                        <input type="password" id="repiteContrasena" class="form-control" name="repiteContrasena" placeholder="Confirma la nueva contraseña">
                        <label for="repiteContrasena">Confirma la nueva contraseña:</label>
                    </div>
                    <button type="button" id="mostraOcultar3" class="input-group-text" name="mostraOcultar3" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
                </div>
                <div class="col-12 form-floating mb-3">
                    <a href="#">¿Has olvidado la contraseña?</a>
                    <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                    <?php echo "<p class='error' style='color: green'><b>" . $confirmacion . "</b></p>" ?>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" id="cambiarContrasena" class="btn btn-secondary" name="cambiarContrasena" value="cambiar contrasena">Cambiar contraseña</button>
                </div>
                <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
            </form>
        </div>
    </div>
    <!--Llamada al archivo de JS-->
    <script src="assets/js/validaciones/validacionCambCont.js"></script>
    <script src="assets/js/mostrarOcultarCambioJumac.js"></script>
</body>

</html>