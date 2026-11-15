<?php
$conexion = mysqli_connect("localhost", "root","", "phpmysql");

if(mysqli_connect_errno()){
    echo "La conexion de la base de datos a fallado" .mysqli_connect_error();
}else{
    echo "La conexion es correcta";    
}


echo "<br>";
mysqli_query($conexion, "set names 'uft8'");

$select=mysqli_query($conexion, "select * from notas");
// var_dump( $select);

// while ($nota=mysqli_fetch_array($select)){
//     var_dump($nota);
// }
while ($notas=mysqli_fetch_assoc($select)){
    // var_dump($notas);
    echo $notas["descripcion"];
}
$sql="insert into notas values(null, 'Nota desde PHP', 'Esto es una nota de php','green')";
$insert=mysqli_query($conexion, $sql);
echo "<br>";
if ($insert){
    echo "Datos insertados correctamente";
}else{
    echo "Error al insertar los datos". mysqli_error($conexion);
}

?>