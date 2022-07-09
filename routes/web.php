<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\admin\StockController;
use App\Http\Controllers\Admin\SubcategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\CarritoController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MercadopagoControler;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/nosotros', function (){ return view('web/nosotros');})->name('nosotros');
Route::get('/contacto', function (){ return view('web/contacto');})->name('contacto');

/** LOGIN */
Route::get('login', function () { return view('login.index');})->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);

/** CARRITO */
Route::get('/carrito', function (){ return view('web/carrito');})->name('carritocompras');
Route::post('/carrito', [CarritoController::class,'store'])->name('carritoGuardado');

Route::post('/preferenciapago',[MercadopagoController::class,'store'])->name('preferenciapago');

Route::get('menu-administrativo', function () { return view('administrativo.index');})->middleware('isAdmin');

Route::controller(CategoriaController::class)->group(function () {
    Route::get('menu-administrativo/categorias','index')->middleware('isAdmin')->name('categorias');
    Route::post('menu-administrativo/categorias','store')->middleware('isAdmin')->name('AddCategoria');
    Route::delete('menu-administrativo/categorias/{id}','destroy')->middleware('isAdmin')->name('EliminarCategoria');
    Route::put('menu-administrativo/categorias/{id}','update')->middleware('isAdmin')->name('EditarCategoria');
});

Route::controller(SubcategoriaController::class)->group(function (){
    route::get('menu-administrativo/subcategorias','index')->middleware('isAdmin')->name('subcategorias');
    route::post('menu-administrativo/subcategorias','store')->middleware('isAdmin')->name('AddSubcategoria');
    route::delete('menu-administrativo/subcategorias/{id}','destroy')->middleware('isAdmin')->name('EliminarSubcategoria');
    route::put('menu-administrativo/subcategorias/{id}','update')->middleware('isAdmin')->name('EditarSubcategoria');
});

Route::controller(ProductoController::class)->group(function (){
    route::get('menu-administrativo/productos','index')->middleware('isAdmin')->name('productos');
    route::post('menu-administrativo/productos','store')->middleware('isAdmin')->name('AddProducto');
    route::delete('menu-administrativo/productos/{id}','destroy')->middleware('isAdmin')->name('EliminarProducto');
    route::put('menu-administrativo/productos/{id}','update')->middleware('isAdmin')->name('EditarProducto');
});

Route::controller(StockController::class)->group(function (){
    route::put('menu-administrativo/productos/stock/{id}','update')->middleware('isAdmin')->name('EditarStock');
});

route::get('menu-administrativo/orden-compra',function (){
    return view('administrativo.ordendecompra');
})->middleware('isAdmin')->name('ordendecompra');

Route::get('menu-cliente', function () { return view('cliente.index');})->middleware('isCliente');