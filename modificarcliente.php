<?php

namespace Proyecto;

require_once "util/BD.php";
require_once "entidades/proveedor.php";
require_once "manejadores/ManejadorUsuario.php";
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Entidades\Usuario;
use Proyecto\Manejadores\ManejadorUsuario;
use Proyecto\Util\BD;

session_start();
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}
if (!isset($_GET["id"])) {
    header("Location: index_jumac.php");
}

if (isset($_POST["modificarCliente"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    ManejadorUsuario::modificarCliente($_GET["id"]);
    header("Location: clientes.php");
}
$error = "";
$usuario = ManejadorUsuario::obtenerCliente($_GET["id"]);
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <title>Editar cliente</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edita y cambia la información de tus clientes.">
    <meta name="title" content="Editar cliente">
    <meta name="keywords" content="modificar cliente, editar cliente, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <!--TODOS REQUIRED MENOS DESCRIPCION-->
    <div id="formulario" class="row d-flex justify-content-center align-content-center">
        <div class="row">
            <a href="clientes.php" class="linkVolver mb-5"><i class="bi bi-arrow-left-short"></i> Volver al panel de clientes</a>
        </div>
        <form role="form" method="post" class="col-md-6">
            <h1 class="tituloForm">Editar cliente</h1>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $usuario->getNombre() ?>">
                <label for="nombre">Nombre:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $usuario->getApellidos() ?>">
                <label for="apellidos">Apellidos:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="correo" class="form-control" name="correo" placeholder="Email" value="<?php echo $usuario->getMail() ?>">
                <label for="correo">Email:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $usuario->getTelefono() ?>">
                <label for="telefono">Teléfono:</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" value="<?php echo $usuario->getDescripcion() ?>">
                <label for="descripcion">Otros datos:</label>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <?php echo "<p class='error' style='color: red'><b>" . $error . "</b></p>" ?>
                <button type="submit" id="modificarCliente" class="btn btn-secondary" name="modificarCliente" value="Modificar Cliente">Modificar Cliente</button>
                <a href="clientes.php" class="btn btn-dark">Cancelar</a>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center"></div>
        </form>
    </div>
    <script src="assets/js/validaModificarCliente.js"></script>
</body>

</html>