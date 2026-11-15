<h1>Crear una fruta</h1>
<form action="{{ route('save') }}" method="POST">
@csrf  
<label for="nombre">Nombre</label>
    <input type="text" name="nombre" /><br/>

    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" />

    <label for="precio">Precio</label>
    <input type="text" name="precio" />

    <input type="submit" value="Guardar" />
</form>