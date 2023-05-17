<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $cates = Category::get();
    $events = Event::get();
    return view('dashboard', compact('events','cates'));;
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::middleware('auth:admin')->group(function () {

    Route::get('/cate', [CategoryController::class,'index']);
    Route::get('/cateadd', [CategoryController::class, 'create']);
    Route::post('/cateadd', [CategoryController::class, 'store']);
    Route::get('/cate/{id}/editcat', [CategoryController::class, 'edit']);
    Route::put('/cates/{id}', [CategoryController::class, 'update']);
    Route::delete('/cate/{id}', [CategoryController::class, 'destroy']);

    Route::get('/payment', [CategoryController::class, 'payment']);
    Route::get('/users', [CategoryController::class, 'users']);
    Route::get('/event/{eventid}/edit', [EventController::class, 'edit']);
    Route::put('/event/{id}', [EventController::class, 'update']);
    Route::get('/cate/{id}/addevent', [EventController::class,'index']);
    Route::post('/cate/{id}/addevent/create', [EventController::class, 'create']);
    Route::post('/cate/{id}/addevent/create/add', [EventController::class, 'store']);
    Route::delete('/cate/{id}/{eventid}', [EventController::class, 'destroy']);
   


});
 

Route::middleware('auth')->group(function () {
    Route::get('/category/{id}', [UserController::class,'index']);
    Route::post('/razorpaypayment', [RazorpayController::class, 'payment']);
    Route::get('/invoice/{id}', [RazorpayController::class,'invoice']); 
});



