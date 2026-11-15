        <h1>{{$frutas->nombre}}</h1>
        <p>
             {{ $frutas->descripcion}}


             <h1>Editar Fruta: {{$frutas->nombre}}</h1>

<form action="{{ route('editar', ['id' => $frutas->id]) }}" method="POST">
    @csrf
    {{-- Usamos PUT para actualizaciones --}}
    @method('PUT')

    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $frutas->nombre }}" required>
    </p>

    <p>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required>{{ $frutas->descripcion }}</textarea>
    </p>

    <p>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" value="{{ $frutas->precio }}" required>
    </p>

    {{-- La fecha no la ponemos como has pedido --}}

    <button type="submit">Actualizar Fruta</button>
</form>

{{-- <a href="{{ action('FrutaController@index') }}">Cancelar y volver</a> --}}
        </p>