<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\RomDataTable;
use Carbon\Carbon;
use App\Models\Rom;

use App\Http\Controllers\Validations\RomRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Rom extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:rom_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:rom_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:rom_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:rom_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(RomDataTable $rom)
            {
               return $rom->render('admin.rom.index',['title'=>trans('admin.rom')]);
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
					return redirect(aurl("rom/create?temp_id=".$temp_id));
				}

               return view('admin.rom.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(RomRequest $request)
            {
                $data = $request->except("_token", "_method");
            	
		// Unset or Remove Dropzone request
		$dz_path = request("dz_path");
		$dz_type = request("dz_type");
		$dz_id = request("dz_id");
		unset($data["dz_id"], $data["dz_type"], $data["dz_type"]);
		
		  		$rom = Rom::create($data); 

		// rename or move files from tempfile Folder after Add record
		if ($dz_type == "create") {
			it()->rename("rom", $dz_id, $rom->id);
		}
		

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $rom,
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
        		$rom =  Rom::find($id);
        		return is_null($rom) || empty($rom)?
        		backWithError(trans("admin.undefinedRecord"),aurl("rom")) :
        		view('admin.rom.show',[
				    'title'=>trans('admin.show'),
					'rom'=>$rom
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$rom =  Rom::find($id);
        		return is_null($rom) || empty($rom)?
        		backWithError(trans("admin.undefinedRecord"),aurl("rom")) :
        		view('admin.rom.edit',[
				  'title'=>trans('admin.edit'),
				  'rom'=>$rom
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
				foreach (array_keys((new RomRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(RomRequest $request,$id)
            {
              // Check Record Exists
              $rom =  Rom::find($id);
              if(is_null($rom) || empty($rom)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("rom"));
              }
              $data = $this->updateFillableColumns(); 
              Rom::where('id',$id)->update($data);

              $rom = Rom::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $rom,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$rom = Rom::find($id);
		if(is_null($rom) || empty($rom)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("rom"));
		}
               
		it()->delete('rom',$id);
		$rom->delete();
		return redirectWithSuccess(aurl("rom"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$rom = Rom::find($id);
				if(is_null($rom) || empty($rom)){
					return backWithError(trans('admin.undefinedRecord'),aurl("rom"));
				}
                    	
				it()->delete('rom',$id);
				$rom->delete();
			}
			return redirectWithSuccess(aurl("rom"),trans('admin.deleted'));
		}else {
			$rom = Rom::find($data);
			if(is_null($rom) || empty($rom)){
				return backWithError(trans('admin.undefinedRecord'),aurl("rom"));
			}
                    
			it()->delete('rom',$data);
			$rom->delete();
			return redirectWithSuccess(aurl("rom"),trans('admin.deleted'));
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
				it()->upload("thumbnail", request("dz_path"), "rom", request("dz_id"));
			}

			return response([
				"status" => true,
				"type" => request("dz_type"),
				"file" => it()->getFile("rom", request("dz_id")),
			], 200);
		}

	}

}