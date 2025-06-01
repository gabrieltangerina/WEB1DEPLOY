<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('produtos.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para Produtos que exigem autenticação
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

    // Rotas para Vendas que exigem autenticação
    Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');
    Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
    Route::get('/vendas/{venda}/edit', [VendaController::class, 'edit'])->name('vendas.edit');
    Route::put('/vendas/{venda}', [VendaController::class, 'update'])->name('vendas.update');
    Route::delete('/vendas/{venda}', [VendaController::class, 'destroy'])->name('vendas.destroy');
});

// Rotas públicas para Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');

// Rotas públicas para Vendas
Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/vendas/{venda}', [VendaController::class, 'show'])->name('vendas.show');



require __DIR__ . '/auth.php';
