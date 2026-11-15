<?php
//Abrir archivo
$archivo = fopen('fichero.txt', "a+",);

//Leer contenido
while(!feof($archivo)){
$contenido = fgets($archivo);
echo $contenido . "<br>";
}

//Escribir archivo
// fwrite($archivo, "El texto esta metido mediante php");


//Cerrar el archivo
fclose($archivo)
?>