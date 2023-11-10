<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use \App\Http\Controllers\IndexController;
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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');

    return "Cache cleared successfully";
});

Route::get('/', function () {
    return view('index');
});
Route::get('/', [IndexController::class, 'index']);
Route::resource('application', ApplicationController::class)->except([
    'index',
    'create',
    'edit',
    'show',
    'update',
    'destroy',
]);

Route::get('/getLeads', [ApplicationController::class, 'getLeadsAdmin']);



require __DIR__.'/auth.php';
