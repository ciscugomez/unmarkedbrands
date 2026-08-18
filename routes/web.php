<?php

use App\Http\Livewire\Home;
use Illuminate\Http\Request;
use App\Http\Livewire\User\Profile;
use App\Http\Livewire\Authors\Detail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Publications\Form;
use App\Http\Livewire\Authors\AuthorList;
use App\Http\Livewire\Categories\Category;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Publications\Publication;
use App\Http\Livewire\Publications\PublicationList;

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

Route::get('/', Home::class)->name('home');
Route::get('/proyecto/{account}/{slug}',        Publication::class)->name('record')->middleware('redirection');
Route::get('/categoria/{key}',                  Category::class)->name('category-publication');

Route::prefix('proyectos')->group(function () {
    Route::get('/crear',                    Form::class)->name('publication.create')->middleware('verified');
    Route::get('/editar/{agency}/{slug}',   Form::class)->name('publication.edit')->middleware('verified');

    Route::get('/consulta',     function (Request $request) {
        return view('publications.query', [
            'query' => $request->get('query')
        ]);
    })->name('query');

    Route::get('/{type}',                   PublicationList::class)->name('publications.list');

})->middleware('auth');

Route::get('autores', AuthorList::class)->name('authors.index');

Route::get('autor/{author}', Detail::class)->name('authors.show')->middleware('redirection');

Route::view('/aviso-legal',             'legal')->name('legal');
Route::view('/politica-de-privacidad',  'privacity')->name('privacity');
Route::view('/politica-de-cookies',     'cookies')->name('cookies');
Route::view('/quienes-somos',           'about-us')->name('about-us');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/perfil/{nickname}',    Profile::class)->name('profile.edit');
    Route::delete('/perfil',            [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('auth/{socialLoginType}',            [SocialLoginController::class, 'redirect'])->name('social-login.redirect');
// Route::get('auth/{socialLoginType}/callback',   [SocialLoginController::class, 'callback'])->name('social-login.callback');

require __DIR__ . '/auth.php';
