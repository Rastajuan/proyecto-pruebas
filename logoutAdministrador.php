<?php

namespace Proyecto;

session_start();
session_destroy(); 

setcookie('cookie_administrador', null, time() -3600, '/');
unset($_COOKIE['cookie_administrador']);

header("Location: formulario_login_jumac.php");
exit();
