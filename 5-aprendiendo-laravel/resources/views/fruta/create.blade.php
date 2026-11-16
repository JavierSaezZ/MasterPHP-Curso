<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir fruta</title>
    <link rel="stylesheet" href="{{ route('frutas.css') }}">
</head>
<body>
    <main class="contenedor contenedor-formulario">
        <h1>Añadir fruta</h1>
        <p>Introduce los datos para crear una fruta.</p>

        @if($errors->any())
            <div class="errores">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('save') }}" method="POST" class="formulario">
            @csrf
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>

            <label for="precio">Precio (€)</label>
            <input id="precio" name="precio" type="number" step="0.01" min="0" value="{{ old('precio') }}" required>

            <div class="botones">
                <a class="boton boton-claro" href="{{ route('frutas.index') }}">Cancelar</a>
                <button class="boton" type="submit">Guardar fruta</button>
            </div>
        </form>
    </main>
</body>
</html>
