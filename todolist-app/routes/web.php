<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

// ==========================================================
// ESTA LINHA ESTAVA FALTANDO!
// Ela carrega todas as rotas do Breeze (login, register, logout, etc.)
require __DIR__.'/auth.php';
// ==========================================================


// Este grupo protege todas as suas rotas de tarefas
Route::middleware(['auth'])->group(function () {

    Route::get('/', [TarefasController::class, 'index'])->name('tarefas.index');
    Route::get('/create', [TarefasController::class, 'create'])->name('tarefas.create');
    Route::post('/create', [TarefasController::class, 'store'])->name('tarefas.store');
    Route::get('{id}/edit', [TarefasController::class, 'edit'])->where('id', '[0-9]+')->name('tarefas.edit');
    Route::put('{id}', [TarefasController::class, 'update'])->where('id', '[0-9]+')->name('tarefas.update');
    Route::delete('{id}', [TarefasController::class, 'destroy'])->where('id', '[0-9]+')->name('tarefas.destroy');

    // Rotas da Lixeira
    Route::get('/tarefas/lixeira', [TarefasController::class, 'lixeira'])->name('tarefas.lixeira');
    Route::patch('/tarefas/{id}/restore', [TarefasController::class, 'restore'])->name('tarefas.restore');
    Route::delete('/tarefas/{id}/force-delete', [TarefasController::class, 'forceDelete'])->name('tarefas.forceDelete');

}); // Fim do grupo de middleware
