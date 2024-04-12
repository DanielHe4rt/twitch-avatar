<?php

use App\Http\Controllers\AvatarController;
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
    return view('welcome');
});

Route::get("/{avatar}.png", [AvatarController::class,"redirectToAvatar"])->name("redirect-avatar");
Route::get("/file/{avatar}.png", [AvatarController::class, "getAvatar"])->name("get-avatar");
