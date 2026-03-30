<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\PublicPageController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\CardController;
use App\Http\Controllers\Web\StepsController;


Route::get('/', function ():mixed {
    return redirect('/admin');
});

// Authentication routes
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('pages', PageController::class);
    Route::resource('cards', CardController::class);
    Route::resource('steps', StepsController::class);

});

/*Route::get('/{slug}', [PublicPageController::class, 'show'])->name('pages.show')
    ->name('public.page')
    ->where('slug', '^(?!admin|login|users|pages|services).*$');*/



