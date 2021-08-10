<?php

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
    return view('AksesPengguna.Content.index');
});

Route::get('/AksesPengguna', function () {
    return view('AksesPengguna.Content.index');
});
Route::get('/Setup', function () {
    return view('Setup.Content.index');
});
Route::get('/RekamMedis', function () {
    return view('RekamMedis.Content.index');
});
Route::get('/RawatJalan', function () {
    return view('RawatJalan.Content.index');
});
