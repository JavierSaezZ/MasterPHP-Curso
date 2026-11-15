<?php
//añadir valores a un array mientras su longitud sea menor que 120 y despues mostrarlo

$numeros=array();
for($i=0;$i<=120;$i++) {
    array_push($numeros,"Elemento: ".$i);
}
echo $numeros[55];
var_dump($numeros);

?>