<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Ruta para inicio de la aplicacion
Route::get('/', function () {
    return view('welcome');
});

//Ruta para master de tareas
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Ruta para mostrar todas las tareas
    Route::get("tasks/task-list", "App\Http\Controllers\TasksController@taskList")->name("task.tasklist");
    
    // Rutas para crear nuevas tareas
    Route::get("tasks/create", "App\Http\Controllers\TasksController@create")->name("task.create");
    Route::post("tasks/store", "App\Http\Controllers\TasksController@store")->name("task.store");
    
    // Rutas para actualizar tareas
    Route::get("tasks/edit/{id}", "App\Http\Controllers\TasksController@edit")->name("task.edit");
    Route::put("tasks/update/{id}", "App\Http\Controllers\TasksController@update")->name("task.update");

    //Ruta para eliminar tareas
    Route::delete("tasks/delete/{id}", "App\Http\Controllers\TasksController@delete")->name("task.delete");

    // Rutas para autenticacion de usuarios
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
