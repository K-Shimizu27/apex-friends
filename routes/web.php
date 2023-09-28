<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\RecruitsController;
use App\Http\Controllers\GameProfilesController;
use App\Http\Controllers\MessagesController;

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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','profileflag'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

//ログイン時のみのアクセス
Route::group(['middleware' => ['auth']], function () {
    Route::get('recruits/search', [RecruitsController::class, 'search'])->name('recruits.search')->middleware(['profileflag']);
    
    Route::resource('users', UsersController::class, ['only' => ['index','show','edit']])->middleware(['profileflag']);
    Route::resource('recruits', RecruitsController::class, ['only' => ['index','store','destroy','create','show']])->middleware(['profileflag']);
    Route::resource('gameprofiles',GameProfilesController::class, ['only' => ['index','store','show','edit','create']]);
    Route::resource('messages',MessagesController::class,['only' => ['index','store','destroy','show']])->middleware(['profileflag']);
    
    Route::group(['prefix' => 'users/{user}'], function () {
        Route::get('gameprofile', [UsersController::class, 'gameprofile'])->name('users.gameprofile');
        Route::get('info', [UsersController::class, 'info'])->name('users.info')->middleware(['profileflag']);
        Route::get('recruit', [UsersController::class, 'recruit'])->name('users.recruit')->middleware(['profileflag']);
        Route::post('edit',[UsersController::class,"update"])->name('users.update')->middleware(['profileflag']);
    });

    Route::post('gameprofiles/{gameprofile}/edit',[GameProfilesController::class,"update"])->name('gameprofiles.update');
    Route::post('messages/{message}',[MessagesController::class,"store"])->name('messages.store')->middleware(['profileflag']);
    // Route::group(['prefix' => 'recruits/{id}'], function () {
        
    // });
}); 