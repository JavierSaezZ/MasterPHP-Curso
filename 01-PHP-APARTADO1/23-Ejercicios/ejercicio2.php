

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Formulario</h1>
    <form action="" method="POST" enctype="multipart/form-data">
    
    <label for="email">Email:</label>
    <input type="text" name="email">


    <input type="submit" name="enviar">
    
</body>
</html>


<?php

function validaremail($email){
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "No es un email valido";
    }
    else{
        echo"Email correcto: $email";
    }
}

validaremail($_POST['email']);
?>