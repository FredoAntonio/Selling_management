<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Cidade\CidadeController;
use App\Http\Controllers\Venda\VendaController;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\Produto\ProdutoController;
use App\Http\Controllers\Prazo\PrazoController;
use App\Http\Controllers\Documento\DocumentoController;
 
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

/*Route::get('/', function () {
    return Inertia::render('Home');
});*/
//Auth::rotes();
/* Route::get('/',[SiteController::class,'index']);
Route::post('/signout',[SiteController::class,'logout']); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/',[HomeController::class,'index'])->middleware(['auth']);
Route::get('/home',[HomeController::class,'index'])->middleware(['auth']);
 Route::group(['prefix' => 'clientes', 'middleware' => ['auth']], function () {

    Route::get('/index',[ClienteController::class,'index']);
    Route::get('/listar',[ClienteController::class,'clienteAll']);
    Route::get('/criar',[ClienteController::class,'criar']);
    Route::post('/cadastrar',[ClienteController::class,'cadastrar']);
    

});
 
Route::group(['prefix' => 'cidades', 'middleware' => ['auth']], function () {


    Route::get('/listar',[CidadeController::class,'cidadesAll']);
    
   

});
Route::group(['prefix' => 'vendas', 'middleware' => ['auth']], function () {


    Route::get('/index',[VendaController::class,'index']);
    Route::get('/listar-por-data',[VendaController::class,'vendasPorData']);
    Route::get('/criar',[VendaController::class,'criar']);
    Route::post('/cadastrar',[VendaController::class,'cadastrar']);
    Route::post('enviar-pedido-por-email',[VendaController::class,'enviarPedidoPorEmail']);
    Route::get('documento-pedido',[VendaController::class,'gerarDocPedido']);
    

    
});

Route::group(['prefix' => 'empresas','middleware' => ['auth']], function(){
	
	Route::get('/listar', [EmpresaController::class,'empresasAll']);
   // Route::get('/criar', [EmpresaController::class,'criar']);
	
});
Route::group(['prefix' => 'produtos','middleware' => ['auth']], function(){
	
	Route::get('/listar', [ProdutoController::class,'produtosAll']);
   // Route::get('/criar', [EmpresaController::class,'criar']);
	
});
Route::group(['prefix' => 'documentos','middleware' => ['auth']], function(){
	
	Route::get('/listar-tipos', [DocumentoController::class,'tiposAll']);
   // Route::get('/criar', [EmpresaController::class,'criar']);
	
});
Route::group(['prefix' => 'prazos','middleware' => ['auth']], function(){
	
	Route::get('/listar', [PrazoController::class,'prazosAll']);
   // Route::get('/criar', [EmpresaController::class,'criar']);
	
});



require __DIR__.'/auth.php';
