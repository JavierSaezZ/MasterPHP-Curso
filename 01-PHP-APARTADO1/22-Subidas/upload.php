<?php
$archivo=$_FILES['archivo'];
$nombre=$archivo['name'];
$tipo =$archivo['type'];
if ($tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/gif'){
if (!is_dir(('imagenes'))){
    mkdir('imagenes',0777);
}
move_uploaded_file($archivo["tmp_name"],'imagenes/'.$nombre);
// header("Refresh:5; URL=subida.php");
echo "Imagen subida correctamente";

}
else{
    // header("Refresh:5; URL=subida.php"); 
    echo "Sube una imagen con un formato compatible";
}
?>