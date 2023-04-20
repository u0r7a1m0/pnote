<?php

// use App\Http\Controllers\UserController;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::resource('users', UserController::class); 

// Route::get('/', function () {
//     return view('top');
// });

// この行を追加
// Route::get('/', 'HomesController@top')->name('top');
// // ホーム画面(root)
// use App\Http\Controllers\HomesController;
// Route::get('/', [HomesController::class,'top']);


Route::get('/', function () {
    return view('welcome');
});
// ノート
use App\Http\Controllers\NoteController;
Route::resource('notes', NoteController::class); 

/**
* 「ログイン機能」インストールで追加されています 
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';