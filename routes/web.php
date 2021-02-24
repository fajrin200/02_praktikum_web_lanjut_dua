<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
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
// Route::get('/about', [AboutController::class, 'about']);
// Route::get('/articles/{id}', [ArticleController::class, 'articles']);

//halaman 1 menampilkan halaman awal website
Route::get('/', [HomeController::class, 'index']);

//halaman 2  menampilkan daftar product ( route prefix)
Route::prefix('category')->group(function () {
    Route::get('/product', [ProductController::class, 'daftarproduct']);
});

//halaman 3 menampilkan Daftar berita (route param)
Route::get('/news', [NewsController::class, 'news']);
Route::get('/news/{string}', [NewsController::class, 'newsString']);

// halaman 4 Program menampilkan Daftar Program (route prefix)
Route::prefix('program')->group(function () {
    Route::get('/list', [ProgramController::class, 'daftarprogram']);
});

// hakaman 5 About Us menampilkan About Us (route biasa)
Route::get('/about-us', function(){
    return redirect ('https://www.educastudio.com/about-us');
});

// halaman 6 Contact Us menampilkan Contact Us (route resource only)
Route::resource('contact', ContactController::class)->only ([
    'index'
]);

