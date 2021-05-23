<?php

use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $videos=Video::orderby('fechaSubida')
        ->join('users', 'videos.id_user', '=', 'users.id')
        ->select('videos.*', 'users.name')
        ->get();
    return view('welcome')->with('videos',$videos);


});



Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'], function () {})
    ->middleware('auth')
    ->name('home');
Route::get('/home/publicar', [App\Http\Controllers\PublicarController::class, 'index'])->name('publicar');
Route::get('/home/perfil', [App\Http\Controllers\UserController::class, 'index'])->name('perfil');
Route::get('/home/perfil/{id}', [App\Http\Controllers\UserController::class, 'viewuser'])->name('viewuser');
Route::get('/home/editarUsers/admin/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::get('/home/editarUsers/admin/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
Route::get('/home/editarUsers/admin', [App\Http\Controllers\UserController::class, 'admin'])->name('editarUsers');
Route::post('/home/publicar/create', [App\Http\Controllers\VideoController::class, 'createvideo'])->name('createvideo');
Route::get('/home/publicar/editarvideo/{id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('editarvideo');
Route::post('/home/video/editado', [App\Http\Controllers\VideoController::class, 'update'])->name('editado');;

Route::post('/home/buscar', [App\Http\Controllers\VideoController::class, 'buscar'])->name('buscar');
Route::get('/home/perfil/destroy/{id}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('destroy');
Route::get('/home', [App\Http\Controllers\VideoController::class, 'view']);
Route::get('/video/{id}',[App\Http\Controllers\VideoController::class, 'show'], function () {
    return view('video{id}');
})->name('video.id');




