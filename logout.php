<?php

namespace Proyecto;

session_start();
session_destroy(); 

setcookie('cookie_usuario', null, time() -3600, '/');
unset($_COOKIE['cookie_usuario']);

header("Location: formulario_login.php");
exit();
