<?php

use App\Http\Controllers\EmailListController;
use App\Http\Controllers\MessageController;
use App\Mail\sendmessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::post('/', [EmailListController::class, 'store'])
        ->name('store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::middleware(['auth'])->group (function() {

    Route::get('home/messages/{emailid}', [EmailListController::class, 'show']);

    Route::get('messages/create', [MessageController::class, 'create'])
    ->name('create');

    Route::post('messages/create', [MessageController::class, 'store'])
    ->name('createmessage');

    Route::get('messages/show/{messageId}', [MessageController::class, 'show'])
    ->name('show');

    Route::get('messages/preview/{messageId}', [MessageController::class, 'index'])
    ->name('preview');

    Route::get('messages/send/{messageId}', [MessageController::class, 'send'])
    ->name('send');

    // Route::get('/sendmessage/{messageId}', [MessageController::class, 'show'])->name('sendmessage');

});



// Route::get('home/messages/{emailid}', [EmailListController::class, 'show']);
