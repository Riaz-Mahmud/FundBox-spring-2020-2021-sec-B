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
    return view('welcome');
});

Route::get('/login', function () {
    return view('Signin')
                    ->with('id', 0)
                    ->with('title', 'Sign In');
});
Route::get('/createadmin', function () {
    echo "it works";
});

Route::get('/org/dashboard', function () {
    return view('Organization.Home')
            ->with('title', 'Home Organization')
            ->with('date', date('d-M-Y'));
});