<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fruta</title>
    <link rel="stylesheet" href="{{ route('frutas.css') }}">
</head>
<body>
    <main class="contenedor contenedor-formulario">
        <h1>Editar fruta</h1>
        <p>Modifica los datos de {{ $frutas->nombre }}.</p>

        @if($errors->any())
            <div class="errores">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('editar', ['id' => $frutas->id]) }}" method="POST" class="formulario">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $frutas->nombre) }}" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $frutas->descripcion) }}</textarea>

            <label for="precio">Precio (€)</label>
            <input id="precio" name="precio" type="number" step="0.01" min="0" value="{{ old('precio', $frutas->precio) }}" required>

            <div class="botones">
                <a class="boton boton-claro" href="{{ route('frutas.index') }}">Cancelar</a>
                <button class="boton" type="submit">Guardar cambios</button>
            </div>
        </form>
    </main>
</body>
</html>
