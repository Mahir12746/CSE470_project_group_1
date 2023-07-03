<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubController;

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

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/add_player_page',[AdminController::class,'add_player_page']);

route::post('/add_player_info',[AdminController::class,'add_player_info']);

Route::get('/track_performance_page', [AdminController::class, 'track_performance_page'])->name('track_performance_page');

Route::post('/update_performance/{id}', [AdminController::class, 'update_performance'])->name('update_performance');

route::get('/generate_rating_page',[AdminController::class,'generate_rating_page']);

route::post('/find_player_ranking',[AdminController::class,'find_player_ranking']);

Route::get('/my_club_page',[ClubController::class,'my_club_page']);

Route::get('/create_club_page',[ClubController::class,'create_club_page']);

Route::post('/create_club', [ClubController::class, 'create_club'])->name('create_club');

Route::get('/edit_club_page',[ClubController::class,'edit_club_page']);


