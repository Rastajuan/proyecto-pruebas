<?php

namespace Proyecto\Entidades;

class Estado
{
    const ID_01 = '1';
    const TIPO_ESTADO_SINACEPTAR = "Pendiente de ser aceptado";
    const ID_02 = '2';
    const TIPO_ESTADO_PENDIENTE = "Pendiente de recogida";
    const ID_03 = '3';
    const TIPO_ESTADO_TRANSITO = "En tránsito";
    const ID_04 = '4';
    const TIPO_ESTADO_ESPERA = "En espera";
    const ID_05 = '5';
    const TIPO_ESTADO_PROCESO = "En proceso";
    const ID_06 = '6';
    const TIPO_ESTADO_TERMINADO = "Terminado";
    const ID_07 = '7';
    const TIPO_ESTADO_ENVIADO = "Enviado";
    const ID_08 = '8';
    const TIPO_ESTADO_CANCELADO = "Cancelado";

    public static function list()
    {
        return [self::ID_01 => self::TIPO_ESTADO_SINACEPTAR,
                self::ID_02 => self::TIPO_ESTADO_PENDIENTE,
                self::ID_03 => self::TIPO_ESTADO_TRANSITO,
                self::ID_04 => self::TIPO_ESTADO_ESPERA,
                self::ID_05 => self::TIPO_ESTADO_PROCESO,
                self::ID_06 => self::TIPO_ESTADO_TERMINADO,
                self::ID_07 => self::TIPO_ESTADO_ENVIADO,
                self::ID_08 => self::TIPO_ESTADO_CANCELADO];
    }
}