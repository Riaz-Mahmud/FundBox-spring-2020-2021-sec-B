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
    return view('Home.index')
    ->with('title', 'Home');

});
Route::get('/events', function () {
    return view('Home.events')
            ->with('title', 'Events');
});

Route::get('/contact', function () {
    return view('Home.contact')
            ->with('title', 'Contact Us');
});
Route::get('/about', function () {
    return view('Home.about')
            ->with('title', 'About Us');
});
Route::get('/FAQ', function () {
    return view('Home.faq')
            ->with('title', 'FAQ');
});
Route::get('/Ourteam/Organization', function () {
    return view('Home.Organization')
            ->with('title', 'Organization');
});
Route::get('/Ourteam/Volunteers', function () {
    return view('Home.Volunteers')
            ->with('title', 'Volunteers');
});
Route::get('/SignIn', function () {
    return view('Home.SignIn')
            ->with('title', 'Account');
});
Route::get('/SignUp', function () {
    return view('Home.SignUp')
            ->with('title', 'Account');
});
// **************************ADMIN*******************************
Route::get('/test',function(){
    return view('Admin.Test')->with('title', 'TEST | Admin');
});

Route::get('/admin/dashboard', function () {
    return view('Admin.AdminHome')
            ->with('title', 'Home Admin')
            ->with('date', date('d-M-Y'));
});

Route::get('/admin/blockOrg',function(){
    return view('Admin.blockOrg')->with('title', 'Block Organisation | Admin');
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
Route::get('/admin/createOrgEvent', function () {
    return view('Admin.createOrgEvent')->with('title', 'Create Organisation Event | Admin');
});

Route::get('/admin/manageEvent', function () {
    return view('Admin.manageEvent')->with('title', 'Manage All Event | Admin');
});

Route::get('/admin/createOrg', function () {
    return view('Admin.createOrg')->with('title', 'Create Organisation | Admin');
});
Route::get('/admin/createVolunteerEvent', function () {
    return view('Admin.createVolunteerEvent')->with('title', 'Create Volunteer Event | Admin');
});

Route::get('/admin/manageVolEvent', function () {
    return view('Admin.manageVolEvent')->with('title', 'Manage Volunteer Event | Admin');
});
Route::get('/admin/transitionList', function () {
    return view('Admin.transitionList')->with('title', 'Transition List | Admin');
});
Route::get('/admin/volunteerList', function () {
    return view('Admin.volunteerList')->with('title', 'Volunteer List | Admin');
});
// **************************ORGANISATION*******************************


Route::get('/transitionList',function(){
    return view('Admin.transitionList')
    ->with('title', 'Transition List');
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

Route::get('/org/transEventList', function () {
    return view('Organization.TransitionEventList')
            ->with('title', 'Transition Event List| Organization');
});

Route::get('/org/transList', function () {
    return view('Organization.TransitionList')
            ->with('title', 'Transition List| Organization');
});

Route::get('/org/createVolunteerEvent', function () {
    return view('Organization.CreateVolunteerEvent')
            ->with('title', 'Create Volunteer Event | Organization');
});

Route::get('/org/manageVolunteerEvent', function () {
    return view('Organization.ManageVolunteerEvent')
            ->with('title', 'Manage Volunteer Event | Organization');
});

Route::get('/org/volunteerList', function () {
    return view('Organization.VolunteerList')
            ->with('title', 'Manage Volunteer Event | Organization');
});

Route::get('/org/manageAccount', function () {
    return view('Organization.ManageAccount')
            ->with('title', 'Manage Account | Organization');
});


//user route starting:

Route::get('/user/dashboard',function(){
    return view('User/Home') ->with('title', 'Home User');
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


//user route finishgit

//Sponsor route start

Route::get('/sp/dashboard', function () {
    return view('Sponsor.sponsorHome')
            ->with('title', 'Home | Sponsor')
            ->with('date', date('d-M-Y'));
});

Route::get('/sp/addAdvertise', function () {
    return view('Sponsor.addAdvertise')
            ->with('title', 'Advertise Add | Sponsor');
});

Route::get('/sp/allAdvertise', function () {
    return view('Sponsor.ListofAdvertise')
            ->with('title', 'All Advertise | Sponsor');
});
Route::get('/sp/payment', function () {
    return view('Sponsor.ListofAdvertise')
            ->with('title', 'Payment | Sponsor');
});
Route::get('/sp/transactionList', function () {
    return view('Sponsor.TransactionList')
            ->with('title', 'Transaction List | Sponsor');
});
Route::get('/sp/siteTraffic', function () {
    return view('Sponsor.SiteTraffic')
            ->with('title', 'Site Traffic | Sponsor');
});
Route::get('/sp/applyOrg', function () {
    return view('Sponsor.OrgList')
            ->with('title', 'Apply Org | Sponsor');
});
Route::get('/sp/sponsoredOrgList', function () {
    return view('Sponsor.SponsoredorgList')
            ->with('title', 'Sponsored Org List | Sponsor');
});
Route::get('/sp/pendingOrgList', function () {
    return view('Sponsor.PendingOrgList')
            ->with('title', 'Pending Org Request | Sponsor');
});
Route::get('/sp/updateSponsorship', function () {
    return view('Sponsor.UpdateSponsorship')
            ->with('title', 'Update | Sponsor');
});
Route::get('/sp/updateOrgSponsorship', function () {
    return view('Sponsor.UpdateOrgSponsorship')
            ->with('title', 'Update | Sponsor');
});
Route::get('/sp/allEvents', function () {
    return view('Sponsor.AllEvents')
            ->with('title', 'All Events | Sponsor');
});
Route::get('/sp/sponsoredEvents', function () {
    return view('Sponsor.SoponoredEvents')
            ->with('title', 'Sponsored Events | Sponsor');
});


//Sponsor route end