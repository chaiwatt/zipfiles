<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('downloadzip', [ZipController::class, 'DownloadZip'])->name('downloadzip'); 

