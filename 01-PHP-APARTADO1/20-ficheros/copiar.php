<?php

//Copiar
// copy('fichero.txt','ficheros.txt') or die("erroral copiar el fichero")

//Renombrar 
// rename('ficheros.txt','archivo2.txt');

//Eliminar 
// unlink('archivo2.txt') or die("erroral eliminar")

//Comprobar archivo 

if (file_exists("ficherofd.txt")){
    echo "Existe";
}
else{
    echo "No existe";
}

?>