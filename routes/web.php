<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('cover'); });
Route::get('/peta', function () { return view('peta'); });
Route::get('/materi/caritahu', function () { return view('materi.caritahu'); });
Route::get('/materi/budaya', function () { return view('materi.budaya'); });
Route::get('/materi/sains', function () { return view('materi.sains'); });
Route::get('/materi/engineering', function () { return view('materi.engineering'); });