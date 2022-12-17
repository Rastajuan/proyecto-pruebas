<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorAdministrador.php';

use Proyecto\Manejadores\ManejadorAdministrador;

session_start();
if (isset($_POST["iniciarSesion"])) {
    $usuario = ManejadorAdministrador::obtenerAdministrador(strtolower($_POST["correo"]));
    $error = "";
    ManejadorAdministrador::hacerLoginAdministrador($usuario, $_POST["password"], $error);
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Iniciar sesión en JUMAC</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión con tu cuenta de administrador y accede al contenido.">
    <meta name="title" content="Iniciar sesión en JUMAC">
    <meta name="keywords" content="iniciar sesión, administrador, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <form role="form" method="post" class="col-md-6" name="formulario">

            <h1 class="tituloForm">Iniciar sesión en JUMAC</h1>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                <label for="correo">Email:</label>
            </div>
            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña">
                    <label for="contrasena">Contraseña:</label>
                </div>
                <button type="button" id="mostraOcultar" class="input-group-text" name="mostraOcultar" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
            </div>
            <div class="col-12 mb-3">
                <a href="formulario_solicitar_correo_jumac.php">¿Has olvidado la contraseña?</a>
            </div>
            <div class="col-12 d-flex justify-content-center flex-wrap">
                <button type="submit" id="iniciarSesion" class="btn btn-secondary" name="iniciarSesion" value="iniciar sesion">Iniciar sesión</button>
            </div>
            <div id="msgError" style=" margin-top: 10px; color:red;font-weight:bold;"></div>
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
    <script src="assets/js/validaciones/validacionLogin.js"></script>
    <script src="assets/js/mostrarOcultarContraLogin.js"></script>
</body>

</html>