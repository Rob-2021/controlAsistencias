<?php

use App\Http\Controllers\AsistenciaAdministrativosController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PostPublicController;

// Route::redirect('/', 'posts')->name('home');

// Route::get('/posts', [PostPublicController::class, 'index'])->name('posts.index');
// Route::get('/posts/{post}', [PostPublicController::class, 'show'])->name('posts.show');

Route::get('/asistencia', [AsistenciaAdministrativosController::class, 'index'])->name('asistencia.index');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
