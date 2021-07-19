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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('pupils', 'PupilController');
Route::resource('parents', 'GuardianController');
Route::resource('busoperators', 'BusoperatorController');
Route::post('parents/{id}/link-parent-pupil', 'GuardianPupilController@storePupil')->name('link-parent-pupil');
Route::post('pupils/{id}/link-pupil-parent', 'GuardianPupilController@storeGuardian')->name('link-pupil-parent');
Route::get('parents/{id}/link-pupil', 'GuardianPupilController@showGuardian')->name('link-pupil');
Route::get('pupils/{id}/link-parent', 'GuardianPupilController@showPupil')->name('link-parent');
Route::delete('parents/{guardian_id}/remove-pupil/{pupil_id}', 'GuardianPupilController@destroyPupil')->name('remove-pupil');
Route::delete('pupils/{pupil_id}/remove-pupil/{guardian_id}', 'GuardianPupilController@destroyGuardian')->name('remove-parent');
Route::post('pupils/{id}/increment-grade','GradeController@incrementGrade')->name('increment-grade');
Route::post('pupils/{id}/decrement-grade', 'GradeController@decrementGrade')->name('decrement-grade');