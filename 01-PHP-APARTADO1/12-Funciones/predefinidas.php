<?php


//Debuggear
$nombre="Javi";
var_dump($nombre);

//Fechas
echo date('d-m-y');
echo "<br>";
echo time();

//Matematicas
echo "<br>";
echo "La raiz cuadrada de 10: " . sqrt(10);

echo "<br>";
echo "Numero aleatorio entre 10 y 40: ". rand(10,40);

echo "<br>";
echo "Numero pi " . pi();

echo "<br>";
echo "Redondear" . round(4.949999 , 1);


echo "<br>";
echo gettype($nombre);

/* Pruebas
echo "<br>";
$texto="<div class='pruebas'>Javi</div>";
echo DOMText($texto);
*/


//Dtectar tipado
echo "<br>";
if (is_string($nombre))
{
    echo "La variable es un string";
}


//Si existe o esta vaciauna variable
echo "<br>";
if (isset($numero))
{
    echo "La variable existe";
}
else{
    echo "La variable No existe";
}


 //Limpiar espacios
echo "<br>";
$frase= "      Mi contenido        ";
var_dump($frase);
var_dump(trim($frase));


//Eliminar variables o indices de arrays
$year=2020;
unset($year);
// var_dump($year);


//Comprobar variable vacia
echo "<br>";
$vacia="";
if (empty($vacia)){
 echo 'la variable ($vacia) esta vacia';
}
else{
    echo 'la variable ($vacia) no esta vacia y tiene contenido';
}


//Contar caracteres de un string
echo "<br>";
$cadena ="1234567890";
echo strlen($cadena);


//Encontrar en un string la posicion de un caracter determinado
echo "<br>";
$encontrar= "La vida es bella";
echo strpos($encontrar, "es");


//Remplazar palabras de un string
echo "<br>";
$encontrar = str_replace("vida" ,"moto",$encontrar);
echo $encontrar;


//Mayusculas y miniscilas
echo "<br>";
echo strtolower($encontrar);
echo "<br>";
echo strtoupper($encontrar);

?>