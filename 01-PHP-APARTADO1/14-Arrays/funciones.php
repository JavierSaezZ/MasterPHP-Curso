<?php
$cantantes= ['Selena Gomez', 'Kiko Rivera', 'Juan Magan'];

//Ordenar alfabeticamente
asort($cantantes);

//Ordenar alfabeticamente al reves
arsort($cantantes);

//Ordenar numericamente
sort($cantantes);
var_dump($cantantes);

//Eliminar elementos array
array_pop($cantantes);

//Añadir elementos array
$cantantes[]="Despistados";
array_push($cantantes,"El canto del loco");

unset($cantantes[0]);
var_dump($cantantes);

//Numero aleatoirio del array
$indice= array_rand($cantantes);
echo $cantantes[$indice];

//Dar la vuelta al array
array_reverse($cantantes);
var_dump($cantantes);


//Buscar dentro de un array 
$buscar=array_search('Kiko Rivera', $cantantes);
var_dump($buscar);
echo count($cantantes) //sizeof

//Contar numero de elementos
?>