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
// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);
Route::group(['middleware' => ['Login']], function () {
Route::get('/download-application-pdf/{id}','HomeController@pdfView');
Route::get('/download/receipt-pdf/{id}','HomeController@pdf');
Route::get('/login','LoginController@login')->name('login');
Route::post('/login','LoginController@postLogin');
Route::get('/register','LoginController@register')->name('register');
Route::post('/register','LoginController@postRegister');
});

Route::post('/logout','LoginController@logOut')->name('logout');
Route::get('/verify', 'HomeController@verify');
Route::post('/verify','LoginController@postVerify');
Route::get('/resendOtp','LoginController@resendOtp');

Route::group(['middleware' => ['Cuser']], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/application','ApplicationController@submit');
Route::get('/edit-application/{id}','ApplicationController@editApplication');
Route::post('/edit-application/{id}','ApplicationController@postEdit');

Route::get('/make-payment','PaymentController@makePayment');
Route::post('/make-payment','PaymentController@paymentConfirm');
Route::post('/payment/{id}','PaymentController@payment')->name('payment');
Route::get('/payment-history', function () {
    return view('history');
});

});

Route::get('/admin/login','DashboardController@adminLogin')->name('adminlogin');
Route::post('/admin/login','DashboardController@authenticateAdmin');


Route::group(['middleware' => ['Admin']], function () {
    
  
   Route::get('/dashboard','DashboardController@index');
   
   Route::get('/manage-courses','CourseController@index');
   Route::post('/create-course','CourseController@create');
   Route::post('/edit-course/{id}','CourseController@edit');
   Route::delete('/delete-course/{id}', 'CourseController@destroy')->name('course.destroy');
   
   Route::get('/manage-departments','DepartmentController@index');
   Route::post('/create-department','DepartmentController@create');
   Route::post('/edit-department/{id}','DepartmentController@edit');
   Route::delete('/delete-department/{id}', 'DepartmentController@destroy')->name('department.destroy');

   Route::get('/manage-categories','FeeController@index');
   Route::post('/create-category','FeeController@create');
   Route::post('/edit-category/{id}','FeeController@edit');

   Route::get('/manage-fees','FeesController@index');
   Route::post('/create-fee','FeesController@create');
   Route::post('/edit-fee/{id}','FeesController@edit');
 

   Route::get('/manage-installments','InstallmentController@index');
   Route::post('/create-installment','InstallmentController@create');
   Route::post('/edit-installment/{id}','InstallmentController@edit');

   Route::get('/admin/applications','AdminController@viewApplications');
   Route::get('/admin/application/{id}','AdminController@viewSingleApplication');
   

   Route::get('/admin/application-pdf/{id}','AdminController@pdfView');

   Route::post('/admin/update-application/{id}','AdminController@updateApplication');

   Route::get('/admin/approved-applications','AdminController@approvedApplications');
   Route::get('/admin/rejected-applications','AdminController@rejectedApplications');

   Route::get('/admin/payments', function () {
    return view('dashboard.payments');
   });

   Route::post('/admin/update-payment','AdminController@updatePayment');

});



Route::get('/moderator/login','ModeratorController@adminLogin')->name('moderatorlogin');
Route::post('/moderator/login','ModeratorController@authenticateAdmin');

Route::group(['middleware' => ['Moderator']], function () {
   Route::get('/moderator/dashboard','ModeratorController@index');
   Route::get('/moderator/applications','ModeratorController@viewApplications');
   Route::get('/moderator/application/{id}','ModeratorController@viewSingleApplication');

   Route::get('/moderator/approved-applications','AdminController@approvedApplications');
   Route::get('/moderator/rejected-applications','AdminController@rejectedApplications');

   Route::post('/moderator/update-application/{id}','ModeratorController@updateApplication');
   Route::get('/moderator/payments', function () {
    return view('principal.payments');
   });
   Route::post('/moderator/update-payment','ModeratorController@updatePayment');

});

