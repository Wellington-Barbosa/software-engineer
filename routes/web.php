<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoCompraController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Rotas da Tabela Pessoa (C001_Pessoa)
Route::middleware(['auth:sanctum', 'verified'])->get('/listar/pessoas', [PessoaController::class, 'index'])->name('listar_pessoas');
Route::middleware(['auth:sanctum', 'verified'])->any('/pesquisar/pessoas', [PessoaController::class, 'search'])->name('pesquisar_pessoas');
Route::middleware(['auth:sanctum', 'verified'])->get('/cadastrar/pessoa', [PessoaController::class, 'create'])->name('form_cadastrar_pessoa');
Route::middleware(['auth:sanctum', 'verified'])->post('/cadastrar/pessoa', [PessoaController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/pessoa/edit/{id}', [PessoaController::class, 'edit'])->name('pessoa_edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/pessoa/edit', [PessoaController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->get('/pessoa/show/{id}', [PessoaController::class, 'show']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/pessoa/{id}', [PessoaController::class, 'destroy'])->name('pessoa_delete');

// Rotas da Tabela Produto (C002_Produto)
Route::middleware(['auth:sanctum', 'verified'])->get('/listar/produtos', [ProdutoController::class, 'index'])->name('listar_produtos');
Route::middleware(['auth:sanctum', 'verified'])->any('/pesquisar/produtos', [ProdutoController::class, 'search'])->name('pesquisar_produtos');
Route::middleware(['auth:sanctum', 'verified'])->get('/cadastrar/produto', [ProdutoController::class, 'create'])->name('form_cadastrar_produto');
Route::middleware(['auth:sanctum', 'verified'])->post('/cadastrar/produto', [ProdutoController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto_edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/produto/edit', [ProdutoController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->get('/produto/show/{id}', [ProdutoController::class, 'show']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto_delete');


// Rotas da Tabela Produto (T001_PedidoCompra)
Route::middleware(['auth:sanctum', 'verified'])->any('/cadastrar/pedido', [PedidoCompraController::class, 'create'])->name('form_cadastrar_pedido');
Route::middleware(['auth:sanctum', 'verified'])->get('/select2-autocomplete-ajax-pessoas', [PedidoCompraController::class, 'dataAjaxPessoas']);
//Route::middleware(['auth:sanctum', 'verified'])->get('/item-add/{id}', [PedidoCompraController::class, 'addItem'])->name('pedido.addItem');
Route::middleware(['auth:sanctum', 'verified'])->post('/abrir/pedido', [PedidoCompraController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->any('/completar/pedido/{id}', [PedidoCompraController::class, 'complete'])->name('form_completar_pedido');
