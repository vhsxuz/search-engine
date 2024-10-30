<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-form', function () {
    return view('upload');
});

Route::get('/landing', function () {
    return view('landing');
});
Route::post('/upload', [FileController::class, 'store']);
