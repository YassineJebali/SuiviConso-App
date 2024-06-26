<?php

use App\Http\Controllers\LoginUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LocalFamilyController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\ApiAuthController;



//use App\Http\Controllers\ApiAuthController;

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

Route::resource('regions', RegionController::class);

Route::resource('users', UserController::class);

Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
//Route::post('/login', [App\Http\Controllers\ApiAuthController::class, 'generateToken']);

Route::resource('invoices', InvoiceController::class);
Route::post('/submit-form', [InvoiceController::class, 'submitForm']);
Route::get('/get-invoice-reference/{term}', [InvoiceController::class, 'getInvoiceReference']);
Route::get('/get-local-address/{serialNumber}',[InvoiceController::class, 'getAddress']);
Route::get('/invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
Route::get('/getCounters/{local}', [InvoiceController::class, 'getCounters']);


Route::get('/administration', [AdminController::class, 'index'])->name('administration');

Route::resource('locals', LocalController::class);
Route::get('/get-local-address/{query}', [LocalController::class, 'getAddresses']);


Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionController::class);

Route::resource('local_families', LocalFamilyController::class);

Route::resource('usergroups', UserGroupController::class);

Route::resource('counters', CounterController::class);
Route::get('/get-counter-type/{serial_number}', [CounterController::class, 'getType']);
Route::get('/get-counter-serial_number/{query}', [CounterController::class, 'getSerials']);
Route::get('/counters/search', [CounterController::class, 'search']);
Route::get('/get-local-names/{term}', [CounterController::class, 'getLocalNames']);
Route::post('/add-counters', [App\Http\Controllers\CounterController::class, 'store']);
Route::get('/counters/{id}/edit', [App\Http\Controllers\CounterController::class, 'edit']);
Route::put('/counters/{id}', [App\Http\Controllers\CounterController::class, 'update']);



