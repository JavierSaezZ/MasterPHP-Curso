<?php
//Funciones


//Funciones con dos parametros


//Funciones con parametros opcionales
function funcParaOpcional($numero1 =null, $numero2=null){
if($numero1==null|| $numero2==null){
    echo "Uno de los numeros no ha sido enviado";
}
else{
    echo $numero1 . " y " . $numero2;
}
}
funcParaOpcional(1,1);

echo "<hr>";


//Funciones con retorno (Hacer algo y devolver el resultado)
function devolverNombre($nombre){
    return"El nombre es: $nombre"; 
}
echo devolverNombre("Juan Luis");


//Funciones dentro de otra


?>

