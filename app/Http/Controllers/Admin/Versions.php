<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\VersionsDataTable;
use Carbon\Carbon;
use App\Models\Version;

use App\Http\Controllers\Validations\VersionsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Versions extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:versions_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:versions_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:versions_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:versions_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(VersionsDataTable $versions)
            {
               return $versions->render('admin.versions.index',['title'=>trans('admin.versions')]);
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
					return redirect(aurl("versions/create?temp_id=".$temp_id));
				}

               return view('admin.versions.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(VersionsRequest $request)
            {
                $data = $request->except("_token", "_method");
            	
		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);
		
		  		$versions = Version::create($data); 

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("versions", $dz_id, $versions->id);
		}
		

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $versions,
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
        		$versions =  Version::find($id);
        		return is_null($versions) || empty($versions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("versions")) :
        		view('admin.versions.show',[
				    'title'=>trans('admin.show'),
					'versions'=>$versions
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$versions =  Version::find($id);
        		return is_null($versions) || empty($versions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("versions")) :
        		view('admin.versions.edit',[
				  'title'=>trans('admin.edit'),
				  'versions'=>$versions
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
				foreach (array_keys((new VersionsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(VersionsRequest $request,$id)
            {
              // Check Record Exists
              $versions =  Version::find($id);
              if(is_null($versions) || empty($versions)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("versions"));
              }
              $data = $this->updateFillableColumns(); 
              Version::where('id',$id)->update($data);

              $versions = Version::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $versions,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$versions = Version::find($id);
		if(is_null($versions) || empty($versions)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("versions"));
		}
               
		it()->delete('version',$id);
		$versions->delete();
		return redirectWithSuccess(aurl("versions"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$versions = Version::find($id);
				if(is_null($versions) || empty($versions)){
					return backWithError(trans('admin.undefinedRecord'),aurl("versions"));
				}
                    	
				it()->delete('version',$id);
				$versions->delete();
			}
			return redirectWithSuccess(aurl("versions"),trans('admin.deleted'));
		}else {
			$versions = Version::find($data);
			if(is_null($versions) || empty($versions)){
				return backWithError(trans('admin.undefinedRecord'),aurl("versions"));
			}
                    
			it()->delete('version',$data);
			$versions->delete();
			return redirectWithSuccess(aurl("versions"),trans('admin.deleted'));
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
			if(request()->hasFile("thumb")){
				$rules["thumb"] = "";
			}


			$this->validate(request(), $rules, [], [
				 "thumb" => trans("admin.thumb"),

			]);

			if(request()->hasFile("thumb")){
				it()->upload("thumb", request("dz_path"), "versions", request("dz_id"));
			}

			return response([
				"status" => true,
				"type" => request("dz_type"),
				"file" => it()->getFile("versions", request("dz_id")),
			], 200);
		}

	}

}