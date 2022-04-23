<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CatergoryRequest extends FormRequest {

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
             'category_name'=>'',
             'brand_id'=>'required',
             'title'=>'',
             'description'=>'',
             'slug'=>'',
             'tags'=>'',
             'views'=>'',
		];
	}

	protected function onUpdate() {
		return [
             'category_name'=>'',
             'brand_id'=>'required',
             'title'=>'',
             'description'=>'',
             'slug'=>'',
             'tags'=>'',
             'views'=>'',
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
             'category_name'=>trans('admin.category_name'),
             'brand_id'=>trans('admin.brand_id'),
             'title'=>trans('admin.title'),
             'description'=>trans('admin.description'),
             'slug'=>trans('admin.slug'),
             'tags'=>trans('admin.tags'),
             'views'=>trans('admin.views'),
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