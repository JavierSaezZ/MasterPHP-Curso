<?php
//Variables locales: Se declaran dentro de la funcion y estan disponibles solo dentro de esa funcion
//Variables globales: Se declaran fuera y estan disponibles en todo el documento

$frase="Frase de prueba";

echo $frase;
echo "<hr>";
/*Da error por que no esta puesta que sea global
function funcionFrase(){
echo "Dentro: " . $frase;
}
*/
function funcionFrase(){
    global $frase;
    // $frase = "Prueba de frase";
    echo "Dentro: " . $frase;
    }
    funcionFrase();


//Funciones variables

function funcion1(){
return"</br>Numero 1";
}
function funcion2(){
return"</br>Numero 2";
}
function funcion3(){
return"</br>Numero 3";
}
for ($i=1;$i<=3;$i++){
    $llamarFuncion="funcion".$i;
    echo $llamarFuncion();
}

?>

