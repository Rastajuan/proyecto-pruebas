<?php

namespace Proyecto\Entidades;

class Rol
{
    const ID_01 = '1';
    const TIPO_USUARIO_ADMIN = "Administrador";
    const ID_02 = '2';
    const TIPO_USUARIO_CLIENTE = "Cliente";

    public function list()
    {
        return [self::ID_01 => self::TIPO_USUARIO_ADMIN,
                self::ID_02 => self::TIPO_USUARIO_CLIENTE]; 
    }
}