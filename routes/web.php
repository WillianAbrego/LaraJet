<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ejemplo 1-- regresando texto
Route::get('/texto', function(){
    return "<h1>esto es un texto de prueba</h1>";
});

//ejemplo 2 -- con array
Route::get('/arreglo', function(){
  //  $arreglo = ['lunes','martes','miercoles','jueves'];
  $arreglo=[
      'Id'=>'1',
      'Description'=>'Producto 1'
  ];
  return $arreglo;
});

//ejemplo 3 -- parametros
Route::get('/nombre/{nombre}',function ($nombre){
    return '<h1>el nombre es: '.$nombre.'</h1>';
});

//ejemplo 4 -- parametros default
Route::get('/cliente/{cliente?}',function ($cliente='Cliente general'){
    return '<h1>el nombre es: '.$cliente.'</h1>';
});

//ejemplo 5 -- redireccionamiento de rutas
Route::get('/ruta1', function(){
    return "<h1>esto es la vista de la ruta 1</h1>";
})->name('rutaNro1');

Route::get('/ruta2', function(){
    //return "<h1>esto es la vista de la ruta 2</h1>";
    return redirect()->route('rutaNro1');
});

//ejemplo 6
Route::get('/usuario/{usuario}', function($usuario){
    return "El usuario es: ".$usuario;
})->where('usuario','[0-9]+');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
