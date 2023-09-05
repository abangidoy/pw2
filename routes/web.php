<?php
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HistoryCastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\isLogin;

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

// Route::get('/master', function () {
//    return view('layout.master');
// });

Route::get('/', function () {
    return view('login');
});
Route::view('/home', 'home')->name('home')->Middleware('isLogin');

Route::get('/from_input', [PagesController::class, 'FromInput'])->name('from_input')->Middleware('isLogin');
Route::match(['get', 'post'], '/welcome', [PagesController::class, 'welcome'])->name('pages.welcome')->middleware('isLogin');

Route::get('/datatable', function () {
    return view('datatable.index');
});

Auth::routes();

Route::group([], function () {
    Route::get('/cast', [CastController::class, 'index'])->Middleware('isLogin');
    // Tambahkan rute-rute lain yang berkaitan dengan CastController di sini
    Route::get('/film', [FilmController::class, 'index'])->name('film.index')->Middleware('isLogin');
    Route::get('/akun', [ResetPasswordController::class, 'reset-password-from'])->name('akun.reset-password-from')->Middleware('isLogin');
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index')->Middleware('isLogin');
});

// CRUD CAST
Route::get('/cast/create', [CastController::class, 'create']);
Route::post('/cast', [CastController::class, 'store']); // Ubah menjadi Route::post
Route::get('/cast/{id}/edit', [CastController::class, 'edit']); // Menggunakan {id} sebagai parameter
Route::put('/cast/{id}', [CastController::class, 'update']); // Menggunakan metode PUT untuk update
Route::delete('/cast/{id}', [CastController::class, 'destroy']);

// route login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');


//rute register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//route logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//rute history
Route::get('akun/history_cast', [HistoryCastController::class, 'index'])->name('akun.history_cast.index')->middleware('isLogin');
//reset akun
Route::get('/reset/{username}', [ResetPasswordController::class, 'showResetForm'])->name('reset.password.form.show');
Route::post('/password/reset', [ResetPasswordController::class,'resetPassword'])->name('password.reset');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset.password.form.show');

//rute film
Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('/film', [FilmController::class, 'store'])->name('film.store');
Route::get('/film/{film}/edit', [FilmController::class, 'edit'])->name('film.edit');
Route::delete('/film/{film}', [FilmController::class, 'destroy'])->name('film.destroy');
Route::put('/film/{film}', [FilmController::class, 'update'])->name('film.update');

//rute genre
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class,'store'])->name('genre.store');
Route::get('/genre/{id}', [GenreController::class,'show'])->name('genre.show');
Route::get('/genre/{id}/edit',[GenreController::class,'edit'])->name('genre.edit');
Route::put('/genre/{id}', [GenreController::class,'update'])->name('genre.update');
Route::delete('/genre/{id}', [GenreController::class,'destroy'])->name('genre.destroy');