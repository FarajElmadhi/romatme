<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CatergoryDataTable;
use Carbon\Carbon;
use App\Models\Category;

use App\Http\Controllers\Validations\CatergoryRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Catergory extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:catergory_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:catergory_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:catergory_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:catergory_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CatergoryDataTable $catergory)
            {
               return $catergory->render('admin.catergory.index',['title'=>trans('admin.catergory')]);
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
					return redirect(aurl("catergory/create?temp_id=".$temp_id));
				}

               return view('admin.catergory.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(CatergoryRequest $request)
            {
                $data = $request->except("_token", "_method");
            	
		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);
		
		  		$catergory = Category::create($data); 

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("catergory", $dz_id, $catergory->id);
		}
		

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $catergory,
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
        		$catergory =  Category::find($id);
        		return is_null($catergory) || empty($catergory)?
        		backWithError(trans("admin.undefinedRecord"),aurl("catergory")) :
        		view('admin.catergory.show',[
				    'title'=>trans('admin.show'),
					'catergory'=>$catergory
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$catergory =  Category::find($id);
        		return is_null($catergory) || empty($catergory)?
        		backWithError(trans("admin.undefinedRecord"),aurl("catergory")) :
        		view('admin.catergory.edit',[
				  'title'=>trans('admin.edit'),
				  'catergory'=>$catergory
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
				foreach (array_keys((new CatergoryRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(CatergoryRequest $request,$id)
            {
              // Check Record Exists
              $catergory =  Category::find($id);
              if(is_null($catergory) || empty($catergory)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("catergory"));
              }
              $data = $this->updateFillableColumns(); 
              Category::where('id',$id)->update($data);

              $catergory = Category::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $catergory,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$catergory = Category::find($id);
		if(is_null($catergory) || empty($catergory)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("catergory"));
		}
               
		it()->delete('category',$id);
		$catergory->delete();
		return redirectWithSuccess(aurl("catergory"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$catergory = Category::find($id);
				if(is_null($catergory) || empty($catergory)){
					return backWithError(trans('admin.undefinedRecord'),aurl("catergory"));
				}
                    	
				it()->delete('category',$id);
				$catergory->delete();
			}
			return redirectWithSuccess(aurl("catergory"),trans('admin.deleted'));
		}else {
			$catergory = Category::find($data);
			if(is_null($catergory) || empty($catergory)){
				return backWithError(trans('admin.undefinedRecord'),aurl("catergory"));
			}
                    
			it()->delete('category',$data);
			$catergory->delete();
			return redirectWithSuccess(aurl("catergory"),trans('admin.deleted'));
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
			if(request()->hasFile("thumbnail")){
				$rules["thumbnail"] = "";
			}


			$this->validate(request(), $rules, [], [
				 "thumbnail" => trans("admin.thumbnail"),

			]);

			if(request()->hasFile("thumbnail")){
				it()->upload("thumbnail", request("dz_path"), "catergory", request("dz_id"));
			}

			return response([
				"status" => true,
				"type" => request("dz_type"),
				"file" => it()->getFile("catergory", request("dz_id")),
			], 200);
		}

	}

}