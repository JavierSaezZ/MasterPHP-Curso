<?php
require'../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2Pdf =new Html2Pdf();
$html= "<h1>Hola! aqui un pdf</h1>";
$html2Pdf->writeHTML($html);

$html2Pdf->output("generado.pdf")


?>