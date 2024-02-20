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


Route::group(['prefix' => 'todos', 'as' => 'todos.'], function () {
    Route::get('index', [TodoController::class, 'index'])->name('index');
    Route::get('create', [TodoController::class, 'create'])->name('create');
    Route::post('store', [TodoController::class, 'store'])->name('store');
    Route::get('show/{id}', [TodoController::class, 'show'])->name('show');
    Route::get('{id}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::put('update', [TodoController::class, 'update'])->name('update');
    Route::delete('destroy', [TodoController::class, 'destroy'])->name('destroy');
});

require __DIR__ . '/auth.php';
