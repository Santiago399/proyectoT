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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProveedorController;
Route::get('/proveedores', [ProveedorController::class , "show"] );

Route::get('/proveedor/delete/{id}', [ProveedorController::class, 'delete'])->name('proveedor.delete');

Route::get('proveedor/form/{id?}', [ProveedorController::class, 'form'])->name('proveedor.form');

Route::post('/proveedor/save', [ProveedorController::class, 'save'])->name('proveedor.save');

use App\Http\Controllers\EntradaController;
Route::get('/entradas', [EntradaController::class , "show"] );

Route::get('/entrada/delete/{id}', [EntradaController::class, 'delete'])->name('entrada.delete');

Route::get('entrada/form/{id?}', [EntradaController::class, 'form'])->name('entrada.form');

Route::post('/entrada/save', [EntradaController::class, 'save'])->name('entrada.save');

use App\Http\Controllers\MaterialController;
Route::get('/materiales', [MaterialController::class , "show"] );

Route::get('/material/delete/{id}', [MaterialController::class, 'delete'])->name('material.delete');

Route::get('material/form/{id?}', [MaterialController::class, 'form'])->name('material.form');

Route::post('/material/save', [MaterialController::class, 'save'])->name('material.save');

use App\Http\Controllers\MarcaController;
Route::get('/marcas', [MarcaController::class , "show"] );

Route::get('/marca/delete/{id}', [MarcaController::class, 'delete'])->name('marca.delete');

Route::get('marca/form/{id?}', [MarcaController::class, 'form'])->name('marca.form');

Route::post('/marca/save', [MarcaController::class, 'save'])->name('marca.save');

use App\Http\Controllers\ObraController;
Route::get('/obras', [ObraController::class , "show"] );

Route::get('/obra/delete/{id}', [ObraController::class, 'delete'])->name('obra.delete');

Route::get('obra/form/{id?}', [ObraController::class, 'form'])->name('obra.form');

Route::post('/obra/save', [ObraController::class, 'save'])->name('obra.save');

use App\Http\Controllers\CategoriaController;
Route::get('/categorias', [CategoriaController::class , "show"] );

Route::get('/categoria/delete/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete');

Route::get('categoria/form/{id?}', [CategoriaController::class, 'form'])->name('categoria.form');

Route::post('/categoria/save', [CategoriaController::class, 'save'])->name('categoria.save');

use App\Http\Controllers\TipoMaterialController;
Route::get('/tipoMateriales', [TipoMaterialController::class , "show"] );

Route::get('/tipoMaterial/delete/{id}', [TipoMaterialController::class, 'delete'])->name('tipoMaterial.delete');

Route::get('tipoMaterial/form/{id?}', [TipoMaterialController::class, 'form'])->name('tipoMaterial.form');

Route::post('/tipoMaterial/save', [TipoMaterialController::class, 'save'])->name('tipoMaterial.save');
