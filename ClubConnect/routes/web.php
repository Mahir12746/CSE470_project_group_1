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

Route::get('/show_player_page',[ClubController::class,'show_player_page']);

Route::get('/squad_page',[ClubController::class,'squad_page']);

Route::get('/sponsor_page',[AdminController::class,'sponsor_page']);

Route::post('/submitbid/{player}', [ClubController::class, 'submitbid'])->name('submitBid');

Route::get('/showPendingBids',[AdminController::class,'showPendingBids']);

Route::post('/acceptBid/{bid}', [AdminController::class, 'acceptBid'])->name('acceptBid');

Route::post('/declineBid/{bid}', [AdminController::class, 'declineBid'])->name('declineBid');

Route::get('/bid_status', [ClubController::class, 'bidStatus'])->name('bid_status')->middleware('auth');

<<<<<<< HEAD
Route::get('/print_pdf/{id}',[ClubController::class,'print_pdf']);

Route::get('/report_generate',[ClubController::class,'report_generate']);
=======
Route::get('/create_match', [AdminController::class, 'create_match_page'])->name('admin.create_match_page');

Route::post('/store_match', [AdminController::class, 'store_match'])->name('admin.store_match');

Route::get('/matches', [AdminController::class, 'view_matches'])->name('admin.view_matches');
>>>>>>> 1d69202f7b4c3a9d7a2cee4e6dddddd9a89142e5





