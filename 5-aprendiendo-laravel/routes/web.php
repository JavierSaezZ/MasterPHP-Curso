<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; 
use App\Http\Controllers\FrutaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pruebas', function () {
    return view('welcome');
});

Route::get('/fecha', function () {
    echo date('d-m-y');
});

Route::get('/fecha', function () {
    return view('fecha');
});





Route::get('/pelicula', function () {
$titulo= "<a style='color:red'>Listado de a peliculas</a>";
$listado= array ("Batman","","Superman","MI1","007","Mortadelo y filemon");
$director=null;

return view('pelicula.index', compact('titulo', 'listado', 'director'

// esto es antiguo
// return view('peliculas/listado ', array(
// 'titulo' => $titulo

));
});



// Route::get('/pagina', function () {
//     return view('pagina');
// });


// Route::get('/pelicula', function () {
//     return view('pelicula.index');
// });


// Route::get('/peliculas', 'App\Http\Controllers\PeliculaController@index');



// 1. Esta es tu página de inicio (solo carga la vista HTML directamente)
// Route::get('/pelicula', function () {
//     return view('pelicula.index');
// });

// 2. Esta es la ruta de tu controlador (procesa datos y luego muestra el listado)
// Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');

Route::get('/listado-final', [PeliculaController::class, 'mostrarListado'])->name('listado');


Route::get('/redirigir', [PeliculaController::class, 'redirigir']);


Route::get('/formulario', [PeliculaController::class, 'formulario']);

Route::post('/recibir', [PeliculaController::class, 'recibir'])
    ->name('recibir');


Route::get('/pelicula/index', [PeliculaController::class, 'mostrarlistado'])
    ->middleware('esadmin')
    ->name('listadoadmin');





// Rutas fruta
Route::group(['prefix' => 'user'], function () {
    Route::get('index', [FrutaController::class, 'index'])->name("frutas.index");
    Route::post('save', [FrutaController::class, 'save'])->name('save');
    Route::put('editar/{id}', [FrutaController::class, 'editar'])->name('editar');
    Route::delete('borrar/{id}', [FrutaController::class, 'borrar'])->name('borrar');
 Route::get('/crear', function () {
    return view('fruta.create');
});
Route::get('detail/{id}', [FrutaController::class, 'detail'])->name('frutas.detail');
});





// // Route::get('/mostrar-fecha', function () {
// //     if ("error") {
// //      $error ="El numero es incorrecto";
// // return view('mostrar-fecha', array(
// // 'titulo' => $error));
// //     }
// //  else  if ("error2"){
// //      $error ="El numero 2 es incorrecto";
// // return view('mostrar-fecha', array(
// // 'titulo' => $error
// // ));
// //  }
// // });