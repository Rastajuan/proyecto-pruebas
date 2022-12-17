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
/*Este codigo tambien puedo dejarlo mas limpio (juanra) */
if(isset($_POST["crearProveedor"])){
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$descripcion = $_POST["descripcion"];

    if(ManejadorProveedor::comprobarProveedorCreado($correo)==false){
        ManejadorProveedor::registrarProveedor($nombre, $correo, $telefono, $descripcion);
    }else{
        $error = "El proveedor ya existe";
        }
header("Location: proveedores.php");
}

ManejadorAdministrador::comprobarLoginAdministrador(); 
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Añadir proveedor</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registra nuevos proveedores de forma manual en el sistema.">
        <meta name="title" content="Añadir proveedor">
        <meta name="keywords" content="insertar proveedor, formulario">
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
                <h1 class="tituloForm">Añadir proveedor</h1>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                    <label for="correo">Email:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono">
                    <label for="telefono">Teléfono:</label>
                </div>
                <div class="col-12 form-floating mb-3">
                    <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción">
                    <label for="descripcion">Otros datos:</label>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                    <button type="submit" id="crearProveedor" class="btn btn-secondary" name="crearProveedor" value="Crear Proveedor">Crear Proveedor</button>
                </div>
                <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
            </form>
        </div>

    </body>

</html>