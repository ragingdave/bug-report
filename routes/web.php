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
    Storage::disk('s3')->put('test.txt', 'Hey look! a private bug!', 'private');

    return view('welcome', [
        'link' => Storage::disk('s3')->temporaryUrl('test.txt', now()->addHour()),
    ]);
});
