<?php
//comprobar si una variable esta vacio rrelenarla con texto en minusculas pero mostralo en mayusculas y negrita

$vacio="";
$lleno="lleno";

comprobar($vacio);
echo "<hr>";
comprobar($lleno);

function comprobar ($variable){
if (empty($variable)){
    $vacio="La variable estaba vacia";
    $mayusVacio=strtoupper($vacio);
    echo "<strong>$mayusVacio</strong>";
}
else {
    echo "<strong>$variable</strong>";
}
}
?>