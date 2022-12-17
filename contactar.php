<?php 

namespace Proyecto;

require_once "util/Mail.php";
require_once "util/Session.php";

use Proyecto\Util\Session;
use Proyecto\Util\Mail;

session_start(); 

if(isset($_POST["contactar"]) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    $mail = new Mail();
    $mail->addDestinatario(Mail::EMAIL);
    $cabecera = $mail->cabeceraContacto($_POST["nombre"], $_POST["correo"], $_POST["telefono"]);
    $asunto = "Contacto web";
    $mail->mensaje($asunto, $_POST["mensaje"], $cabecera);
    $mail->enviar();
}
header("Location: index_web_cliente.php");