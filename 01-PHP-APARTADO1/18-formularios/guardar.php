<?php

//Post es mejor :)
if(isset($_GET['titulo']) && isset($_GET['descripcion'])){
    echo $_GET['titulo'] . " - " . $_GET['descripcion'];
}