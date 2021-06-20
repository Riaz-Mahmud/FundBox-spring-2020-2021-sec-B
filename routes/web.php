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

Route::get('/admin/dashboard', function () {
    return view('Admin.AdminHome')
            ->with('title', 'Home Admin')
            ->with('date', date('d-M-Y'));
});

Route::get('/admin/createAdmin', function () {
    return view('Admin.createAdmin')->with('title', 'Create Admin | Admin');
});

Route::get('/admin/manageAdmin', function () {
    return view('Admin.ManageAdmin')->with('title', 'Create Admin | Admin');
});

Route::get('/admin/adminEvent', function () {
    return view('Admin.adminEvent')->with('title', 'Create Admin Event | Admin');
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

Route::get('/login', function () {
    return view('Signin')
                    ->with('id', 0)
                    ->with('title', 'Sign In');
});

Route::get('/org/dashboard', function () {
    return view('Organization.Home')
            ->with('title', 'Home Organization')
            ->with('date', date('d-M-Y'));
});

Route::get('/org/createEvent', function () {
    return view('Organization.CreateEvent')
            ->with('title', 'Create Event | Organization');
});

Route::get('/org/manageEvent', function () {
    return view('Organization.ManageEvent')
            ->with('title', 'Manage Event | Organization');
});


//user route starting:

Route::get('/user/dashboard',function(){
    return view('User/Home') ->with('title', 'Home User');
});

Route::get('/user/registration',function(){
    return view('User/Registration')->with('title', 'Registration');
});

Route::get('/user/review',function(){
    return view('User/Review')->with('title', 'Review');
});

Route::get('/user/organizationList',function(){
    return view('User/OrganizationList')->with('title', 'Organization List');
});

Route::get('/user/report',function(){
    return view('User/Report')->with('title', 'Report');
});

Route::get('/user/donation',function(){
    return view('User/Donation')->with('title', 'Donation');
});

Route::get('/user/transitionDetails',function(){
    return view('User/TransitionDetails')->with('title', 'Transition Details');
});

Route::get('/user/organizationDetails',function(){
    return view('User/OrganizationDetails')->with('title', 'Organization Details');
});

Route::get('/user/categoryList',function(){
    return view('User/CategoryList')->with('title', 'Category List');
});

Route::get('/user/events',function(){
    return view('User/Events')->with('title', 'Events');
});

Route::get('/user/volunteerEventList',function(){
    return view('User/VolunteerEventList')->with('title', 'Volunteer Event List');
});


Route::get('/user/applyVolunteerEvent',function(){
    return view('User/ApplyVolunteerEvent')->with('title', 'Apply for Volunteer Event');
});

Route::get('/user/yourAppliedVolunteerEvents',function(){
    return view('User/YourAppliedVolunteerEvents')->with('title', 'Your Applied Volunteer Events');
});


//user route finish

