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

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPasswordController;
use App\Http\Controllers\WalkinController;
use App\Http\Controllers\EnquiryController;



Route::post('/add-contact', [WalkinController::class, 'store'])->name('user.store');

// Admin Login Routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Public Routes
Route::get('/', function () {
    return view('index');
})->name('user.home');

Route::get('/story/{id}', function ($id) {
    return view('userstory.index', ['user_id' => $id]);
});


Route::middleware(['auth:admin'])->group(function () {
    // Admin routes protected by 'admin' guard
    Route::get('/administrator', [EnquiryController::class, 'showDashboard'])->name('admin');
    


    Route::get('/administrator/enquiry', [EnquiryController::class, 'showEnquiries'])->name('enquiry');
    Route::post('/update-status', [EnquiryController::class, 'updateStatus'])->name('update.status');

    
    Route::get('/administrator/password', [AdminPasswordController::class, 'showChangePasswordForm'])->name('admin.password.form');
    Route::get('/add-walkin', [WalkinController::class, 'showForm'])->name('walkin.form');
    Route::post('/add-walkin', [WalkinController::class, 'store'])->name('walkin.store');
    // Handle the password change form submission
    Route::post('/administrator/password/change', [AdminPasswordController::class, 'changePassword'])->name('admin.password.change');
});

// Gallery
Route::get('/gallery', function () {
    return view('gallery.index');
});
