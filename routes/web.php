<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //company route
    Route::get('/company_add',[CompanyController::class,'index'])->name('company_add');
    Route::get('/company/create',[CompanyController::class,'create'])->name('company.create');
    Route::post('/company/store',[CompanyController::class,'store'])->name('company.store');
    // Route::get('/company/show',[CompanyController::class,'edit'])->name('company.edit');
    Route::get('/company/edit{id}',[CompanyController::class,'edit'])->name('company.edit');
    Route::put('/company/update{id}',[CompanyController::class,'update'])->name('company.update');
    Route::get('/company/delete{id}',[CompanyController::class,'destroy'])->name('company.delete');

    //Employee Route
    Route::get('/emp_view',[EmployeeController::class,'index'])->name('emp_view');
    Route::get('/emp_create',[EmployeeController::class,'create'])->name('emp_create');
    Route::post('/emp_store',[EmployeeController::class,'store'])->name('emp_store');
    Route::get('/emp_edit{id}',[EmployeeController::class,'edit'])->name('emp_edit');
    Route::put('/emp_update{id}',[EmployeeController::class,'update'])->name('emp_update');
    Route::get('/emp_delete{id}',[EmployeeController::class,'destroy'])->name('emp_delete');
    //mail send
    Route::get('/mail',[MailController::class,'send'])->name('mail');
    Route::post('/mailsend',[MailController::class,'mailsend'])->name('mailsend');

});

require __DIR__.'/auth.php';
