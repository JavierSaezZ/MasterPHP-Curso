<?php
if(!is_dir('Mi_carpeta')){
    mkdir('Mi_carpeta', 0777) or die('No se puede crear la carpeta');
}
else{
 echo "Ya existe la carpeta";
}

// rmdir('Mi_carpeta');

if ($gestor =opendir('./Mi_carpeta')){
    while(false !==($archivo = readdir($gestor))){
        if($archivo != '.' && $archivo !='..')
        echo "<br>". $archivo  ;
    }

}
?>