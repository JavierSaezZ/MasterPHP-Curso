<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();

if (!isset($_GET['contador'])){
    $_SESSION['numero']=0;
}
if (isset($_GET['contador'])&&$_GET['contador']==1){
    $_SESSION['numero']++;
}
if (isset($_GET['contador'])&&$_GET['contador']==0){
    $_SESSION['numero']--;
}
    echo "El numero es". $_SESSION['numero'];
?>

<a href="ejercicio1.php?contador=1">Aumerntar valor</a>
<a href="ejercicio1.php?contador=0">Disminuir valor</a>


</body>
</html>
