<?php
//Hacer un programa que muestre todos los numeros entre dos numeros que lleguen por URL GET
//http://localhost/MasterPHP/10-Ejercicos/ejercicio5.php?numero1=10&numero2=50
$numero1= $_GET['numero1'];
$numero2= $_GET['numero2'];

// if (isset($_GET[]))
for($i=$numero1;$i<=$numero2;$i++){
    echo $i."<br>";
}
?>