<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BrandsDataTable;
use Carbon\Carbon;
use App\Models\Brand;

use App\Http\Controllers\Validations\BrandsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Brands extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:brands_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:brands_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:brands_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:brands_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BrandsDataTable $brands)
            {
               return $brands->render('admin.brands.index',['title'=>trans('admin.brands')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
            $temp_id = (time()*rand(0000,9999));
            if(empty(request("temp_id")) || !request()->has("temp_id")){
					return redirect(aurl("brands/create?temp_id=".$temp_id));
				}

               return view('admin.brands.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(BrandsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	
		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);
		
		  		$brands = Brand::create($data); 

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("brands", $dz_id, $brands->id);
		}
		

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $brands,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$brands =  Brand::find($id);
        		return is_null($brands) || empty($brands)?
        		backWithError(trans("admin.undefinedRecord"),aurl("brands")) :
        		view('admin.brands.show',[
				    'title'=>trans('admin.show'),
					'brands'=>$brands
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$brands =  Brand::find($id);
        		return is_null($brands) || empty($brands)?
        		backWithError(trans("admin.undefinedRecord"),aurl("brands")) :
        		view('admin.brands.edit',[
				  'title'=>trans('admin.edit'),
				  'brands'=>$brands
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new BrandsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(BrandsRequest $request,$id)
            {
              // Check Record Exists
              $brands =  Brand::find($id);
              if(is_null($brands) || empty($brands)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("brands"));
              }
              $data = $this->updateFillableColumns(); 
              Brand::where('id',$id)->update($data);

              $brands = Brand::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $brands,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$brands = Brand::find($id);
		if(is_null($brands) || empty($brands)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("brands"));
		}
               
		it()->delete('brand',$id);
		$brands->delete();
		return redirectWithSuccess(aurl("brands"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$brands = Brand::find($id);
				if(is_null($brands) || empty($brands)){
					return backWithError(trans('admin.undefinedRecord'),aurl("brands"));
				}
                    	
				it()->delete('brand',$id);
				$brands->delete();
			}
			return redirectWithSuccess(aurl("brands"),trans('admin.deleted'));
		}else {
			$brands = Brand::find($data);
			if(is_null($brands) || empty($brands)){
				return backWithError(trans('admin.undefinedRecord'),aurl("brands"));
			}
                    
			it()->delete('brand',$data);
			$brands->delete();
			return redirectWithSuccess(aurl("brands"),trans('admin.deleted'));
		}
	}
            
	// Delete Files From Dropzone Library
	public function delete_file() {
		if (request("type_file") && request("type_id")) {
			if (it()->getFile(request("type_file"), request("type_id"))) {
				it()->delete(null, null, request("id"));
				return response([
					"status" => true,
				], 200);
			}
		}
	}

	// Multi upload with dropzone
	public function multi_upload() {
		if (request()->ajax()) {
			$rules = [];
			if(request()->hasFile("brand_logo")){
				$rules["brand_logo"] = "image";
			}


			$this->validate(request(), $rules, [], [
				 "brand_logo" => trans("admin.brand_logo"),

			]);

			if(request()->hasFile("brand_logo")){
				it()->upload("brand_logo", request("dz_path"), "brands", request("dz_id"));
			}

			return response([
				"status" => true,
				"type" => request("dz_type"),
				"file" => it()->getFile("brands", request("dz_id")),
			], 200);
		}

	}

}