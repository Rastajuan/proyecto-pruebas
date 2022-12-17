<?php 

namespace Proyecto;

require_once "util/BD.php";
require_once "util/Session.php";
require_once "manejadores/ManejadorAdministrador.php";

use Proyecto\Manejadores\ManejadorAdministrador;
use Proyecto\Util\Session;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

$id = $_SESSION["administrador"]["id"];
$mensaje_ok = "";

if (isset($_POST["modificarCuenta"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    ManejadorAdministrador::modificarCuentaAdministrador($id);
    $mensaje_ok = "Datos actualizados";
}
$administrador = ManejadorAdministrador::obtenerAdministradorPorId($_SESSION["administrador"]["id"]);
 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Perfil y ajustes</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Modifica la información de tu cuenta de administrador. También puedes realizar ajustes y gestiones como cambiar tu contraseña.">
        <meta name="title" content="Perfil y ajustes">
        <meta name="keywords" content="perfil, panel administrador">
        <meta name="robots" content="index, follow">    
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
        <!-- Llamada al achivo que contiene el menú lateral-->
        <?php require 'menu_lateral_jumac.php' ?>

        <div class="panel">
            <!-- Llamada al achivo que contiene el menú lateral-->
            <?php require 'menu_superior_jumac.php' ?>

            <div class="row cabeceraPanel">
                <div class="col-sm-6">
                    <h1 class="tituloPanel">Perfil y ajustes</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 imgPerfil">
                    <img src="assets/images/logo_perfil_garcia_music.png" class="imagenUsuario" alt="logo administrador">
                </div>
                <div class="col-sm-9">
                    <form id="datosAdmin" role="form" method="post" action="">
                        <div class="col-12 form-floating mb-3">
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $administrador["nombre"] ?>">
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div class="col-12 form-floating mb-3">
                            <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $administrador["apellidos"] ?>">
                            <label for="apellidos">Apellidos:</label>
                        </div>
                        <div class="col-12 form-floating mb-3">
                            <input type="text" id="correo" class="form-control" name="correo" placeholder="Email" value="<?php echo $administrador["mail"] ?>">
                            <label for="correo">Email:</label>
                        </div>
                        <?php echo "<p class='error' style='color: green'><b>" . $mensaje_ok . "</b></p>" ?>
                        <div class="col-12">
                            <button type="submit" value="Modificar mis datos" class="btn btn-secondary me-3" name="modificarCuenta">
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
    
            <div class="row" id="ajustesAdmin">
                <h3>Otros ajustes</h3>
                <a href="formulario_cambiar_contrasena_jumac.php">Cambiar contraseña</a>
            </div>

        </div>

        <!-- Llamada al achivo JS con la funcionalidad del menú lateral-->
        <script src="assets/js/menuLateralJumac.js"></script>

    </body>

</html>