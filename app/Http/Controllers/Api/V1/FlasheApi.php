<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rom;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\FlasheRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class FlasheApi extends Controller{
	protected $selectColumns = [
		"id",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['brand_id','category_id','version_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Rom = Rom::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Rom]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(FlasheRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Rom = Rom::create($data); 

		  $Rom = Rom::with($this->arrWith())->find($Rom->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Rom
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Rom = Rom::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Rom) || empty($Rom)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Rom
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new FlasheRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(FlasheRequest $request,$id)
            {
            	$Rom = Rom::find($id);
            	if(is_null($Rom) || empty($Rom)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Rom::where("id",$id)->update($data);

              $Rom = Rom::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Rom
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $flashe = Rom::find($id);
            	if(is_null($flashe) || empty($flashe)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("rom",$id);

               $flashe->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $flashe = Rom::find($id);
	            	if(is_null($flashe) || empty($flashe)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("rom",$id);
                    	$flashe->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $flashe = Rom::find($data);
	            	if(is_null($flashe) || empty($flashe)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("rom",$data);

                    $flashe->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
	// Delete Files From Dropzone Library
	public function delete_file() {
		if (request("type_file") && request("type_id")) {
			if (it()->getFile(request("type_file"), request("type_id"))) {
				it()->delete(null, null, request("id"));
				return successResponseJson([]);
			}
		}
	}

	// Multi upload with dropzone
	public function multi_upload() {
			$rules = [];
			if(request()->hasFile("thumbnail")){
				$rules["thumbnail"] = "";
			}


			$this->validate(request(), $rules, [], [
				 "thumbnail" => trans("admin.thumbnail"),

			]);

			if(request()->hasFile("thumbnail")){
				it()->upload("thumbnail", request("dz_path"), "flashe", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("flashe", request("dz_id")),
			]);
	}
}