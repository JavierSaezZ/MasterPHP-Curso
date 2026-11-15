<?php

//Comrobar si las 4 variables array, string, int, y booleanay que imprima un mensaje segun su tipo

$matriz= array(1,2,"Hola");
$cadena="Cadena dde texto";
$numero=545;
$verdadero=true;

comprobarTipo($cadena);
comprobarTipo($matriz);
comprobarTipo($numero);
comprobarTipo($verdadero);
function comprobarTipo($variable){
    if (is_string($variable)){
        echo "La variable ".$variable." es una cadena <br>";
    }
    else if (is_array($variable)){
        echo "La variable ".$variable[1]." es una matriz<br>";
        // var_dump($variable);
    }
    else if (is_bool($variable)){
        echo "La variable ".$variable." es un booleano<br>";
    }
    else if (is_integer($variable)){
        echo "La variable ".$variable." es un numero<br>";
    }
}
?>