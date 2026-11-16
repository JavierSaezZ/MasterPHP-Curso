<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de frutas</title>
    <link rel="stylesheet" href="{{ route('frutas.css') }}">
</head>
<body>
    <main class="contenedor">
        <header class="cabecera">
            <div>
                <h1>Listado de frutas</h1>
                <p>Ejercicio CRUD con Laravel</p>
            </div>
            <a class="boton" href="{{ url('/user/crear') }}">+ Añadir fruta</a>
        </header>

        @if(session('success') || session('status'))
            <p class="mensaje">{{ session('success') ?? session('status') }}</p>
        @endif

        <div class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($frutas as $fruta)
                        <tr>
                            <td>{{ $fruta->nombre }}</td>
                            <td>{{ $fruta->descripcion ?: 'Sin descripción' }}</td>
                            <td>{{ number_format((float) $fruta->precio, 2, ',', '.') }} €</td>
                            <td class="acciones">
                                <a class="boton boton-claro" href="{{ route('frutas.detail', ['id' => $fruta->id]) }}">Editar</a>
                                <form action="{{ route('borrar', ['id' => $fruta->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="boton boton-borrar" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No hay frutas guardadas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
