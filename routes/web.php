<?php

Route::group(['middleware' => 'guest'], function ()
{
	// auth
	Route::get('/login', 'AuthController@indexLogin');

	Route::post('/login/log', 'AuthController@log');

	Route::get('/signup', 'AuthController@getSignup');

	Route::post('/signup/create', 'AuthController@postSignup');
	//
});

// 	home
Route::get('/', 'Web\HomeController@index');
//

//	fan clubs
Route::get('/fanclubs', 'Web\FanController@index');
//

//  our team
Route::get('/team', 'Web\TeamController@index');
//


Route::group(['middleware' => ['auth']], function()
{
	//groups
	Route::get('/groups/create', 'Web\GroupsController@create');

	Route::post('/groups/create/add', 'Web\GroupsController@store');

	Route::post('/groups/join/request/{group}', 'Web\GroupsController@joinRequest');

	Route::get('/group/{group}', 'Web\GroupsController@show');
	//

});




Route::group(['middleware' => ['manager.auth']], function () 
{

	//just redirecting manager to the dashboard
	Route::get('/manage', function()
	{
		return redirect('/manage/dashboard');
	});

	// Routes for Manager

	Route::get('/manage/dashboard', 'Manager\ManagerController@index');

	// 	manage players
	Route::get('/manage/players', 'Manager\ManagePlayersController@index');

	Route::get('/manage/add/player', 'Manager\ManagePlayersController@create');

	Route::post('/manage/add/players/store', 'Manager\ManagePlayersController@store');

	Route::get('/manage/view/player/{player}', 'Manager\ManagePlayersController@show');

	Route::get('/manage/update/player/{player}', 'Manager\ManagePlayersController@edit');

	Route::post('/manage/update/player/{player}/edit', 'Manager\ManagePlayersController@update');
	//

	// 	manage roles
	Route::get('/manage/add/role', 'Manager\ManageRoleController@index');

	Route::post('/manage/add/role/store', 'Manager\ManageRole	Controller@store');

	Route::get('/manage/stadiums', 'Manager\ManageStadiumController@index');

	Route::get('/manage/add/stadium', 'Manager\ManageStadiumController@create');

	Route::post('/manage/add/stadium/store', 'Manager\ManageStadiumController@store');

	Route::get('/manage/view/stadium/{stadium}', 'Manager\ManageStadiumController@show');

	Route::get('/manage/update/stadium/{stadium}', 'Manager\ManageStadiumController@edit');

	Route::post('/manage/update/stadium/{stadium}/edit', 'Manager\ManageStadiumController@update');

	// Calendar's Routes

	Route::get('/manage/tasks', 'Manager\ManageTasksController@index');

	Route::get('/manage/add/task', 'Manager\ManageTasksController@create');

	Route::post('/manage/add/task/store', 'Manager\ManageTasksController@store');

	Route::get('/manage/view/task/{task}', 'Manager\ManageTasksController@show' );

	Route::post('/manage/comment/task/{task}', 'Manager\ManageTasksController@storeComment');

	Route::get('/manage/delete/task/{task}', 'Manager\ManageTasksController@destroy');

	// Tasks Trash

	Route::get('/manage/tasks/trash', 'Manager\ManageTrashController@index');

	Route::get('/manage/restore/task/{taskTrash}','Manager\ManageTrashController@restore');

	Route::get('/manage/delete/trash/task/{trash}', 'Manager\ManageTrashController@destroy');

	// set the injury time

	Route::get('/manage/set/injury_time/{player}', 'Manager\ManageInjuryController@index');

	Route::post('/manage/set/injury_time/{player}', 'Manager\ManageInjuryController@store');

	//  team formation
	Route::get('/manage/formation', 'Web\FormationController@index');

	Route::get('/manage/add/captain', 'Web\CaptainController@edit');

	Route::post('/manage/add/captain/add', 'Web\CaptainController@update');

	Route::get('/manage/formation/set-piece-takers', 'Web\FreeKickersController@index');

	Route::post('/manage/formation/choose/free-kick', 'Web\FreeKickersController@store');

	Route::get('/manage/formation/corner-kick-taker', 'Web\CornerKickController@index');

	Route::post('/manage/formation/choose/corner-kick', 'Web\CornerKickController@store');

	Route::post('/manage/formation/add', 'Web\FormationController@store');
	//

});

Route::get('/logout', 'AuthController@logout');