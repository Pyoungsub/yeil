<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;
use App\Http\Controllers\OauthController;
Route::get('/', Livewire\Home\Index::class)->name('home');
Route::get('/lessons/{lesson}', Livewire\Lessons::class)->name('lessons');
Route::get('lessons/{lesson}/{purpose}', Livewire\Purposes::class)->name('purposes');
Route::get('/intro', Livewire\Intro\Index::class)->name('intro');
Route::prefix('kakao')->group(function () {
    Route::get('/login', function (){
        return Socialite::driver('kakao')->redirect();
    })->name('kakao.login');
    Route::get('/oauth', [OauthController::class, 'kakao']);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
