<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorUsuario.php';
require_once 'Manejadores/ManejadorAdministrador.php';
require_once "util/Session.php";

use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Manejadores\ManejadorAdministrador;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

ManejadorAdministrador::comprobarLoginAdministrador();

$error = "";
if (isset($_POST["crearCliente"])) {
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    if (ManejadorUsuario::comprobarDuplicidad($correo) == false) {
        ManejadorUsuario::comprobarCliente();
    } else {
        $error = "El usuario ya existe";
    }
}
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Añadir cliente</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registra nuevos clientes de forma manual en el sistema.">
        <meta name="title" content="Añadir cliente">
        <meta name="keywords" content="insertar cliente, formulario">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>

        <div id="formulario" class="row d-flex justify-content-center align-content-center">
            <div class="row">
                <a href="clientes.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver al panel de clientes</a>
            </div> 
            <form role="form" method="post" class="col-md-6" name="formulario" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h1 class="tituloForm">Añadir cliente</h1>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos">
                    <label for="apellidos">Apellidos:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                    <label for="correo">Email:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono">
                    <label for="telefono">Teléfono:</label>
                </div>
                <div class="col-12 input-group mb-3">
                    <div class="col-12 form-floating">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña">
                        <label for="contrasena">Contraseña:</label>
                    </div>
                    <button type="button" id="mostraOcultar" class="input-group-text" name="mostraOcultar" value="mostraOcultar"><i class="bi bi-eye-fill"></i></button>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción">
                    <label for="descripcion">Otros datos:</label>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                    <button type="submit" id="crearCliente" class="btn btn-secondary" name="crearCliente" value="Crear Cliente">Crear Cliente</button>
                </div>
                <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
            </form>
        </div>

        <!-- Archivos de JavaScript -->
        <script src="assets/js/validaciones/validacionClientes.js"></script>
        <script src="assets/js/mostrarOcultarContraClientes.js"></script>
    </body>

</html>