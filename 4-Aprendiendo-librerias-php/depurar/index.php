<?php
require'../vendor/autoload.php';

use PHPConsoleLog\Service as Console;
$frutas = ['manzanas', 'naranjas', 'sandías'];
Console::log($frutas);
Console::exec(); // Inserta automáticamente el `<script>` justo donde lo pongas
