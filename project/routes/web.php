<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NoteController;
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
})->name('login');

Route::post('login', [EmployeeController::class, 'authenticate'])->name('login');
Route::get('logout', [EmployeeController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('patients', [PatientController::class, 'create'])->name('patient.create');
    Route::post('patients', [PatientController::class, 'store'])->name('patient.store');
    Route::get('patients/{id}', [PatientController::class, 'show'])->name('patient.show');
    Route::post('patients/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::get('patients/{id}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::get('patients/{id}/note', [NoteController::class, 'create'])->name('patient.note');
    Route::post('patients/{id}/note', [NoteController::class, 'store'])->name('patient.note.store');
    Route::post('patients/{id}/toggle-active', [PatientController::class, 'toggleActive'])->name('patient.toggle.active');
});
