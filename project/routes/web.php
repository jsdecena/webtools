<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientController;
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
    return view('login');
});

Route::get('login', function () {
    return redirect()->to('/');
})->name('login');;

Route::post('login', [EmployeeController::class, 'authenticate'])->name('login');
Route::get('logout', [EmployeeController::class, 'logout'])->name('logout');

Route::post('patients/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::get('patients/{id}/edit', [PatientController::class, 'edit'])->name('patient.edit');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');

// Route::resource('employees', EmployeeController::class);
