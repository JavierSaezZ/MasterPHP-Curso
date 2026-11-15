<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar formulario</title>
</head>

<body>
    <h1>Validacion de formulario</h1>
<?php
if (isset($_GET['error'])){
$error=$_GET['error'];
if($error=='error'){
    echo "Faltan datos";
}};
?>
    <form method="POST" action="procesar_formulario.php">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" name="nombre">
        <br>

        <label for="apellido">Apellido:</label>
        <br>
        <input type="text" name="apellido">
        <br>


        <label for="email">Email:</label>
        <br>
        <input type="email" name="email">
        <br>

        <label for="pass">Password:</label>
        <br>
        <input type="password" name="pass">
        <br>

        <input type="submit" value="Enviar">

    </form>
</body>

</html>