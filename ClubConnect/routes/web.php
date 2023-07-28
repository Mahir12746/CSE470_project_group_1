<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TicketController;

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

Route::get('/print_pdf/{id}',[ClubController::class,'print_pdf']);

Route::get('/report_generate',[ClubController::class,'report_generate']);

Route::get('/create_match', [AdminController::class, 'create_match_page'])->name('admin.create_match_page');

Route::post('/store_match', [AdminController::class, 'store_match'])->name('admin.store_match');

Route::get('/matches', [AdminController::class, 'view_matches'])->name('admin.view_matches');

Route::get('/request_match_page',[ClubController::class,'request_match_page']);

Route::post('/send_match_request', [ClubController::class, 'send_match_request'])->name('club.send_match_request');

Route::get('/view_match_requests', [AdminController::class, 'view_match_requests'])->name('admin.view_match_requests');

Route::post('/approve_match_request/{id}', [AdminController::class, 'approve_match_request'])->name('admin.approve_match_request');

Route::post('/decline_match_request/{id}', [AdminController::class, 'decline_match_request'])->name('admin.decline_match_request');






Route::get('/search',[HomeController::class, 'searchplayer']);


Route::get('/email_sys',[AdminController::class,'email_sys']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);

Route::post('/send_fan_email/{id}',[AdminController::class,'send_fan_email']);