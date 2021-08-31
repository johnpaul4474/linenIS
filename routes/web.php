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

Route::get('/', 'Auth\LoginCtr@index')->name('login');
Route::any('/login', 'Auth\LoginCtr@login');
Route::get('/test', 'TestCtr@test');
Route::get('/logout', 'Auth\LoginCtr@logout')->name("Logout");
Route::post('/logout', 'Auth\LoginCtr@logout')->name("Logout");


Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', 'HomeController@index')->name('home');

    //WEBMASTER
    Route::group(['middleware' => 'WEBMASTER'], function () {
        Route::get('/admin/monitoring', 'AdminCtr@monitoring')->name('Monitoring');
        Route::get('/adduser', 'UserCtr@index')->name('Add User');
        Route::get('/adduser/pro1/{id}', 'UserCtr@adduser1')->name('Search User');
        Route::post('/adduser/pro2/save', 'UserCtr@adduser2');
        Route::get('/userlist', 'UserCtr@userlist')->name('User List');
        Route::get('/edituser/{id}', 'UserCtr@edituser')->name('Edit User');
        Route::post('/edituser/save', 'UserCtr@editusersave');
        Route::get('/deleteuser/{id}', 'UserCtr@deleteuser');
        Route::get('/actlog', 'MaintenanceCtr@actlog')->name('Activity Log');
    });

    //LINEN ADMIN
    Route::group(['middleware' => 'LinenAdminMDW'], function () {
    
        //MAINTENANCE
        
});

Route::get('/maintenance/staff', 'MaintenanceCtr@staffmaintenance')->name('Staff Maintenance');
        Route::get('/addstaff/{id}', 'MaintenanceCtr@addstaff')->name('Add Staff');
        Route::get('/removestaff/{id}', 'MaintenanceCtr@removestaff')->name('Remove Staff');

        Route::get('/maintenance/report', 'MaintenanceCtr@report')->name('Report Generation');

        Route::get('/maintenance/database', 'MaintenanceCtr@index')->name('Maintenance Index');
        Route::get('/maintenanceedit/stockroom', 'MaintenanceCtr@indexeditstockroom')->name('Edit Stock Room');
        Route::get('/maintenanceedit/storage', 'MaintenanceCtr@indexeditstorage')->name('Edit Storage');
        Route::get('/maintenanceedit/rawmats', 'MaintenanceCtr@indexeditrawmats')->name('Edit Raw Mats');
        Route::get('/maintenanceedit/finishmats', 'MaintenanceCtr@indexeditfinishmats')->name('Edit Finish Mats');
        Route::get('/maintenanceedit/wardmats', 'MaintenanceCtr@indexeditwardmats')->name('Edit Ward Mats');
        Route::post('/maintenanceedit/changeStat', 'MaintenanceCtr@updateStat')->name('Edit Ward Mats');
        Route::get('/maintenanceedit/price', 'MaintenanceCtr@indexeditprice')->name('Edit Price');


        Route::get('/edit/stockroom/{id}', 'MaintenanceCtr@stockroomedit')->name('Edit Stock Room');
        Route::post('/edit/stockroomsave', 'MaintenanceCtr@stockroomeditsave');


        Route::get('/edit/storage/{id}', 'MaintenanceCtr@storageedit')->name('Edit Storage');
        Route::post('/edit/storagesave', 'MaintenanceCtr@storageeditsave');
        Route::get('/move/storage/{id}', 'MaintenanceCtr@movestorage')->name('Move Storage');
        Route::post('/move/storagesave', 'MaintenanceCtr@movestoragesave');
        

        
        Route::get('/edit/FinishMats/{id}', 'MaintenanceCtr@finishedit')->name('Finish Mats Edit');
        Route::post('/edit/FinishMatssave', 'MaintenanceCtr@finisheditsave');
        Route::get('/move/FinishMats/{id}', 'MaintenanceCtr@finishmove')->name('Finish Mats Move');
        Route::post('/move/FinishMatssave', 'MaintenanceCtr@finishmovesave');


        Route::get('/edit/RawMats/{id}', 'MaintenanceCtr@rawedit')->name('Raw Mats Edit');
        Route::post('/edit/RawMatssave', 'MaintenanceCtr@raweditsave');
        Route::get('/move/RawMats/{id}', 'MaintenanceCtr@rawmove')->name('Raw Mats Move');
        Route::post('/move/RawMatssave', 'MaintenanceCtr@rawmovesave');


       Route::get('/edit/wardmats/{id}', 'MaintenanceCtr@wardmatsedit')->name('Edit Ward Materials');
       Route::post('/edit/wardmatssave', 'MaintenanceCtr@wardmatseditsave');
       Route::get('/move/wardmats/{id}', 'MaintenanceCtr@wardmatsmove')->name('Move Ward Materials');
       Route::post('/move/wardmatssave', 'MaintenanceCtr@wardmatsmovesave');


        Route::get('/price/raw/{id}', 'MaintenanceCtr@priceraw')->name('Change Price Raw Mats');
        Route::get('/price/finish/{id}', 'MaintenanceCtr@pricefinish')->name('Change Price Finish Products');
        Route::get('/price/wardmats/{id}', 'MaintenanceCtr@priceward')->name('Change Price Ward Products');

        
        Route::post('/pricesave/raw/save', 'MaintenanceCtr@pricerawsave');
        Route::post('/pricesave/finish/save', 'MaintenanceCtr@pricefinishsave');
        Route::post('/pricesave/wardmats/save', 'MaintenanceCtr@pricewardsave');
    });

    //LINEN STAFF
        Route::get('/add/ward', 'LinenWardCtr@addward')->name('Add Ward');
        Route::post('/add/ward/save', 'LinenWardCtr@addwardsave')->name('Add Ward');


        Route::get('/add/raw', 'RawMatsCtr@addrawmat')->name('Add Raw Mats');
        Route::post('/add/raw/save', 'RawMatsCtr@addrawmatsave');


        Route::get('/add/storage', 'StorageCtr@addstorage')->name('Add Storage');
        Route::post('/add/storage/save', 'StorageCtr@addstoragesave');
        

        Route::get('/add/finish', 'FinishMatsCtr@addfinishmat')->name('Add Finish Mats');
        Route::post('/add/finish/save', 'FinishMatsCtr@addfinishmatsave');


        Route::get('/add/stockroom', 'StockroomCtr@addstockroom')->name('Add Stock Room');
        Route::post('/add/stockroom/save', 'StockroomCtr@addstockroomsave');

        Route::get('/ward/list', 'LinenWardCtr@wardlist')->name('Ward List');
        Route::get('/ward/{id}', 'LinenWardCtr@perward')->name('Ward Details');

        Route::get('/add/office', 'LinenOfficeCtr@addoffice')->name('Add Office');
        Route::post('/add/office/save', 'LinenOfficeCtr@addofficesave')->name('Add Office');


        Route::get('/release/{id}', 'LinenWardCtr@release')->name('Release Products To Ward');
        Route::get('/getStorage/{id}', 'LinenWardCtr@getStorage');
        Route::get('/getToIssue/{id}', 'LinenWardCtr@getToIssue');
        Route::get('/getToIssueDetails/{id}', 'LinenWardCtr@getToIssueDetails');
        Route::get('/dropdownlist', 'LinenWardCtr@storage');
        Route::get('/get-finishMats', 'LinenWardCtr@finishMats');
        Route::get('/get-matDetails', 'LinenWardCtr@matDetails');
        Route::get('/get-price', 'LinenWardCtr@price');
        Route::post('/release/save', 'LinenWardCtr@releasesave');

        Route::get('/releaseo/{id}', 'LinenOfficeCtr@release')->name('Release Products To Office');
        Route::post('/releaseo/save', 'LinenOfficeCtr@releasesave');

        // Condemn from Ward
        Route::get('/getWardDetails/{id}', 'LinenWardCtr@getWardDetails');
        Route::get('/getDetails/{id}', 'LinenWardCtr@getWardDetails1');
        Route::get('/getTable/{id}', 'LinenWardCtr@getWardDetails1');
        Route::get('/release_con/{id}', 'LinenWardCtr@release_con')->name('Condemned Products To Ward');
        // Route::post('/release_con/save', 'LinenWardCtr@release_consave');
        Route::get('/condemn', 'LinenWardCtr@deductWardItem');
        Route::get('/UpIssuedWrdQty', 'LinenWardCtr@UpIssuedWrdQty');
        Route::get('/getDeductDetails/{id}', 'LinenWardCtr@getDeductDetails');

        //Condemn from Office
        Route::get('/release_cono/{id}', 'LinenOfficeCtr@release_cono')->name('Condemned Products To Office');
        Route::post('/release_cono/save', 'LinenOfficeCtr@release_conosave');
        Route::get('/getStorageOffice/{id}', 'LinenOfficeCtr@getStorageOffice');
        Route::get('/getToIssueOffice/{id}', 'LinenOfficeCtr@getToIssueOffice');
        Route::get('/getToIssueOfficeDetails/{id}', 'LinenofficeCtr@getToIssueOfficeDetails');

        Route::get('/UpIssuedOfficeQty', 'LinenOfficeCtr@UpIssuedOfficeQty');

    // REPORTS
        Route::get('/report/{id}', 'ReportsController@index')->name('Add Finish Mats');
        Route::get('/getOffWard/{id}', 'ReportsController@getOffWard')->name('Add Finish Mats');
    // LCS REPORT
        Route::get('/getAllDetails/{id}', 'ReportsController@getAllDetails')->name('Add Finish Mats');
        Route::get('/printlcs/{id}', 'ReportsController@printlcs')->name('Add Finish Mats');

    //CONDEMN REPORT
        Route::get('/getCondemnDetails/{id}', 'ReportsController@getCondemnDetails')->name('Add Finish Mats');
        Route::get('/printcondemn/{id}', 'ReportsController@printcondemn')->name('Add Finish Mats');

        Route::get('/print/lcs', 'ReportsController@lcs')->name('Add Finish Mats');
        Route::get('/print/ris', 'ReportsController@ris')->name('Add Finish Mats');
        Route::get('/print/condemn', 'ReportsController@condemn')->name('Add Finish Mats');

    Route::get('/view/raw', 'RawMatsCtr@index')->name('Raw Materials');
    Route::get('/view/finish', 'FinishMatsCtr@index')->name('Finish Mats');


    Route::get('/stockroom/list', 'StockroomCtr@stockroomlist')->name('Stock Room List');
    Route::get('/storage/list', 'StorageCtr@storagelist')->name('Storage List');
    Route::get('/storage/{id}', 'StorageCtr@perstorage');
