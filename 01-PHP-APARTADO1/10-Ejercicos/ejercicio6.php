<?php
echo "<table border='1'><tr><td>Numero 2</td><td>Numero 1</td><td>Numero 1</td><td>Numero 1</td> </tr><tr><td>Numero 1</td><td>Numero 1</td><td>Numero 1</td><td>Numero 1</td> </tr></table>";

//Crear las tabals de multiplicar del 1 al 10

echo"<table border='1'>";
echo "<tr>";
for($titulo=1;$titulo<=10;$titulo++){
    echo"<td>Tabla del ".$titulo."</td>";
}
echo"</tr>";

for($i=1;$i<=10;$i++){
    echo "<tr>";
    for($x=1;$x<=10;$x++){
        $multiplicado=$i*$x;
    echo"<td>".$x." * " .$i ." = " . $multiplicado . "</td>";
}
echo "</tr>";
}
echo"</tr>";
echo "</table>";
?>