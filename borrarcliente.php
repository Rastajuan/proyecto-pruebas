<?php

namespace Proyecto;

require_once 'Manejadores/ManejadorUsuario.php';
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Manejadores\ManejadorUsuario;

session_start(); 
if (!Session::sesionAdministradorIniciada()) {
    header("Location: formulario_login_jumac.php");
}

if(isset($_GET["id"])) {
    ManejadorUsuario::eliminarCliente($_GET["id"]); 
}

header("Location: clientes.php"); 
exit();