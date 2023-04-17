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


use App\Http\Controllers\UserController;//9.43.x~
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
Route::get('/users/{user}', [UserController::class,'show'])->name('my_page');;
Route::get('/users/{user}/edit', [UserController::class,'edit']);
Route::patch('/users/{user}', [UserController::class,'update']);
Route::delete('/users/{user}', [UserController::class,'destroy']);


// Route::get('/', function () {
//     return view('top');
// });

// この行を追加
Route::get('/', 'HomesController@top')->name('top');

Route::get('/', function () {
    return view('welcome');
});
// ノート
use App\Http\Controllers\NoteController;
Route::get('/notes', [NoteController::class,'index']);
Route::get('/notes/new', [NoteController::class,'new']);
Route::post('/notes/new', [NoteController::class,'create']);
Route::get('/notes/{note}', [NoteController::class,'show']);
Route::get('/notes/{note}/edit', [NoteController::class,'edit']);
Route::patch('/notes/{note}', [NoteController::class,'update']);
Route::delete('/notes/{note}', [NoteController::class,'destroy']);

// ホーム画面(root)
use App\Http\Controllers\HomesController;
Route::get('/', [HomesController::class,'top']);

// use App\Models\Bookmark;
// use App\Http\Controllers\BookmarkController;


// use App\Models\Tag;
// use App\Http\Controllers\TagController;

// use App\Models\NoteTag;
// use App\Http\Controllers\NoteTagController;

/**
* 「ログイン機能」インストールで追加されています 
*/
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';