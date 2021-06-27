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

Route::post('/SignIn','LoginController@Login');
Route::get('/SignIn','LoginController@LoginIndex');
Route::get('/logout','LoginController@logout');
Route::post('/SignUp','LoginController@CreateNewUser');

// **************************ADMIN*******************************

Route::group(['middleware'=>['sess']] , function(){

    Route::group(['middleware'=>['admin']] , function(){

        Route::get('/test',function(){
            return view('Admin.Test')->with('title', 'TEST | Admin');
        });

        Route::get('/admin/dashboard', function () {
            return view('Admin.AdminHome')
                    ->with('title', 'Home Admin')
                    ->with('date', date('d-M-Y'));
        });


        Route::get('/admin/createAdmin', function () {
            return view('Admin.createAdmin')->with('title', 'Create Admin | Admin');
        });
        Route::post('/admin/createAdmin','Admin\UserController@CreateAdmin');

        Route::get('/admin/manageAdmin','Admin\UserController@ManageAdmin');
        Route::post('/admin/manageAdmin/updateStatus', 'Admin\UserController@UpdateStatus');
        Route::post('/admin/manageAdmin/updateUserInfo', 'Admin\UserController@UpdateUserInfo');
        Route::post('/admin/manageAdmin/deleteAdmin', 'Admin\UserController@DeleteAdmin');
        Route::post('/admin/manageAdmin/makeSuperAdmin', 'Admin\UserController@MakeSuperAdmin');

        Route::get('/admin/createOrg','Admin\OrganizationController@ShowCreatePage');
        Route::post('/admin/createOrg','Admin\OrganizationController@CreateOrganisation');
        Route::get('/admin/manageOrg','Admin\OrganizationController@ManageOrg');
        Route::post('/admin/manageOrg/updateStatus', 'Admin\OrganizationController@UpdateStatus');
        Route::post('/admin/manageOrg/updateInfo', 'Admin\OrganizationController@UpdateInfo');
        Route::post('/admin/manageOrg/addOrgUser', 'Admin\OrganizationController@AddOrgUser');
        Route::post('/admin/manageOrg/delete', 'Admin\OrganizationController@Delete');
        Route::post('/admin/manageOrg/updateImage', 'Admin\OrganizationController@UpdateImage');

        Route::get('/admin/eventCategory','Admin\CategoryController@Index');
        Route::post('/admin/eventCategory','Admin\CategoryController@CreateCategory');
        Route::post('/admin/eventCategory/updateStatus','Admin\CategoryController@UpdateStatus');
        Route::post('/admin/eventCategory/delete','Admin\CategoryController@Delete');

        Route::get('/admin/createAdminEvent','Admin\EventController@Index');
        Route::post('/admin/createAdminEvent','Admin\EventController@CreateAdminEvent');
        Route::get('/admin/createOrgEvent','Admin\EventController@EventOrgIndex');
        Route::post('/admin/createOrgEvent','Admin\EventController@CreateOrgEvent');
        Route::get('/admin/createVolunteerEvent','Admin\EventController@VolunteerIndex');
        Route::post('/admin/createVolunteerEvent','Admin\EventController@CreateVolunteerIndex');


        Route::get('/admin/manageEvent', function () {
            return view('Admin.manageEvent')->with('title', 'Manage All Event | Admin');
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

    });
    // **************************ADMIN END*******************************

    // **************************ORGANISATION*******************************

    Route::group(['middleware'=>['org']] , function(){

            Route::get('/org/dashboard', function () {
              return view('Organization.Home')
                ->with('title', 'Home Organization')
                ->with('date', date('d-M-Y'));
            });
            Route::get('/org/manageEvent', function () {
                return view('Organization.ManageEvent')
                        ->with('title', 'Manage Event | Organization');
            });

            //*****************CREATE EVENTS******************* */
            Route::get('/org/createEvent', function () {
                return view('Organization.CreateEvent')
                        ->with('title', 'Create Event | Organization');
            });
            Route::Post('/org/createEvent', 'OrganizationHomeController@create');
            //*****************EVENT LIST******************* */
            Route::get('/org/EventList', 'OrganizationHomeController@index')->name('org.eventList');
            //*****************EDIT EVENTS******************* */
            Route::get('/org/edit/{id}', 'OrganizationHomeController@edit');
            Route::Post('/org/edit/{id}', 'OrganizationHomeController@update');
            //*****************DELETE EVENTS******************* */
            Route::get('/org/delete/{id}', 'OrganizationHomeController@delete');
            Route::get('/org/destroy/{id}', 'OrganizationHomeController@destroy');
            //*****************CREATE VOLUNTEER EVENTS******************* */
            Route::get('/org/createVolunteerEvent', function () {
                return view('Organization.CreateVolunteerEvent')
                        ->with('title', 'Create Volunteer Event | Organization');
            });
            Route::Post('/org/createVolunteerEvent', 'OrganizationHomeController@createVolunteerEvent');
            //*****************EDIT  Volunteer EVENTS******************* */
            Route::get('/org/ManageVolunteerEvent', 'OrganizationHomeController@indexVolunteer')->name('org.volunteereventList');
        });
    });

    // **************************ORGANISATION END*******************************

    // **************************SPONSOR START*******************************

    // **************************SPONSOR END*******************************

    // **************************USER START*******************************

    // **************************USER END*******************************


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
    return view('Sponsor.Payment')
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
Route::get('/sp/manageAccount', function () {
    return view('Sponsor.ManageAccount')
            ->with('title', 'Manage Account | Sponsor');
});


//Sponsor route end