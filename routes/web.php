<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/custom-login', 'CustomLoginController@custom_login')->name('custom.login');
Route::post('/custom-reg', 'CustomLoginController@custom_reg')->name('custom.reg');


Route::prefix('admin')->group(function (){
            Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
            Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        
            Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        });


Route::group(['middleware' => ['auth:admin']], function() {
            Route::prefix('admin')->group(function() {

            Route::get('/', 'AdminController@index')->name('admin.dashbord');

            Route::get('admin-profile', 'AdminController@ShowProfile')->name('admin.profile');
            Route::post('admin-profile-update', 'AdminController@admin_profile_update')->name('admin.update.profile');

//Change Password
            
            Route::get('/change-password', 'AdminController@change_password')->name('admin.change.pass');
            Route::post('/change-password-save', 'AdminController@change_password_save')->name('admin.pass.update');

//General Settings

            Route::get('/general-settings', 'GeneralSettingController@g_settings')->name('admin.general.settings');
            Route::post('/general-settings', 'GeneralSettingController@store_g_settings')->name('admin.store.general.settings'); 

//Email Settings

            Route::get('/Email-settings', 'SendEmailController@email_settings')->name('admin.Email.settings');
            Route::post('/Send-Email', 'SendEmailController@send_email')->name('admin.send.email'); 

 //Add Package

            Route::get('/add-package', 'ManagementController@add_package')->name('admin.create.package');
            Route::post('/store-package', 'ManagementController@store_package')->name('admin.store.package'); 
            Route::get('/all-package', 'ManagementController@all_package')->name('admin.all.package');
            Route::post('/package-delete', 'ManagementController@package_delete')->name('admin.package.delete');
    
    

 
            
                });
            });

//User.......

Route::group(['middleware' => ['auth']], function() {
        Route::group(['prefix' => 'home'], function (){
            Route::get('/', 'HomeController@index')->name('home');
           
            Route::get('user-dashboard', 'UserController@user_dashboard')->name('user.dashboard');

                
            });
        });
