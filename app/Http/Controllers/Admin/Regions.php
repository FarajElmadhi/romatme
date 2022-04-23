<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\RegionsDataTable;
use Carbon\Carbon;
use App\Models\Region;

use App\Http\Controllers\Validations\RegionsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Regions extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:regions_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:regions_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:regions_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:regions_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(RegionsDataTable $regions)
            {
               return $regions->render('admin.regions.index',['title'=>trans('admin.regions')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.regions.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(RegionsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$regions = Region::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('regions'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$regions =  Region::find($id);
        		return is_null($regions) || empty($regions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("regions")) :
        		view('admin.regions.show',[
				    'title'=>trans('admin.show'),
					'regions'=>$regions
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$regions =  Region::find($id);
        		return is_null($regions) || empty($regions)?
        		backWithError(trans("admin.undefinedRecord"),aurl("regions")) :
        		view('admin.regions.edit',[
				  'title'=>trans('admin.edit'),
				  'regions'=>$regions
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
				foreach (array_keys((new RegionsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(RegionsRequest $request,$id)
            {
              // Check Record Exists
              $regions =  Region::find($id);
              if(is_null($regions) || empty($regions)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("regions"));
              }
              $data = $this->updateFillableColumns(); 
              Region::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('regions'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$regions = Region::find($id);
		if(is_null($regions) || empty($regions)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("regions"));
		}
               
		it()->delete('region',$id);
		$regions->delete();
		return redirectWithSuccess(aurl("regions"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$regions = Region::find($id);
				if(is_null($regions) || empty($regions)){
					return backWithError(trans('admin.undefinedRecord'),aurl("regions"));
				}
                    	
				it()->delete('region',$id);
				$regions->delete();
			}
			return redirectWithSuccess(aurl("regions"),trans('admin.deleted'));
		}else {
			$regions = Region::find($data);
			if(is_null($regions) || empty($regions)){
				return backWithError(trans('admin.undefinedRecord'),aurl("regions"));
			}
                    
			it()->delete('region',$data);
			$regions->delete();
			return redirectWithSuccess(aurl("regions"),trans('admin.deleted'));
		}
	}
            

}