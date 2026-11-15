<?php

$error= 'error';

if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["pass"])){
$error="ok";

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$password=$_POST["pass"];
echo $nombre . "<br>" . $apellido . "<br>" . $email . "<br>" . $password;
}
else{
    $error="error";
    header("Location:validacion.php?error=$error");
}