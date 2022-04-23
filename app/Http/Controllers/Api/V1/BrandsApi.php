<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Brand;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\BrandsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class BrandsApi extends Controller{
	protected $selectColumns = [
		"id",
		"brand_name",
		"brand_title",
		"brand_description",
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
            	$Brand = Brand::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Brand]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(BrandsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Brand = Brand::create($data); 

		  $Brand = Brand::with($this->arrWith())->find($Brand->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Brand
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
                $Brand = Brand::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Brand) || empty($Brand)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Brand
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
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
            	$Brand = Brand::find($id);
            	if(is_null($Brand) || empty($Brand)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Brand::where("id",$id)->update($data);

              $Brand = Brand::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Brand
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $brands = Brand::find($id);
            	if(is_null($brands) || empty($brands)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("brand",$id);

               $brands->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $brands = Brand::find($id);
	            	if(is_null($brands) || empty($brands)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("brand",$id);
                    	$brands->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $brands = Brand::find($data);
	            	if(is_null($brands) || empty($brands)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("brand",$data);

                    $brands->delete();
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
			if(request()->hasFile("brand_logo")){
				$rules["brand_logo"] = "image";
			}


			$this->validate(request(), $rules, [], [
				 "brand_logo" => trans("admin.brand_logo"),

			]);

			if(request()->hasFile("brand_logo")){
				it()->upload("brand_logo", request("dz_path"), "brands", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("brands", request("dz_id")),
			]);
	}
}