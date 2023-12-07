<?php

use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\master\Profile_masterController;
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
    return view('auth/login');
});

Route::middleware(['admin'])->group(function (){
   Route::get('/dashboard-admin',[DashboardController::class,'admin'])->name('dashboard.admin');
   Route::get('form-item',[ItemController::class,'form_item']);
   Route::post('insert',[ItemController::class,'add_item']);
   Route::get('item',[ItemController::class, 'show_item']);
});

Route::middleware(['master'])->group(function () {
    Route::get('dashboard-master',[DashboardController::class,'master'])->name('dashboard.master');
    Route::get('profile-master',[Profile_masterController::class,'read']);
});

Route::middleware(['other'])->group(function (){
    Route::get('dashboard-other',[DashboardController::class,'other'])->name('dashboard.other');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
