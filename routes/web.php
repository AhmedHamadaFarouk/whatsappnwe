<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WhatsappIdController;
use App\Http\Controllers\ProfileController;
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
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('whatsapp_id', WhatsappIdController::class);
    Route::resource('statusWhatsapp', \App\Http\Controllers\Admin\StatusWhatsappController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::post('messages', [\App\Http\Controllers\Admin\UserController::class, 'messages'])->name('send_messages');
    Route::post('sendWelcomeMessages', [\App\Http\Controllers\Admin\UserController::class, 'sendWelcomeMessages'])->name('sendWelcomeMessages');
    Route::resource('templates', \App\Http\Controllers\Admin\TemplateController::class);

});


