<?php

namespace Proyecto;

require_once "util/BD.php";
require_once "util/Session.php";
require_once "manejadores/ManejadorUsuario.php";

use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionIniciada()) {
    header("Location: formulario_login.php");
}

$id = $_SESSION["usuario"]["id"];
$mensaje_ok = "";

if (isset($_POST["modificarCuenta"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    ManejadorUsuario::modificarCuenta($id);
    $mensaje_ok = "Datos actualizados";
}
$usuario = ManejadorUsuario::obtenerCliente($_SESSION["usuario"]["id"]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mi cuenta | García Music Luthier</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modifica tus datos e información personales.">
    <meta name="title" content="Mi cuenta | García Music Luthier">
    <meta name="keywords" content="García Music, Luthier, reparar instrumentos, cuenta">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <!-- Llamada al archivo externo que contiene la cabecera -->
    <?php include "menu_area_clientes.php"; ?>

    <div class="row submenuAC">
        <div class="row">
            <a href="index_area_clientes.php" class="volverInicioAC">
                <i class="bi bi-arrow-left-short"></i>Volver
            </a>
        </div>
        <div class="row d-flex justify-content-between align-items-center mt-5">
            <div class="col-sm-4 bienvenida">
                <h1>Mi cuenta</h1>
            </div>
            <form class="col-3 d-flex me-5" role="search">
                <input class="form-control me-2 buscadorAC" type="search" placeholder="Buscar" aria-label="Search">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
<!--TODOS LOS CAMPOS SON REQUIRED-->
    <div class="row">
        <div class="col-sm-9">
            <form id="datosUsuario" role="form" method="post" action="">
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $usuario->getNombre() ?>" >
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $usuario->getApellidos() ?>" >
                    <label for="apellidos">Apellidos:</label>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col-7 form-floating mb-3">
                        <input type="text" id="correo" class="form-control" name="correo" placeholder="Email" value="<?php echo $usuario->getMail() ?>" >
                        <label for="correo">Email:</label>
                    </div>
                    <div class="col-4 form-floating mb-3">
                        <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $usuario->getTelefono() ?>">
                        <label for="telefono">Teléfono:</label>
                    </div>
                </div>
                <?php echo "<p class='error' style='color: green'><b>" . $mensaje_ok . "</b></p>" ?>
                <div class="col-12">
                    <button type="submit" value="Modificar mis datos" class="btn btn-warning me-3" name="modificarCuenta">
                        <span>Modificar mis datos</span>
                    </button>
                    <button type="reset" value="Limpiar campos" class="btn btn-light" name="limpiarCampos">
                        <span>Limpiar campos</span>
                    </button>
                </div>
                <div id="msgError" style=" margin-top: 10px; color:red;font-weight:bold;"></div>
            </form>
        </div>
    </div>

    <div class="row" id="ajustesUsuario">
        <h3>Otros ajustes</h3>
        <a href="formulario_cambiar_contrasena.php">Cambiar contraseña</a>
    </div>

    <!-- Llamada al archivo externo que contiene el footer -->
    <?php include "footer_web_cliente.php"; ?>

    <!--Llamada al archivo de JS-->
    <script src="assets/js/validacionClientes.js"></script>
</body>

</html>