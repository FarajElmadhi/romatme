<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Region;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\RegionsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class RegionsApi extends Controller{
	protected $selectColumns = [
		"id",
		"code",
		"country",
		"flag",
		"tags",
		"info",
		"views",
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
            	$Region = Region::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Region]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(RegionsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Region = Region::create($data); 

		  $Region = Region::with($this->arrWith())->find($Region->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Region
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
                $Region = Region::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Region) || empty($Region)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Region
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new RegionsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(RegionsRequest $request,$id)
            {
            	$Region = Region::find($id);
            	if(is_null($Region) || empty($Region)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Region::where("id",$id)->update($data);

              $Region = Region::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Region
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $regions = Region::find($id);
            	if(is_null($regions) || empty($regions)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("region",$id);

               $regions->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $regions = Region::find($id);
	            	if(is_null($regions) || empty($regions)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("region",$id);
                    	$regions->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $regions = Region::find($data);
	            	if(is_null($regions) || empty($regions)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("region",$data);

                    $regions->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}