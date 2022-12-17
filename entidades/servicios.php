<?php

namespace Proyecto\Entidades;

class Servicio
{
    const ID_01 = '1';
    const TIPO_PEDIDO_MANTENIMIENTO = "Mantenimiento";
    const ID_02 = '2';
    const TIPO_PEDIDO_LIMPIEZA = "Limpieza";
    const ID_03 = '3';
    const TIPO_PEDIDO_ENZAPATILLADO = "Enzapatillado";
    const ID_04 = '4';
    const TIPO_PEDIDO_AJUSTE = "Ajuste";
    const ID_05 = '5';
    const TIPO_PEDIDO_MANTENIMIENTO_AV = "Mantenimiento Avanzado";
    const ID_06 = '6';
    const TIPO_PEDIDO_FABRICACION = "Fabricación";
    const ID_07 = '7';
    const TIPO_PEDIDO_REPARACION= "Reparación";

    public static function list()
    {
        return [self::ID_01 => self::TIPO_PEDIDO_MANTENIMIENTO,
                self::ID_02 => self::TIPO_PEDIDO_LIMPIEZA,
                self::ID_03 => self::TIPO_PEDIDO_ENZAPATILLADO,
                self::ID_04 => self::TIPO_PEDIDO_AJUSTE,
                self::ID_05 => self::TIPO_PEDIDO_MANTENIMIENTO_AV,
                self::ID_06 => self::TIPO_PEDIDO_FABRICACION,
                self::ID_07 => self::TIPO_PEDIDO_REPARACION];
    }
}