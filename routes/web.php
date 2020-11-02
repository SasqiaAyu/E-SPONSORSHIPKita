<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

// Route::get('/coba/email', 'Auth\LoginController@exampleMail');
// Route::get('/coba/email', function(){
//     return view('email.notificationEmail');
// });


Route::middleware(['web'])->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('landing_page');

     Route::get('/coba', function () {
        return view('coba');
    })->name('page_coba');

     Route::get('/default', function () {
        return view('frontdefault');
    })->name('frontdefault');


    Route::get('/verify', function () {
        return view('auth/verify');
    })->name('verify');
    Route::get('/verifyCompany/{data}',"UploudBuktiController@edit")
        ->name('verifyCompany');
    Route::put('/verifyCompany/{id}',"UploudBuktiController@update")
        ->name('verifyCompanyUploud');
});

Route::middleware(['web','auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pengajuanProposal', 'StudentController@pengajuanProposal')->name('pengajuanProposal');
    Route::resource('profile','ProfileController',
        ['parameters' => ['profile' => 'user']]);
    Route::resource('testimoni','TestimoniController',
        ['testimonies' => ['testimoni' => 'data']]);
});
Route::middleware(['web','auth','role:sa'])->group(function () {
    Route::resource('managementUser/student','ManagementUser\StudentController',
        ['parameters' => ['student' => 'user'], 'as' => 'management']);
    Route::resource('managementUser/company','ManagementUser\CompanyController',
        ['parameters' => ['company' => 'user'], 'as' => 'management']);
    Route::resource('approvalUser/student','ApprovalUser\StudentController',
        ['parameters' => ['student' => 'user'], 'as' => 'approval']);
    Route::resource('approvalUser/company','ApprovalUser\CompanyController',
        ['parameters' => ['company' => 'user'], 'as' => 'approval']);
    Route::resource('parameter','ParameterController',
        ['parameters' => ['parameter' => 'data']]);
    Route::resource('category','CategoryController',
        ['categorys' => ['category' => 'data']]);
    Route::resource('faculty','FacultyController',
        ['facultys' => ['faculty' => 'data']]);
    Route::resource('major','MajorController',
        ['majors' => ['major' => 'data']]);

});

Route::get('/foto','ProfileController@foto');

Route::post('/back','StudentController@back');
Route::post('/forward','StudentController@forward');
Route::post('/cari','StudentController@cari');
Route::post('/kategori','StudentController@kategori');
Route::post('/profilePerusahaan','StudentController@profilePerusahaan');
Route::post('/pengajuan','StudentController@pengajuan')->name('pengajuan');
Route::post('/approveProposal','ProposalController@approveProposal');
Route::post('/rejectProposal','ProposalController@rejectProposal');
Route::post('/batalProposal','ProposalController@batalProposal');
