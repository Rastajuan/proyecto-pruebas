<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorProveedor.php';
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorProveedor;

session_start(); 
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

if(isset($_GET["id"])) {
    ManejadorProveedor::eliminarProveedor($_GET["id"]); 
}

header("Location: proveedores.php"); 
exit();