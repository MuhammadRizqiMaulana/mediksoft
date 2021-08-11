<?php

use Illuminate\Support\Facades\Route;

/* ----- AksesPengguna -----*/
/* ----- AksesPengguna -----*/

/* ----- Setup -----*/
use App\Http\Controllers\Setup\Pengirim_FaskesController;
/* ----- Setup -----*/

/* ----- RekamMedis -----*/
/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
/* ----- RawatJalan -----*/


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
    return view('AksesPengguna.Content.index');
});

/* ----- AksesPengguna -----*/
Route::get('/AksesPengguna', function () {
    return view('AksesPengguna.Content.index');
});

/* ----- AksesPengguna -----*/

/* ----- Setup -----*/
Route::get('/Setup', function () {
    return view('Setup.Content.index');
});
Route::get('/Pengirim_Faskes', [Pengirim_FaskesController::class, 'index']);
/* ----- Setup -----*/

/* ----- RekamMedis -----*/
Route::get('/RekamMedis', function () {
    return view('RekamMedis.Content.index');
});
/* ----- RekamMedis -----*/

/* ----- RawatJalan -----*/
Route::get('/RawatJalan', function () {
    return view('RawatJalan.Content.index');
});
/* ----- RawatJalan -----*/
