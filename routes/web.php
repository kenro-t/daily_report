<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DailyReportController;
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

// 日報
Route::middleware('auth')->group(function () {
    Route::get('/daily_report', [DailyReportController::class, 'index'])->name('daily_report.index');
    Route::get('/daily_report/create/{date}', [DailyReportController::class, 'create'])->name('daily_report.create');
    Route::post('/daily_report/store/{date}', [DailyReportController::class, 'store'])->name('daily_report.store');
    Route::get('/daily_report/edit/{daily_report_detail_id}', [DailyReportController::class, 'edit'])->name('daily_report.edit');
    Route::post('/daily_report/update/{daily_report_detail_id}', [DailyReportController::class, 'update'])->name('daily_report.update');
});

require __DIR__.'/auth.php';
