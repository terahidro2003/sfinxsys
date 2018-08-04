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

Route::get('/signup', function(){
	//$dancers = DB::table('dancers_requests')->get();
	//return $dancers;
	return view('dancers_requests', ['success' => false]);
})->name('signup');
Route::post('signup/create_request', 'SignupRequestsController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('view_requests', 'SignupRequestsController@index')->name('signup_requests');
Route::post('view_requests', 'SignupRequestsController@search');
Route::post('dancers/add', 'DancersController@index');
Route::post('dancers/add_dancer', 'DancersController@store');
Route::any('dancers/update/{dancer_id}', 'DancersController@update')->name('update_member');


Route::get('dancers/add', 'DancersController@index');
Route::get('dancers/groups', 'GroupsController@index')->name('groups');
Route::get('dancers/groups/add', 'GroupsController@show_store_view')->name('group_add');
Route::post('dancers/groups/add', 'GroupsController@store');
Route::get('dancers/groups/members/{group_name}', 'GroupsController@show')->name('view_group_members');
/*
Route::get('dancers/groups/edit/{group_name}', 'GroupsController@show4edit')->name('edit_group');
Route::post('dancers/groups/edit/{group_name}', 'GroupsController@update')->name('edit_group_posted');
*/
Route::any('dancers/groups/edit/{group_id}', 'GroupsController@update')->name('edit_group');

Route::get('timetables', 'TimetableController@index')->name('timetables');
Route::get('timetable/{group_id}', 'TimetableController@show')->name('group_timetable');
Route::any('timetable/edit/{id}', 'TimetableController@update')->name('edit_timetable');
Route::any('timetable/create/{group_id}', 'TimetableController@store')->name('create_timetable');
Route::any('timetable/view', 'TimetableController@show')->name('show_timetable');
Route::any('groups/timetable/{group_id}', 'TimetableController@show_group_timetable')->name('show_current_group_timetable');

Route::any('payments/pay/{dancer_id}', 'PaymentsController@store')->name('member.paid');

Route::any('app/rfid_check', 'RFIDController@rfid_check');
Route::any('app/new_rfid', 'RFIDController@store');
Route::any('app/get_last_rfid', 'RFIDController@get_last_rfid');

Route::any('test', 'TimetableController@singular_trainings');
Route::get('statistics', 'statistics@index')->name('statistics_index');