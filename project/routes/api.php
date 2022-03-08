<?php

use App\Http\Controllers\Api\PatientApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('patients', [PatientApiController::class, 'index'])->name('api.patients.list');
Route::get('patients/{id}', [PatientApiController::class, 'show'])->name('api.patients.show');

// It can be used later to find the Practioner of the current patient
// Route::get('patients/{id}/practitioner', [PractitionerPatientApiController::class, 'show'])->name('api.practitioner.patients.show');
