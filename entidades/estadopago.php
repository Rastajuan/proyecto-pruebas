<?php

namespace Proyecto\Entidades;

class Pago
{
    const ID_01 = '1';
    const PAGO_PENDIENTE_PRESUPUESTO = "Pendiente de presupuesto";
    const ID_02 = '2';
    const PENDIENTE_PAGO = "Pendiente de pago";
    const ID_03 = '3';
    const PAGO_PAGADO = "Pagado";
    const ID_04 = '4';
    const PAGO_REEMBOLSADO = "Reembolsado";

    public static function list()
    {
        return [self::ID_01 => self::PAGO_PENDIENTE_PRESUPUESTO,
                self::ID_02 => self::PENDIENTE_PAGO,
                self::ID_03 => self::PAGO_PAGADO,
                self::ID_04 => self::PAGO_REEMBOLSADO];
    }
}