<?php
//setcookie("nombre","valor solo texto", caducidad,ruta,dominio)

//Cookie vasica
setcookie("micookie","valorde mi galleta");


//Cookie con expiracion
setcookie("unano","valorde mi galleta de 365", time()+(60*60*24*365));
setcookie("10sec","valorde mi galleta de 365", time()+(10));

?>

<a href="ver_cookies.php">Ver las Galletas</a>