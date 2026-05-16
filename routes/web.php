<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {

    return redirect()->route('products.index');

});

Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class);

});

require __DIR__.'/auth.php';