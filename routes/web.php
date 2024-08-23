<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Ruta para inicio de la aplicacion
Route::get('/', function () {
    return view('welcome');
});

// Ruta a dashboard despues de iniciar sesion
Route::get("dashboard", "App\Http\Controllers\TasksController@dashboard")
        ->middleware(['auth', 'verified'])
        ->name("dashboard");

Route::middleware('auth')->group(function () {    
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

    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name); 
        return ['token' => $token->plainTextToken];
    });
});

require __DIR__.'/auth.php';
