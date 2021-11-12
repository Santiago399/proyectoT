<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group( ['middleware' => 'auth', 'Verified'], function(){

    Route::get('/usuarios/create',[App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/usuarios',[App\Http\Controllers\UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/index',[App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit',[App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}',[App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuarios.delete');

    Route::resource('marcas', App\Http\Controllers\MarcaController::class)->names('marcas');
    Route::resource('tipoMateriales', App\Http\Controllers\TipoMaterialController::class)->names('tipoMateriales');
    Route::resource('materiales', App\Http\Controllers\MaterialController::class)->names('materiales');
    Route::resource('entradas', App\Http\Controllers\EntradaController::class)->names('entradas');
    Route::resource('obras', App\Http\Controllers\ObraController::class)->names('obras');
    Route::resource('entradaMateriales', App\Http\Controllers\EntradaMaterialController::class)->names('entradaMateriales');
    Route::resource('proveedores', App\Http\Controllers\ProveedorController::class)->names('proveedores');
    Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->names('categorias');
    Route::resource('clientes', App\Http\Controllers\ClienteController::class)->names('clientes');
    Route::resource('salidas', App\Http\Controllers\SalidaController::class)->names('salidas');
    Route::resource('salidaMateriales', App\Http\Controllers\SalidaMaterialController::class)->names('salidaMateriales');

    Route::resource('permissions', App\Http\Controllers\PermissionController::class)->names('permissions');
    Route::resource('roles', App\Http\Controllers\RolController::class)->names('roles');

    // Route::get('datatable/usuarios', 'DatatableController@Usuario')->name('datatable.usuario');
    Route::get('ajax/request/materiales',[App\Http\Controllers\MaterialController::class,'datatableMateriales'])->name('ajax.request.materiales');
    Route::get('ajax/request/obras',[App\Http\Controllers\ObraController::class,'datatableObras'])->name('ajax.request.obras');
    Route::get('ajax/request/marcas',[App\Http\Controllers\MarcaController::class,'datatableMarcas'])->name('ajax.request.marcas');

});


