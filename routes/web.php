<?php

use App\Models\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserTrainingController;
use App\Http\Controllers\SessionTrainingController;

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

// Authtenficatin
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/invalid_statut', [AuthController::class, 'invalidStatut'])->name('auth.invalid_statut');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('admin.profile.edit');
Route::put('/profile/update', [ProfileController::class, 'uptadeProfile'])->middleware('auth')->name('profile.update');
Route::post('/profile/update', [ProfileController::class, 'changePassword'])->middleware('auth')->name('password.update');


Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['setAdminStatut','auth', 'checkStatut'])->name('admin.index');

// Users
Route::prefix('/users')->name('admin.users.')->controller(UsersController::class)->middleware('auth')->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('forms.create');
    Route::post('create', 'store')->name('forms.store');
    Route::get('/{user}/edit', 'edit')->name('forms.edit');
    Route::patch('/{user}', 'update')->name('forms.update');
    Route::delete('/{user}', 'destroy')->name('destroy');
    Route::get('/{user}/trades', 'showUserTrades')->name('trade');
});

// Trades
Route::prefix('/trade')->name('user.trade.')->controller(TradeController::class)->middleware('auth')->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('forms.create');
    Route::post('create', 'store')->name('forms.store');
    Route::get('/{trade}/edit', 'edit')->name('forms.edit');
    Route::patch('/{trade}', 'update')->name('forms.update');
    Route::delete('/{trade}', 'destroy')->name('forms.destroy');
});

// Session
Route::prefix('/sessions')->name('admin.sessions.')->controller(SessionTrainingController::class)->middleware('auth')->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('forms.create');
    Route::post('create', 'store')->name('forms.store');
    Route::get('/{session}/edit', 'edit')->name('forms.edit');
    Route::patch('/{session}', 'update')->name('forms.update');
    Route::delete('/{session}', 'destroy')->name('forms.destroy');
});

// Training
Route::prefix('/training')->name('admin.training.')->controller(TrainingController::class)->middleware('auth')->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('forms.create');
    Route::post('create', 'store')->name('forms.store');
    // Route::get('/{training}/edit', 'edit')->name('forms.edit')->can('update', 'training');
    Route::get('/{training}/edit', 'edit')->name('forms.edit')->can('update', 'training');
    Route::patch('/{training}', 'update')->name('forms.update')->can('update', 'training');
    Route::delete('/{training}', 'destroy')->name('forms.destroy');
    Route::get('/{training}/users', 'showTrainingUsers')->name('trainingUsers');
});

//Personal
Route::prefix('/personal')->name('admin.personal.')->controller(PersonalController::class)->middleware('auth')->group( function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('forms.create');
    Route::post('create', 'store')->name('forms.store');
    Route::get('/{personal}/edit', 'edit')->name('forms.edit');
    Route::patch('/{personal}', 'update')->name('forms.update');
    Route::delete('/{personal}', 'destroy')->name('forms.destroy');
});

