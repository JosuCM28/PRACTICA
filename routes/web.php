<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* get =  obtener
post = guardar
out = actualizar
delete = eliminar */
//Route::view('prueba-vist', 'prueba');

//Route::view('prueba-vist', 'prueba', ['nombre'=> 'Mercado pago']);

/* use App\Http\Controllers\PruebaController;
Route::get('/ruta-controlador', [PruebaController::class, 'index']); */

/*
Route::get('/nueva-vista', function(Request $request){
    return "hola ".$request->get('variable');
});  */


Route::get('/ruta-controlador/{id}', [PruebaController::class, 'recibirParametros']);

Route::prefix('ruta')->group(function(){
    Route::name('ruta.')->group(function(){
    Route::get('/users', function(){
    return view('prueba',['nombre'=>'Mercado Pago']);
    })->name('users');
    Route::get('/users/crear', [PruebaController::class, 'create'])->name('users.create');
        Route::get('/users/show', [PruebaController::class, 'show'])->name('users.show');
        Route::get('/users/edit', [PruebaController::class, 'edit'])->name('users.edit');
        Route::get('/users/delete', [PruebaController::class, 'destroya'])->name('users.delete');

    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/', 'welcome')->name('welcome');

Route::group(['middleware'=>['auth']], function(){
    Route::resource('proveedores', ProveedorController::class);
    Route::get('proveedores-pdf', [ProveedorController::class, 'exportPDF'])->name('proveedores.pdf');
});

Route::group(['middleware'=>['auth']], function(){
    Route::resource('productos', ProductoController::class);
    Route::get('productos-pdf', [ProductoController::class, 'exportPDF'])->name('productos.pdf');
});
