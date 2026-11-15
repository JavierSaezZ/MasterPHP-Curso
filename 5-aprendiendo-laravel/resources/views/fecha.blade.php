<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@php
$y=10;
$z=5;

$x=$y + $z ;
@endphp

<h1>
    {{ $x}}
</h1>


</body>
</html>