<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: contacto.html" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
$contacto = $_POST['contacto'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';


$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre / $email / $telefono</p>
    <h2>Mensaje</h2>
    $mensaje
    <p>Contactar a las $fecha/$hora</p>
HTML;

$mailer = new PHPMailer();
$mailer->setFrom( $email, "$nombre" );
$mailer->addAddress('enzo.aravena.c@gmail.com','Sitio web');
$mailer->Subject = "Mensaje web: Contacto desde la WEB";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';



$rta = $mailer->send( );

//var_dump($rta);
?>
<?php
header("Location: index.html");
?>