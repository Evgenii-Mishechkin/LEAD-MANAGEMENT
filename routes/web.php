<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Главная страница
Route::get('/', function () {
    if (Auth::check()) {
        // Если пользователь авторизован, перенаправляем на страницу лидов
        return redirect()->route('lead.index');
    } else {
        // Если пользователь не авторизован, показываем форму обратной связи
        return view('lead.form');
    }
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

// Маршруты аутентификации с подтверждением email
Auth::routes(['verify' => true, 'reset' => true]);

// Профиль пользователя
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Маршрут для повторной отправки верификационного письма, доступный только авторизованным пользователям
Route::middleware('auth')->post('/profile/resend-verification', [ProfileController::class, 'resendVerification'])->name('profile.verification.resend');
// Для работы с лидами
Route::patch('/lead/update-status', [LeadController::class, 'updateStatus'])->middleware('auth')->name('lead.updateStatus');
Route::get('/lead/update-status', function () {
    return redirect()->route('lead.index');
});
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
Route::get('/lead', [LeadController::class, 'index'])->middleware(['auth', 'verified'])->name('lead.index');
Route::get('/dashboard', [LeadController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('leads', LeadController::class)->except(['create', 'store']);



/* require __DIR__.'/auth.php'; */

