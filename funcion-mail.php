<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: contacto.html" );
}

/*
if( ! isset( $_POST['nombre'] ) ){
    header("Location: index.html" );
}
*/


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];
$contacto = $_POST['contacto'];
$contactoe = $_POST['contactoe'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre / $email</p>
    <h2>Mensaje</h2>
    $mensaje
    <p>Contactar a las $fecha/$hora</p>
HTML;

//sintaxis de los emails email@algo.com || 
// nombre <email@algo.com>

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre <$email> <$contacto> \r\n";
$headers.= "To: Sitio web <enzo.aravena.c@gmail.com> \r\n";
// $headers.= "Cc: copia@email.com \r\n";
// $headers.= "Bcc: copia-oculta@email.com \r\n";


//REMITENTE (NOMBRE/APELLIDO - EMAIL)
//ASUNTO 
//CUERPO 
$rta = mail('enzo.aravena.c@gmail.com', "Mensaje web: $nombre", $body, $headers );
//var_dump($rta);

header("Location: contacto.html" );