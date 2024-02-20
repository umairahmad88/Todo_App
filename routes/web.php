<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    $todos = App\Models\Todo::all();
    return view('todos.index', ['todos' => $todos]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('todos/index',[TodoController::class, 'index'])->name('todos.index');
Route::get('todos/create',[TodoController::class, 'create'])->name('todos.create');

Route::post('todos/store',[TodoController::class, 'store'])->name('todos.store');
Route::get('todos/show/{id}',[TodoController::class, 'show'])->name('todos.show');
Route::get('todos/{id}/edit',[TodoController::class, 'edit'])->name('todos.edit');
Route::put('todos/update', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');

require __DIR__.'/auth.php';
