<?php
//Para mostrar el valor de lacookies tengo que usar $_COOKIE, una variable superglobal, es un array asociativo


if (isset($_COOKIE["micookie"])){
    echo "<h1>".$_COOKIE['micookie']."</h1>";
}
else{
    echo "No existe la galleta, ya no puede comertela.";
}
?>
