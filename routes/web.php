<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\QuizController;

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

Route::group(['middleware' => 'alreadyLoggedIn'], function() {
    Route::get('/', [CustomAuthController::class, 'login'])->name('login');
    Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login.user');
    
    Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
    Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register.user');
});

Route::group(['middleware' => 'isLoggedIn'], function() {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');

    Route::group(['prefix' => 'scores'], function(){
        Route::post('save', [QuizController::class, 'saveScores'])->name('scores.save');
        Route::post('list', [QuizController::class, 'listScores'])->name('scores.list');
    });
    
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
});


