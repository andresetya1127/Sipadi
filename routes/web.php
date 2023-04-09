<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TampilProposalAjax;
use App\Http\Controllers\validasiAjax;
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
    $title = "SIPADI";
    $titleDas = true;
    return view('pages.index', compact('title'));
})->name('root');

// Auth
Route::controller(loginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware(['guest']);
    Route::get('/log_out', 'logout')->name('log_out')->middleware(['auth']);
    Route::post('actionLogin', 'actionLogin')->name('actionLogin')->middleware(['guest']);
});
//Dashboard
Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');

Route::controller(validasiAjax::class)->group(function () {
    Route::post('/validasiData', 'validasiData')->middleware(['auth', 'dosenMidle']);
    Route::get('/viewProposal', 'viewProposal')->middleware(['auth', 'dosenMidle']);
    Route::get('/proposal', 'proposal')->middleware(['auth', 'dosenMidle']);
    Route::get('/proposalForm', 'proposalForm')->middleware(['auth', 'dosenMidle']);
    Route::get('/laporanProposal', 'laporanProposal')->middleware(['auth', 'dosenMidle']);
    Route::get('/anggotaPenelitian', 'anggotaPenelitian')->middleware(['auth', 'dosenMidle']);
    Route::get('/downloadFile/{file}', 'downloadFile')->middleware(['auth', 'dosenMidle']);
});
