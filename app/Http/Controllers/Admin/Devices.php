<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DevicesDataTable;
use Carbon\Carbon;
use App\Models\Device;

use App\Http\Controllers\Validations\DevicesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Devices extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:devices_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:devices_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:devices_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:devices_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DevicesDataTable $devices)
            {
               return $devices->render('admin.devices.index',['title'=>trans('admin.devices')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.devices.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(DevicesRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$devices = Device::create($data); 
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('devices'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$devices =  Device::find($id);
        		return is_null($devices) || empty($devices)?
        		backWithError(trans("admin.undefinedRecord"),aurl("devices")) :
        		view('admin.devices.show',[
				    'title'=>trans('admin.show'),
					'devices'=>$devices
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$devices =  Device::find($id);
        		return is_null($devices) || empty($devices)?
        		backWithError(trans("admin.undefinedRecord"),aurl("devices")) :
        		view('admin.devices.edit',[
				  'title'=>trans('admin.edit'),
				  'devices'=>$devices
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
				foreach (array_keys((new DevicesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(DevicesRequest $request,$id)
            {
              // Check Record Exists
              $devices =  Device::find($id);
              if(is_null($devices) || empty($devices)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("devices"));
              }
              $data = $this->updateFillableColumns(); 
              Device::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('devices'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$devices = Device::find($id);
		if(is_null($devices) || empty($devices)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("devices"));
		}
               
		it()->delete('device',$id);
		$devices->delete();
		return redirectWithSuccess(aurl("devices"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$devices = Device::find($id);
				if(is_null($devices) || empty($devices)){
					return backWithError(trans('admin.undefinedRecord'),aurl("devices"));
				}
                    	
				it()->delete('device',$id);
				$devices->delete();
			}
			return redirectWithSuccess(aurl("devices"),trans('admin.deleted'));
		}else {
			$devices = Device::find($data);
			if(is_null($devices) || empty($devices)){
				return backWithError(trans('admin.undefinedRecord'),aurl("devices"));
			}
                    
			it()->delete('device',$data);
			$devices->delete();
			return redirectWithSuccess(aurl("devices"),trans('admin.deleted'));
		}
	}
            

}