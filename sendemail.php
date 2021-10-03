<?php

$error = '';

//VALIDANDO NOMBRE
if(empty($_POST["name"])){
    $error = 'Déjame saber tu nombre </br>';
}else{
    $nombre = $_POST["name"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre==''){
        $error .= 'Aún no escribes tu nombre</br>';
    }
}

//VALIDANDO E-MAIL
if(empty($_POST["email"])){
    $error .= '¿Que pasó? Ese no es un email!</br>';
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= '¿Que pasó? Ese no es un email verdadero!</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}

//VALIDANDO ASUNTO
if(empty($_POST["subject"])){
    $error .= '¿Cual es tu asunto de consulta? </br>';
}else{
    $asunto = $_POST["subject"];
    $asunto = filter_var($asunto, FILTER_SANITIZE_STRING);
    $asunto = trim($asunto);
    if($asunto==''){
        $error .= 'Tu campo "Asunto" está vacio</br>';
    }
}

//VALIDANDO MENSAJE
if(empty($_POST["message"])){
    $error .= 'Vamos! Tu mensaje esta vacio. Escribe un poco! </br>';
}else{
    $mensaje = $_POST["message"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje==''){
        $error .= 'Tu mensaje está vacio!</br>';
    }
}

//CUERPO DEL MENSAJE
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "\n";
 
$cuerpo .= "Email: ";
$cuerpo .= $email;
$cuerpo .= "\n";

$cuerpo .= "Asunto: ";
$cuerpo .= $asunto;
$cuerpo .= "\n";
 
$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;
$cuerpo .= "\n";

//DIRECCIÓN
$enviarA = 'hola@diegosh.com'; 
$asunto = 'NUEVO MENSAJE A DIEGOSH.COM';

//ENVIAR CORREO
if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}

?>
