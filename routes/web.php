<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\Administrator\IndexController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\DailyReportController as AdministratorDailyReportController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::get('login', [ProfileController::class, 'edit'])->name('administrator.login.index');
    });
});

// 日報
Route::middleware('auth')->group(function () {
    Route::get('/daily_report', [DailyReportController::class, 'index'])->name('daily_report.index');
    Route::get('/daily_report/create/{date}', [DailyReportController::class, 'create'])->name('daily_report.create');
    Route::post('/daily_report/store/{date}', [DailyReportController::class, 'store'])->name('daily_report.store');
    Route::get('/daily_report/edit/{daily_report_detail_id}', [DailyReportController::class, 'edit'])->name('daily_report.edit');
    Route::post('/daily_report/update/{daily_report_detail_id}', [DailyReportController::class, 'update'])->name('daily_report.update');
    Route::post('/daily_report/delete/{daily_report_detail_id}', [DailyReportController::class, 'delete'])->name('daily_report.delete');
});

require __DIR__.'/auth.php';

// 管理者
Route::prefix('administrator')->name('administrator.')->group(function(){

    Route::get('/dashboard', function () {
        return view('administrator.dashboard');
    })->middleware(['auth:administrator'])->name('dashboard');

    Route::middleware('auth:administrator')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        })->middleware(['auth:administrator'])->name('dashboard');

        Route::prefix('daily_report')->name('daily_report.')->group(function(){
            Route::get('/', [AdministratorDailyReportController::class, 'index'])->name('index');
            Route::get('/weekly_templete', [AdministratorDailyReportController::class, 'weekly_templete'])->name('weekly_templete');
            Route::post('/show', [AdministratorDailyReportController::class, 'show'])->name('show');
        })->middleware(['auth:administrator'])->name('dashboard');
    });

    require __DIR__.'/administrator/auth.php';
});
