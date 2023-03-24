<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vendor\VendorAdminController;
use Illuminate\Support\Facades\Route;

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
    return view('frontend');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::Post('/dashboard/user/profile', [UserController::class, 'profileStore'])->name('user.profile.store');
    Route::post('/dashboard/logout', [UserController::class, 'destroy'])->name('user.logout');
    Route::post('/user/profile/password/update', [UserController::class, 'passwordUpdate'])->name('user.profile.password_update');

});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
   Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
   Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
   Route::post('/admin/profile/store', [AdminController::class, 'profile_store'])->name('admin.profile.store');
   Route::get('/admin/profile/password', [AdminController::class, 'password'])->name('admin.profile.password');
   Route::post('/admin/profile/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.profile.password_update');
   Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

Route::middleware(['auth', 'role:vendor'])->group(function(){
    Route::get('/vendor/dashboard', [VendorAdminController::class, 'dashboard'])->name('vendor.dashboard');
    Route::get('/vendor/profile', [VendorAdminController::class, 'profile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorAdminController::class, 'profile_store'])->name('vendor.profile.store');
    Route::get('/vendor/profile/password', [VendorAdminController::class, 'password'])->name('vendor.profile.password');
    Route::post('/vendor/profile/password/update', [VendorAdminController::class, 'passwordUpdate'])->name('vendor.profile.password_update');
    Route::post('/vendor/logout', [VendorAdminController::class, 'destroy'])->name('vendor.logout');
});


// Route Admin Login
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('vendor/login', [VendorAdminController::class, 'login'])->name('vendor.login');
Route::get('dashboard/login', [UserController::class, 'login'])->name('user.login');

//Route Brand controller
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::resource('products/brands', BrandController::class);
});

require __DIR__.'/auth.php';
