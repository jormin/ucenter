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

Route::group(['middleware'=>['auth'],'namespace'=>'Backend'],function(){

    // 权限管理
    Route::post('admins/active/{admin}',['as'=>'admins.active','uses'=>'AdminsController@active']);
    Route::resource('admins','AdminsController');
    Route::resource('roles','RolesController');
    Route::resource('perms','PermissionsController');
    Route::resource('menus','MenusController');

    // 管理员
    Route::get('users/profile',['as'=>'users.profile','uses'=>'UsersController@profile']);
    Route::get('users/password',['as'=>'users.password','uses'=>'UsersController@password']);
    Route::post('users/changepassword',['as'=>'users.changepassword','uses'=>'UsersController@changePassword']);
    Route::resource('users','UsersController');


    // 系统设置
    Route::get('configs/option/{type?}',['as'=>'configs.option','uses'=>'ConfigsController@index']);
    Route::post('configs/default/{config}',['as'=>'configs.default','uses'=>'ConfigsController@setDefault']);
    Route::resource('configs','ConfigsController');


    // 日志
    Route::get('logs/signin', ['as'=>'logs.signin','uses'=>'LogsController@signin']);
    Route::get('logs/mine', ['as'=>'logs.mine','uses'=>'LogsController@mine']);
    Route::get('logs/index', ['as'=>'logs.index','uses'=>'LogsController@index']);
    Route::get('logs/export', ['as'=>'logs.export','uses'=>'LogsController@export']);

    Route::get('/', ['as'=>'home','uses'=>'IndexController@index']);

});