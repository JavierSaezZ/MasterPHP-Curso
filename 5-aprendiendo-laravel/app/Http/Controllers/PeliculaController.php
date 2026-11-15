<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{

//     public function index() {
//         $titulo = 'Listado de mis peliculas';
// $listado= array ("Batman","","Superman","MI1","007","Mortadelo y filemon");
// return view('peliculas.listado', [
//     'titulo' => $titulo,
//         'listado' => $listado
// ]);
//     }

    public function mostrarlistado() {
        $titulo = 'Listado de mis peliculas';
$listado= array ("Batman","","Superman","MI1","007","Mortadelo y filemon");
return view('peliculas.listado', [
    'titulo' => $titulo,
        'listado' => $listado
]);
    }

    public function redirigir() {
    // Te lleva a la ruta que hemos bautizado como 'detalle.pelicula'
    return redirect()->route('listado'); 
}

    public function formulario() {
    return view('pelicula.formulario');
}


public function recibir(Request $request) {
    $nombre = $request->input('nombre');
    $email= $request->input('email');

    // var_dump($nombre);
    // var_dump($email);
    return " El nombre es: $nombre y el email es: $email";

    die();
}

}