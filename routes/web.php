<?php

use App\Http\Controllers\PropertyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/imovel/{propertyCode}', [PropertyController::class, 'show'])->name('property.show');
Route::get('/{transactionType}/{type?}/{addressSlug?}/{search?}', [PropertyController::class, 'index'])->name('property.index');

require __DIR__.'/auth.php';
