<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::get('/event/create', [DashboardEvent::class, 'create'])->name('event.create');
Route::get('/event/checkSlug/{judul}', [DashboardEvent::class, 'checkSlug']);
Route::post('/event', [DashboardEvent::class, 'store'])->name('event.store');
Route::get('/event/read/{slug}', [HomeController::class, 'read'])->name('event.read');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::delete('/dashboard{kontak}', [DashboardController::class, 'destroy'])->name('admin.dashboard.destroy');

    Route::get('/admin/event', [DashboardEvent::class, 'index'])->name('admin.event.index');
    Route::patch('/admin/event/{event}/set_accept', [DashboardEvent::class, 'set_accept'])->name('admin.event.set_accept');
    Route::patch('/admin/event/{event}/set_denied', [DashboardEvent::class, 'set_denied'])->name('admin.event.set_denied');
    Route::delete('/admin/event/{event}', [DashboardEvent::class, 'destroy'])->name('admin.event.destroy');

    Route::get('/admin/profil', [DashboardProfil::class, 'index'])->name('admin.profil.index');
    Route::get('/admin/profil/create', [DashboardProfil::class, 'create'])->name('admin.profil.create');
    Route::post('/admin/profil', [DashboardProfil::class, 'store'])->name('admin.profil.store');
    Route::put('/admin/profil/{profil}', [DashboardProfil::class, 'update'])->name('admin.profil.update');
    Route::delete('/admin/profil/{profil}', [DashboardProfil::class, 'destroy'])->name('admin.profil.destroy');

    Route::get('/admin/user', [DashboardUser::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [DashboardUser::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [DashboardUser::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{user}/show', [DashboardUser::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/{user}/edit', [DashboardUser::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{user}', [DashboardUser::class, 'update'])->name('admin.user.update');
    Route::middleware(['root'])->group(function () {
        Route::put('/admin/user/{user}/updateroot', [DashboardUser::class, 'updateroot'])->name('admin.user.updateroot');
        Route::patch('/admin/user/{user}/set-admin', [DashboardUser::class, 'set_admin'])->name('admin.user.set_admin');
        Route::patch('/admin/user/{user}/set-root', [DashboardUser::class, 'set_root'])->name('admin.user.set_root');
    });
    Route::delete('/admin/user/{user}', [DashboardUser::class, 'destroy'])->name('admin.user.destroy');
});