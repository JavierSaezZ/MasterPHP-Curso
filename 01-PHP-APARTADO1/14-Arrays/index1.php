<?php

$peliculas = array('Juan','Pepe');
echo "Primer indice: " . $peliculas[0];
var_dump( $peliculas);

$cantantes= ['Selena Gomez', 'Kiko Rivera', 'Juan Magan'];
var_dump($cantantes);
echo "Segundo indice: " . $peliculas[1];
for($i=0;$i<count($cantantes);$i++){
    echo "<br> Numero " .  $i . " es: " .  $cantantes[$i];
}

//Array Asociativo
$nombre =array(
'Nombre' => 'Juan',
'Apellido' => 'Gomez',
'Edad' => 40
);
var_dump($nombre['Nombre']);

//Array multidimensionales
$contactos= array(
    array(
        'Nombre' => 'Juan',
        'Apellido' => 'Gomez',
        'Edad' => 40
    ),
    array(
        'Nombre' => 'Pepe',
        'Apellido' => 'Matinez',
        'Edad' => 20
    ),
    array(
        'Nombre' => 'Andres',
        'Apellido' => 'Burgoa',
        'Edad' => 13
    ),
);

var_dump($contactos);
// var_dump( $contactos[0]['Nombre']);
foreach ($contactos as $key => $value){
    echo ($value['Nombre']);
    echo ($value['Edad']);
}
// echo $contactos[0]['Nombre']

?>