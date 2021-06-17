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

Route::get('/createAdmin', function () {
    return view('Admin.createAdmin');
});

Route::get('/adminEvent', function () {
    return view('Admin.adminEvent');
});
Route::get('/orgEvent', function () {
    return view('Admin.createOrgEvent');
});

Route::get('/verifyEvent',function(){
    return view('Admin.verifyEvent');
});

Route::get('/blockOrg',function(){
    return view('Admin.blockOrg');
});
Route::get('/transitionList',function(){
    return view('Admin.transitionList');
});
