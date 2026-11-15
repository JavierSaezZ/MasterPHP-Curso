<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruta;

class FrutaController extends Controller
{
    public function index() {
$frutas = Fruta::all(); 

        return view('fruta.index', compact('frutas'));
}

    public function detail($id) {
$frutas = Fruta::where('id', $id)->first(); 


        return view('fruta.detail', compact('frutas'));
}


    public function save(Request $request) {
// 1. Validar los datos (Imprescindible en Laravel moderno)
    $data = $request->validate([
        'nombre'      => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio'      => 'required|numeric',

    ]);
    $data['fecha'] = date('Y-m-d');

    // 2. Guardar usando el Modelo (Eloquent)
    // Esto es mucho mejor que DB::table
    Fruta::create($data);

    // 3. Redirigir usando el nombre de la ruta
    return redirect()->route('frutas.index')->with('status', '¡Fruta creada correctamente!');
}


    public function editar(Request $request, $id) {
// 1. Validar los datos (Imprescindible en Laravel moderno)
$fruta = Fruta::find($id);

    // Asignamos los nuevos valores
    $fruta->nombre = $request->input('nombre');
    $fruta->descripcion = $request->input('descripcion');
    $fruta->precio = $request->input('precio');

    // Guardamos los cambios
    $fruta->save();

    // 3. Redirigir usando el nombre de la ruta
   return redirect()->route('frutas.index')->with('status', 'Fruta actualizada!');
}



    public function borrar( $id) {
// 1. Validar los datos (Imprescindible en Laravel moderno)
  

    // 2. Guardar usando el Modelo (Eloquent)
    // Esto es mucho mejor que DB::table
    Fruta::find($id)->delete();

    // 3. Redirigir usando el nombre de la ruta
    return redirect()->route('frutas.index');
}
}
