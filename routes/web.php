<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => 'auth' ], function () {
    Route::get('/', [HomeController::Class, 'index'])->name('home');

    //Product Route   
    Route::get('product/manage', [ProductController::Class, 'manageProduct'])->name('product.manage');
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [ProductController::Class, 'getSubSubcategory']);
    Route::get('product/add', [ProductController::Class, 'addProduct'])->name('product.add');
    Route::post('product/store', [ProductController::Class, 'createProduct'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::Class, 'editProduct'])->name('product.edit');
    Route::post('/product/update', [ProductController::Class, 'updateProduct'])->name('product.update');
    Route::post('/product/thumb-update', [ProductController::Class, 'thumbUpdateProduct'])->name('product.thumb-update');
    Route::post('/product/multipleimg-update', [ProductController::Class, 'updateProductImage'])->name('product.multipleimg-update');
    Route::get('/product/view/{id}', [ProductController::Class, 'viewProduct'])->name('product.view');
    Route::get('/product/clone/{id}', [ProductController::Class, 'cloneProduct'])->name('product.clone');
    Route::get('/product/delete/{id}', [ProductController::Class, 'deleteProduct'])->name('product.delete');
    Route::get('/product/multipleimg-delete/{id}', [ProductController::Class, 'deleteProductImage'])->name('product.deleteImage');
    Route::get('/product/active/{id}', [ProductController::Class, 'activeProduct'])->name('product.active');
    Route::get('/product/inactive/{id}', [ProductController::Class, 'inactiveProduct'])->name('product.inactive');
    
});

