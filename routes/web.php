<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/insert_form', [App\Http\Controllers\EmployeeController::class, 'insert_form']);
Route::post('/store', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit']);
Route::put('/update/{id}', [App\Http\Controllers\EmployeeController::class,'update']);
Route::get('/delete-employee/{id}', [App\Http\Controllers\EmployeeController::class,'delete']);

//datatable- report
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index']);
Route::get('/range', [App\Http\Controllers\ReportController::class, 'dateRange']);



