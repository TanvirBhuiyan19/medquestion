<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => 'auth' ], function () {
    Route::get('/', [HomeController::Class, 'index'])->name('home');

    //Product Route   
    Route::prefix('product')->name('product.')->group( function(){
        Route::get('/list', [ProductController::class, 'index'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/add', [ProductController::class, 'add'])->name('add');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::post('/status-change', [ProductController::class, 'statusChange'])->name('published');
    });
    
});

