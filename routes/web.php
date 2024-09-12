<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\InventoryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function () {
    return view('registerView');
});

Route::get('/login', function () {
    return view('loginView');
});

Route::get('/addInventory', function () {
    return view('newInventoryForm');
});

// Route::get('/supplyForm', function () {
//     return view('inventoriesSupplyForm');
// });

Route::get('/fillStock', function () {
    return view('fillStockForm');
});

Route::get('/dashboard', function () {
    return view('landingpage');
})->name('home');

Route::post('/registerUser', [AuthenticationController::class, 'register'])->name('registerUser');

Route::post('/login', [AuthenticationController::class, 'login'])->name('loginUser');

Route::post('/addInventory', [InventoryController::class, 'add'])->name('addInventory');

Route::get('/inventoriesForm', [InventoryController::class, 'loadView'])->name('inventoriesForm');

Route::post('/getStock', [InventoryController::class, 'itemStock'])->name('getStock');

Route::get('/fillStock', [InventoryController::class, 'loadInventories'])->name('fillStock');

Route::post('/addUnits', [InventoryController::class, 'addUnits'])->name('addUnits');

Route::post('/supplyInventory', [InventoryController::class, 'supply'])->name('supplyInventory');



