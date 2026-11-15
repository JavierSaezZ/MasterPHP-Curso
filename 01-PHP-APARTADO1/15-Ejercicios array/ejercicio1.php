<?php
//Tener un array con 8 numeros y que haga: recorrer y mostrarlos, ordenarlo y mostrarlo, Mostrar su longitud, buscar un elemnto 

$nuemros= array(3,1,7,4,6,5,2,8);

for ($i=0; $i<sizeof($nuemros);$i++){
echo $nuemros[$i];
}
echo "<hr>";

sort($nuemros);
for ($i=0; $i<sizeof($nuemros);$i++){
    echo $nuemros[$i];
}
echo "<hr>";

echo count($nuemros);
echo "<hr>";

$busqueda=7;
// if( array_search($busqueda,$nuemros)){
// echo "El numero existe";
// }
// else{
//     echo "El numero no existe";
// }
$buscar=array_search($busqueda,$nuemros);
if( !empty($buscar)){
    echo "El numero existe";
    }
    else{
        echo "El numero no existe";
    
    }
?>