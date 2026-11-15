<?php
//Hacer un script en php que muestre todos los numeros pared del 1 al 100
$nuemero=0;

for($i=0;$i<100;$i++){
if ($i%2==0){
    echo $i%2 ." - ". $i."<br/>";
}
}
?>