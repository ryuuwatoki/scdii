<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticlesController;



Route::resource(name:'articles', controller:ArticlesController::class);


Route::get('/', [ArticlesController::class, 'index'])->name('root');

Route::post('/articles/{id}', [ArticlesController::class, 'update']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/welcome', function () {
    return view('welcome');
});


// Route::get('/dashboard', [ArticlesController::class, 'index'])->name('root');
