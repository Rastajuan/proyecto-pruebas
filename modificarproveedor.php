<?php 

namespace Proyecto;

require_once "util/BD.php";
require_once "entidades/proveedor.php"; 
require_once "manejadores/ManejadorProveedor.php"; 
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Entidades\Proveedor;
use Proyecto\Manejadores\ManejadorProveedor;
use Proyecto\Util\BD;

session_start(); 
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}
if(!isset($_GET["id"])) {
    header("Location: index_jumac.php"); 
}

if(isset($_POST["modificarProveedor"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    ManejadorProveedor::modificarProveedor($_GET["id"]); 
    header("Location: proveedores.php"); 
}
$error="";
$proveedor = ManejadorProveedor::obtenerProveedor($_GET["id"]); 
?>

<!DOCTYPE html>

<html lang="es">

    <head>
        <title>Editar proveedor</title>       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Edita y cambia la información de tus proveedores.">
        <meta name="title" content="Editar proveedor">
        <meta name="keywords" content="modificar proveedor, editar proveedor, formulario">
        <meta name="robots" content="noindex, nofollow">
        <!--Llamada al archivo de CSS-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!-- Bootstrap Font Icon CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    </head>

    <body>
    <!--TODOS REQUIRED MENOS DESCRIPICION-->
        <div id="formulario" class="row d-flex justify-content-center align-content-center">
                <div class="row">
                    <a href="proveedores.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver al panel de proveedores</a>
                </div>
                <form role="form" method="post" class="col-md-6">
                    <h1 class="tituloForm">Editar proveedor</h1>
                    <div class="col-12 form-floating mb-3">
                        <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $proveedor->getNombre()?>">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col-12 form-floating mb-3">
                        <input type="text" id="correo" class="form-control" name="correo" placeholder="Email" value="<?php echo $proveedor->getMail()?>">
                        <label for="correo">Email:</label>
                    </div>
                    <div class="col-12 form-floating mb-3">
                        <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $proveedor->getTelefono()?>">
                        <label for="telefono">Teléfono:</label>
                    </div>
                    <div class="col-12 form-floating mb-3">
                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" value="<?php echo $proveedor->getDescripcion()?>">
                        <label for="descripcion">Otros datos:</label>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                        <button type="submit" id="modificarProveedor" class="btn btn-secondary" name="modificarProveedor" value="Modificar Proveedor">Modificar Proveedor</button>
                        <a href="proveedores.php" class="btn btn-dark">Cancelar</a>
                    </div>
                    <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
                </form>
            </div>

    </body>

</html>