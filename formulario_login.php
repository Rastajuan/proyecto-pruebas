<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorUsuario.php';

use Proyecto\Manejadores\ManejadorUsuario;



session_start();
if (isset($_POST["iniciarSesion"])) {
    $usuario = ManejadorUsuario::obtenerUsuario(strtolower($_POST["correo"]));
    $error = "";
    ManejadorUsuario::hacerLogin($usuario, $_POST["password"], $error);
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión con tus datos y accede al contenido.">
    <meta name="title" content="Iniciar sesión">
    <meta name="keywords" content="iniciar sesión, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <form role="form" method="post" class="col-md-6" name="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <h1 class="tituloForm">Iniciar sesión</h1>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                <label for="usuario">Email:</label>
            </div>
            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña">
                    <label for="contrasena">Contraseña:</label>
                </div>
                <button type="button" id="mostraOcultar" class="input-group-text" name="mostraOcultar" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
            </div>

            <div class="col-12 mb-3">
                <a href="formulario_solicitar_correo_clientes.php">¿Has olvidado la contraseña?</a>
            </div>
            <div class="col-12 d-flex justify-content-center flex-wrap">
                <a id="registrarse" class="btn btn-light me-3" href="formulario_registro.php">Registrarse</a>
                <button type="submit" id="iniciarSesion" class="btn btn-warning" name="iniciarSesion" value="iniciar sesion">Iniciar sesión</button>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;"></div>
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