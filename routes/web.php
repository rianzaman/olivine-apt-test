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
/*
|--------------------------------------------------------------------------
| Common routes starts here
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
	return view('auth.login');
})->middleware("guest")->name('index');

Auth::routes();

Route::get('email/verification/{user}/{token}','VerifyUserController')->name('verify.user');

/*
|--------------------------------------------------------------------------
| Common routes ends here
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Frontend routes starts here
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Frontend routes ends here
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Backend routes starts here
|--------------------------------------------------------------------------
*/
// To do list routes starts from here
Route::group(['namespace' => 'Admin', 'middleware' => ['auth','verified_user']], function(){
	Route::get('to-dos','ToDoController@index')->name('to-dos.index');
	Route::post('to-dos/store','ToDoController@store')->name('to-dos.store');
	Route::get('to-dos/edit/{to_do:id}','ToDoController@edit')->name('to-dos.edit');
	Route::patch('to-dos/update/{to_do:id}','ToDoController@update')->name('to-dos.update');
	Route::delete('to-dos/destroy/{to_do:id}','ToDoController@destroy')->name('to-dos.destroy');
	Route::patch('to-do/mark-complete/{to_do:id}','ToDoController@mark_complete')->name('mark.to-do.complete');
});

// To do list routes ends here

Route::group(['as' => 'admin.','prefix' => 'admin/','namespace' => 'Admin', 'middleware'=>['auth','verified_user']],
	function(){
		// Admin profile routes starts here
		Route::get('profile','AdminController@profile')->name('profile');
		Route::put('profile/update/{user}','AdminController@update_profile')->name('update.profile');
		// Admin profile routes ends here


	}
);

/*
|--------------------------------------------------------------------------
| Backend routes ends here
|--------------------------------------------------------------------------
*/