<?php

if($_COOKIE['micookie']){
    // unset($_COOKIE['micookie']);
    setcookie('micookie','',time()-100 );
}


//Header redirecciona a otra pagina
?>