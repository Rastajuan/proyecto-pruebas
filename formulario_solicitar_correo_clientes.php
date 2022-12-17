<?php

namespace Proyecto;

require_once "manejadores/ManejadorUsuario.php";
require_once "util/mail.php";

use Proyecto\Util\Mail;
use Proyecto\Manejadores\ManejadorUsuario;

$correcto = "";
$error = "";

if (isset($_POST["correoContrasena"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    $usuario = ManejadorUsuario::obtenerUsuario($_POST["correo"]);
    if (!empty($usuario)) {
        //genera un token encriptado seguro de 32 caracteres
        $token = bin2hex(random_bytes(16));
        //Actualiza el usuario añadiendo el token creado a la columna token
        ManejadorUsuario::modificarTokenContrasena($usuario["id"], $token);
        $mail = new Mail();
        $mail->recordarContrasena($usuario["mail"], $token);
        $correcto = "Se ha enviado un correo a la dirección de correo que has introducido.";
    } else {
        $error = "El correo que ha introducido no pertenece a ningún usuario";
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
            <a href="formulario_login.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver atrás</a>
        </div>
        <form role="form" method="post" class="col-md-6" name="formulario">

            <h1 class="tituloForm">Introduce tu correo</h1>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                <label for="usuario">Email:</label>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <button type="submit" id="correoContrasena" class="btn btn-secondary" name="correoContrasena" value="recuperar contrasena">Recuperar contraseña</button>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;text-align:center"></div>
            <div style="margin-top: 10px; color:green;font-weight:bold;text-align:center"> <?= $correcto ?> </div>
            <div style="margin-top: 10px; color:red;font-weight:bold;text-align:center"> <?= $error ?> </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;"></div>
        </form>

    </div>
    <script src="assets/js/validaciones/validacionSolicitarCorreo.js"></script>
</body>

</html>