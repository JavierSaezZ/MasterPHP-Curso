<h1>Listado de frutas</h1>

<ul>
    <table border="1">

        @foreach($frutas as $fruta)
        <tr>
            <td>
                
                    <a href="{{ route('frutas.detail', ['id' => $fruta->id]) }}">{{$fruta->nombre}}</a>
                    
            </td>

            <td>
<form action="{{ route('borrar', ['id' => $fruta->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Seguro que quieres borrar esta fruta?')">
        Eliminar
    </button>
</form>
        </li>
            </td>
    </tr>
    @endforeach
</table>
</ul>