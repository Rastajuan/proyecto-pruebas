<?php

namespace Proyecto\Util;

require_once "vendor/PHPMailer/src/PHPMailer.php";
require_once "vendor/PHPMailer/src/SMTP.php";
require_once "vendor/PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public const EMAIL = "ifpdawgrupo4@gmail.com";
    public const PASSWORD = "gxlvisxhyflwlkta";
    public const HOST = "smtp.gmail.com";
    public const PORT = 465;

    /** @var PHPMailer $mail */
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = self::HOST;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = self::EMAIL;                     //SMTP username
        $this->mail->Password   = self::PASSWORD;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = self::PORT;
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;
        $this->mail->setFrom(self::EMAIL, 'Formulario de contacto');
        $this->mail->isHTML(true);
    }

    public function addDestinatario($email, $nombre = "")
    {
        $this->mail->addAddress($email, $nombre);
    }

    public function enviar()
    {
        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "El mensaje no se ha podido enviar.";
        }
    }

    public function mensaje($asunto, $mensaje, $cabecera = "")
    {
        $this->mail->Subject = $asunto;
        $this->mail->Body = $cabecera . "<p>$mensaje</p>";
    }

    public function cabeceraContacto($nombre, $email, $telefono = ""): string
    {
        $cabecera = "<p>Tienes un nuevo mensaje desde la web:
            <ul>
                <li><b>Nombre</b>: $nombre</li>
                <li><b>Email</b>: $email</li>" .
                (!empty($telefono) ? "<li><b>Teléfono</b>: $telefono</li>" : "") .
            "</ul></p>";
        return $cabecera;
    }

    public function recordarContrasena($email, $token)
    {
        $this->addDestinatario($email);

        $mensaje = "<p>A través del siguiente enlace podrás recuperar tu contraseña</p>" .
                "<p><a href=\"http://" . $_SERVER['HTTP_HOST'] . "/proyecto/formulario_recuperar_contrasena.php?token=$token\">Recupera tu contraseña</a></p>";
        $this->mensaje("Recuperar contraseña García Music", $mensaje);

        $this->enviar();
    }

    public function recordarContrasenaAdmin($email, $token)
    {
        $this->addDestinatario($email);

        $mensaje = "<p>A través del siguiente enlace podrás recuperar tu contraseña</p>" .
                "<p><a href=\"http://" . $_SERVER['HTTP_HOST'] . "/proyecto/formulario_recuperar_contrasena_jumac.php?token=$token\">Recupera tu contraseña</a></p>";
        $this->mensaje("Recuperar contraseña García Music", $mensaje);

        $this->enviar();
    }
}
