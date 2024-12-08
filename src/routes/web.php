<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
https://claude.ai/chat/ca79a5e3-b746-45f0-9dca-3fafecbef626
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('contacts', [ContactController::class, 'store']);