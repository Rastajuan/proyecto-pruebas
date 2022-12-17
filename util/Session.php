<?php

namespace Proyecto\Util;

class Session
{
    public static function sesionIniciada(): bool
    {
        return (
            isset($_SESSION["usuario"]) &&
            isset($_COOKIE['cookie_usuario']) &&
            $_COOKIE['cookie_usuario'] == $_SESSION["usuario"]["id"]
        );
    }

    public static function sesionAdministradorIniciada(): bool
    {
        return (
            isset($_SESSION["administrador"]) &&
            isset($_COOKIE['cookie_administrador']) &&
            $_COOKIE['cookie_administrador'] == $_SESSION["administrador"]["id"]
        );
    }
}