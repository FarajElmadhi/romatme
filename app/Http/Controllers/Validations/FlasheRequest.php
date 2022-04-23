<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FlasheRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'brand_id'=>'required',
             'category_id'=>'required',
             'model'=>'',
             'model_name'=>'',
             'region'=>'',
             'security_level'=>'',
             'security_date'=>'',
             'version_id'=>'',
             'build date'=>'',
             'status'=>'',
             'url1'=>'',
             'url2'=>'',
             'url3'=>'',
             'views'=>'',
             'info'=>'',
             'tags'=>'',
             'root_mode'=>'',
             'key_id'=>'',
             'imei'=>'',
             'baseband'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'brand_id'=>'required',
             'category_id'=>'required',
             'model'=>'',
             'model_name'=>'',
             'region'=>'',
             'security_level'=>'',
             'security_date'=>'',
             'version_id'=>'',
             'build date'=>'',
             'status'=>'',
             'url1'=>'',
             'url2'=>'',
             'url3'=>'',
             'views'=>'',
             'info'=>'',
             'tags'=>'',
             'root_mode'=>'',
             'key_id'=>'',
             'imei'=>'',
             'baseband'=>'',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.37]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'brand_id'=>trans('admin.brand_id'),
             'category_id'=>trans('admin.category_id'),
             'model'=>trans('admin.model'),
             'model_name'=>trans('admin.model_name'),
             'region'=>trans('admin.region'),
             'security_level'=>trans('admin.security_level'),
             'security_date'=>trans('admin.security_date'),
             'version_id'=>trans('admin.version_id'),
             'build date'=>trans('admin.build date'),
             'status'=>trans('admin.status'),
             'url1'=>trans('admin.url1'),
             'url2'=>trans('admin.url2'),
             'url3'=>trans('admin.url3'),
             'views'=>trans('admin.views'),
             'info'=>trans('admin.info'),
             'tags'=>trans('admin.tags'),
             'root_mode'=>trans('admin.root_mode'),
             'key_id'=>trans('admin.key_id'),
             'imei'=>trans('admin.imei'),
             'baseband'=>trans('admin.baseband'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.37]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}