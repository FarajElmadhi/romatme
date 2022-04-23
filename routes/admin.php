<?php
use Illuminate\Support\Facades\Route;

\L::Panel(app('admin')); ///SetLangredirecttoadmin
\L::LangNonymous(); //RunRouteLang'namespace'=>'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
	Route::get('lock/screen', 'Admin\AdminAuthenticated@lock_screen');
	Route::get('theme/{id}', 'Admin\Dashboard@theme');
	Route::group(['middleware' => 'admin_guest'], function () {

		Route::get('login', 'Admin\AdminAuthenticated@login_page');
		Route::post('login', 'Admin\AdminAuthenticated@login_post');
		Route::view('forgot/password', 'admin.forgot_password');

		Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
		Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
		Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
	});

	Route::view('need/permission', 'admin.no_permission');

	Route::group(['middleware' => 'admin:admin'], function () {
		if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
			Route::group(['prefix' => 'filemanager'], function () {
				\UniSharp\LaravelFilemanager\Lfm::routes();
			});
		}

		////////AdminRoutes/*Start*///////////////
		Route::get('/', 'Admin\Dashboard@home');
		Route::any('logout', 'Admin\AdminAuthenticated@logout');
		Route::get('account', 'Admin\AdminAuthenticated@account');
		Route::post('account', 'Admin\AdminAuthenticated@account_post');
		Route::resource('settings', 'Admin\Settings');
		Route::resource('admingroups', 'Admin\AdminGroups');
		Route::post('admingroups/multi_delete', 'Admin\AdminGroups@multi_delete');
		Route::resource('admins', 'Admin\Admins');
		Route::post('admins/multi_delete', 'Admin\Admins@multi_delete');
		Route::resource('brands','Admin\Brands'); 
		Route::post('brands/multi_delete','Admin\Brands@multi_delete'); 
		Route::resource('catergory','Admin\Catergory'); 
		Route::post('catergory/multi_delete','Admin\Catergory@multi_delete'); 
		Route::post('catergory/get/brand/name','Admin\Catergory@get_brand_name'); 
		Route::resource('version','Admin\Version'); 
		Route::post('version/multi_delete','Admin\Version@multi_delete'); 
		Route::post('version/upload/multi','Admin\Version@multi_upload'); 
		Route::post('version/delete/file','Admin\Version@delete_file'); 
		Route::resource('versions','Admin\Versions'); 
		Route::post('versions/multi_delete','Admin\Versions@multi_delete'); 
		Route::post('versions/upload/multi','Admin\Versions@multi_upload'); 
		Route::post('versions/delete/file','Admin\Versions@delete_file'); 
		Route::resource('flashe','Admin\Flashe'); 
		Route::post('flashe/multi_delete','Admin\Flashe@multi_delete'); 
		Route::post('flashe/upload/multi','Admin\Flashe@multi_upload'); 
		Route::post('flashe/delete/file','Admin\Flashe@delete_file'); 
		Route::resource('rom','Admin\Rom'); 
		Route::post('rom/multi_delete','Admin\Rom@multi_delete'); 
		Route::post('rom/upload/multi','Admin\Rom@multi_upload'); 
		Route::post('rom/delete/file','Admin\Rom@delete_file'); 
		Route::resource('devices','Admin\Devices'); 
		Route::post('devices/multi_delete','Admin\Devices@multi_delete'); 
		Route::resource('regions','Admin\Regions'); 
		Route::post('regions/multi_delete','Admin\Regions@multi_delete'); 
		////////AdminRoutes/*End*///////////////
	});

});