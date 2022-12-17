<?php

namespace Proyecto;

require_once 'manejadores/ManejadorUsuario.php';

use Proyecto\Manejadores\ManejadorUsuario;

session_start();
$error = "";/*Esta parte se puede refactorizar, darle una vuelta mas adelante
creo que se puede quitar todos los post menos los de las contraseñas y luego llamar
a los manejadores */
if (isset($_POST["registrarse"])) {
    $correo = strtolower($_POST["correo"]);
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $password2 = $_POST["repitePassword"];
    if ($password == $password2) {
        if (ManejadorUsuario::comprobarDuplicidad($correo) == false) {
            ManejadorUsuario::signin();
        } else {
            $error = "El usuario ya existe";
        }
    } else {
        $error = "Escriba la misma contraseña en ambos campos";
    }
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Registrarse</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Regístrate con tus datos para crear una cuenta.">
    <meta name="title" content="Registrarse">
    <meta name="keywords" content="registro, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <form role="form" method="post" class="col-md-6" name="formulario" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">

            <h1 class="tituloForm">Crear una cuenta</h1>
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
            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating" style="border:2px solid grey; padding:5px; border-radius:15px">
                    <p id="checkMay" class="text-danger" style="font-size: 0.8em;">La contraseña debe tener al menos una letra mayúscula</p>
                    <p id="checkMin" class="text-danger" style="font-size: 0.8em;">La contraseña debe tener al menos una letra minúscula</p>
                    <p id="checkNum" class="text-danger" style="font-size: 0.8em;">La contraseña debe tener al menos un número</p>
                    <p id="checkLong" class="text-danger" style="font-size: 0.8em;">La contraseña debe tener al menos 8 caracteres</p>

                </div>

            </div>

            <div class="col-12 input-group mb-3">
                <div class="col-12 form-floating">
                    <input type="password" id="repitePassword" class="form-control" name="repitePassword" placeholder="Confirma la contraseña">
                    <label for="repiteContrasena">Confirma la contraseña:</label>
                </div>
                <button type="button" id="mostraOcultar2" class="input-group-text" name="mostraOcultar2" value="mostraOcultar2"><i class="bi bi-eye-fill"></i></button>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                <label for="nombre">Nombre:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos">
                <label for="apellidos">Apellidos:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono">
                <label for="telefono">Teléfono:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <a href="formulario_login.php">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
            <div class="col-12 mb-3 d-flex">
                <input type="checkbox" id="condiciones" class="form-check-input me-3" name="condiciones" value="condiciones">
                <label for="condiciones" id="labelCondiciones">
                    He leído y acepto los <a href="#">Términos y condiciones</a>.
                </label>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                <button type="submit" id="registrarse" class="btn btn-warning" name="registrarse" value="registrarse">Registrarme</button>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
        </form>
    </div>

    <!--Llamada al archivo de JS-->
    <script src="assets/js/validaciones/validacionRegistro.js"></script>
    <script src="assets/js/mostrarOcultarContraRegistro.js"></script>
</body>

</html>