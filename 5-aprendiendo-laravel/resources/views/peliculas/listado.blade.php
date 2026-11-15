<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include ('includes.header')
    
    <h1>
    {{ $titulo }}
    <br>
    {!! $listado[0] !!}
    <br>
    {{ $listado[1]}}
<br>
    {{ $listado[2]}}    
</h1>

{{-- esto es para saber si la variable esta vacia o no --}}
{{ $director ?? 'No hay ningún director' }}


<!-- CONDICIONALES -->
@if($titulo && count($listado) >= 5 )
    <h1>El titulo existe y es este: {!! $titulo !!} y el listado es mayor a 5 y la pelicula es {{ $listado[5]}}</h1>
@elseif($titulo)
    <h1>El titulo existe y el listado NO ES MAYOR A 5</h1>
@else
    <h1>El titulo no existe</h1>
@endif

<hr>



<!-- BUCLES -->

{{-- @for($i = 1; $i <= 20; $i++)
    El numero es: {{$i}} <br/>
@endfor

@php $contador = 1 @endphp
@while($contador < 50)
    @if($contador % 2 == 0)
        NUMERO PAR: {{$contador}} <br/>   
    @endif

@php
    $contador++;
    echo $contador @endphp
@endwhile

@foreach ($listado as $pelicula)
<p>{{$pelicula}}</p>
@endforeach --}}

</body>
</html>