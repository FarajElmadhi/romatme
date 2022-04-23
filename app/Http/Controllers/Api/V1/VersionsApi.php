<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Version;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\VersionsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class VersionsApi extends Controller{
	protected $selectColumns = [
		"id",
		"version",
		"version_name",
		"slug",
		"tags",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Version = Version::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Version]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(VersionsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Version = Version::create($data); 

		  $Version = Version::with($this->arrWith())->find($Version->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Version
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
                $Version = Version::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Version) || empty($Version)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Version
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
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
            	$Version = Version::find($id);
            	if(is_null($Version) || empty($Version)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Version::where("id",$id)->update($data);

              $Version = Version::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Version
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $versions = Version::find($id);
            	if(is_null($versions) || empty($versions)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("version",$id);

               $versions->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $versions = Version::find($id);
	            	if(is_null($versions) || empty($versions)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("version",$id);
                    	$versions->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $versions = Version::find($data);
	            	if(is_null($versions) || empty($versions)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("version",$data);

                    $versions->delete();
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
			if(request()->hasFile("thumb")){
				$rules["thumb"] = "";
			}


			$this->validate(request(), $rules, [], [
				 "thumb" => trans("admin.thumb"),

			]);

			if(request()->hasFile("thumb")){
				it()->upload("thumb", request("dz_path"), "versions", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("versions", request("dz_id")),
			]);
	}
}