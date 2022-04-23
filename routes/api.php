<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
		Route::apiResource("brands","BrandsApi", ["as" => "api.brands"]); 
			Route::post("brands/multi_delete","BrandsApi@multi_delete"); 
			Route::apiResource("catergory","CatergoryApi", ["as" => "api.catergory"]); 
			Route::post("catergory/multi_delete","CatergoryApi@multi_delete"); 
			Route::apiResource("version","VersionApi", ["as" => "api.version"]); 
			Route::post("version/multi_delete","VersionApi@multi_delete"); 
			Route::post("version/upload/multi","VersionApi@multi_upload"); 
			Route::post("version/delete/file","VersionApi@delete_file"); 
			Route::apiResource("versions","VersionsApi", ["as" => "api.versions"]); 
			Route::post("versions/multi_delete","VersionsApi@multi_delete"); 
			Route::post("versions/upload/multi","VersionsApi@multi_upload"); 
			Route::post("versions/delete/file","VersionsApi@delete_file"); 
			Route::apiResource("flashe","FlasheApi", ["as" => "api.flashe"]); 
			Route::post("flashe/multi_delete","FlasheApi@multi_delete"); 
			Route::post("flashe/upload/multi","FlasheApi@multi_upload"); 
			Route::post("flashe/delete/file","FlasheApi@delete_file"); 
			Route::apiResource("rom","RomApi", ["as" => "api.rom"]); 
			Route::post("rom/multi_delete","RomApi@multi_delete"); 
			Route::post("rom/upload/multi","RomApi@multi_upload"); 
			Route::post("rom/delete/file","RomApi@delete_file"); 
			Route::apiResource("devices","DevicesApi", ["as" => "api.devices"]); 
			Route::post("devices/multi_delete","DevicesApi@multi_delete"); 
			Route::apiResource("regions","RegionsApi", ["as" => "api.regions"]); 
			Route::post("regions/multi_delete","RegionsApi@multi_delete"); 
			//Auth-Api-End//
	});
	// Insert your Api Here End //
});