<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContoller;
use App\Http\Controllers\AdminController;

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



Route::get('/', [HomeContoller::class, 'index']);

Route::get('/home', [HomeContoller::class, 'redirect']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/users', [AdminController::class, 'viewUsers']);

Route::get('/adminHome', [AdminController::class, 'homeView']);

Route::get('/removeUser/{id}', [AdminController::class, 'removeUser']);

Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/uploadDoctor', [AdminController::class, 'uploadDoc']);

Route::post('/appointment', [HomeContoller::class, 'appointment']);

Route::get('/my_appoint', [HomeContoller::class, 'appoint']);

Route::get('/cancel/{id}', [HomeContoller::class, 'cancel']);

Route::get('/appointments', [AdminController::class, 'viewAppointments']);

Route::get('/approve/{id}', [AdminController::class, 'approveAppointment']);

Route::get('/canceled/{id}', [AdminController::class, 'cancelAppointment']);

Route::get('/doctors', [AdminController::class, 'viewDoctors']);

Route::get('/editDoctor/{id}', [AdminController::class, 'editDoctor']);

Route::patch('/updateDoctor/{id}', [AdminController::class, 'updateDoctor']);

Route::get('/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor']);




