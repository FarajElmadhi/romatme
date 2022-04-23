<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Rom;
use App\Models\Version;
use App\Models\Setting;
use App\Models\Device;


use App\Http\Controllers\Validations\BrandsRequest;
class HomeController extends Controller
{

    public function index(){
$settings= Setting::find(1);
        $brands= Brand::all();
$romat= Rom::latest()->take(100)->get();

$roms = array();

foreach($romat as $rom){

$categories  = Category::find($rom->category_id);
$brand = Brand::find($rom->brand_id);


array_push($roms, [

    'id' => $rom->id,
    'brand' => $brand->brand_name,
    'category'=> $categories->category_name,
    'model'=> $rom->model,
    'model_name'=> $rom->model_name,
    'region'=> $rom->region,
    'baseband'=> $rom->baseband,
    'sec'=> $rom->security_level,
    'sec_date'=> $rom->security_date,
    'version'=> $rom->version,
    'build_date'=> $rom->build_date,
    'status'=> $rom->status,
    'url1'=> $rom->url1,
    'url2'=> $rom->url2,
    'url3'=> $rom->url3,
    'views'=> $rom->views,
    'info'=> $rom->info,
    'tags'=> $rom->tags,
    'root_mode'=> $rom->root_mode,
    'key_id'=> $rom->key_id,
    'imei'=> $rom->imei,
    'updated'=> $rom->updated_at



]);


}

$title= $settings->sitename_en;

$description = 'Android And IOS Firmware Download With all the files and tools you need to repair the phone';
$keyword = 'android firmware, samsung firmware, ios firmware, samsung firmware download, ios firmware download, firmware samsung,firmware xiaomi, firmware infinix, firmware sony, firmware lg, firmware nokia, firmware download, samsung update, samsung firmware update, galaxy firmware';
// dd($roms);
	return view('front.home', compact('brands', 'roms', 'title', 'description', 'keyword'));
    }


    public function download($brand, $type,$model, $csc =null, $baseband=null, $vers=null){
        $brands= Brand::all();

      
        $roms= Rom::where('baseband', $baseband)->where('region', $csc)->first(); 
        if($roms->version != NULL){
            $version = $roms->version;


        $title= "Download $type $brand $roms->model_name $model $baseband $csc  $roms->version ";
        $description = "Download $type $brand $roms->model_name $model $baseband $csc $roms->version ";
        $keyword = "$type $model, $type $roms->model_name, $type $model $roms->version,$type $roms->model_name $roms->version, $model $roms->version, $roms->model_name $roms->version,  $model , $roms->model_name, $baseband $csc, ";
        return view('front.download', compact('roms', 'brands','brand', 'type', 'model',  'csc', 'baseband', 'title', 'description', 'keyword', 'version'));

        }

        else{

    

            $title= "Download $type $brand $roms->model_name $model $baseband   ";
            $description = "Download $type $brand $roms->model_name $model $baseband  ";
            $keyword = "$type $model, $type $roms->model_name, $type $model ,$type $roms->model_name , $roms->model_name , $baseband , ";
            return view('front.download', compact('roms', 'brands','brand', 'type', 'model',  'csc', 'baseband', 'title', 'description', 'keyword'));

            }
        


    }
    public function appleDownload($brand, $type,$model, $baseband, $vers){
        $brands= Brand::all();
$csc = null;

            $roms= Rom::where('baseband', $baseband)->where('version', $vers)->first(); 
$version = $vers;
            $title= "Download $type $brand $roms->model_name $model $baseband $csc  $roms->version ";
            $description = "Download $type $brand $roms->model_name $model $baseband $csc $roms->version ";
            $keyword = "$type $model, $type $roms->model_name, $type $model $roms->version,$type $roms->model_name $roms->version, $model $roms->version, $roms->model_name $roms->version,  $model , $roms->model_name , $baseband $csc, ";
            return view('front.download', compact('roms', 'brands','brand', 'type', 'model',  'csc', 'baseband', 'title', 'description', 'keyword', 'version'));
    
        
        


    }





    public function categories($brand, $type){
        $brands= Brand::all();
        $b = Brand::where('brand_name', $brand)->first();
        $c = Category::where('category_name', $type)->first();

$devices = Rom::where('category_id', $c->id)->where('brand_id', $b->id)->select('model', 'model_name')->distinct()->orderBy('model', 'DESC')->get();
        $description = 'Android And IOS Firmware Download With all the files and tools you need to repair the phone';
        $keyword = 'android firmware, samsung firmware, ios firmware, samsung firmware download, ios firmware download, firmware samsung,firmware xiaomi, firmware infinix, firmware sony, firmware lg, firmware nokia, firmware download, samsung update, samsung firmware update, galaxy firmware';
        // dd($roms);
        $title = 'Download  ' . $type . ' '. $brand;
        return view('front.category', compact('devices','title', 'description', 'keyword', 'brands', 'brand', 'type', 'b'));

    }
    public function show($brand, $type, $model){
        $brands= Brand::all();
        $b = Brand::where('brand_name', $brand)->first();
        $c = Category::where('category_name', $type)->first();

$roms = Rom::where('category_id', $c->id)->where('brand_id', $b->id)->where('model', $model)->get();
        // $devices = Device::all();
        $description = "Download $type $brand  $model";
        $keyword = "$type $model, $type, $type $model";
        $title = 'Download  ' . $type . ' '. $brand.' '. $model;
        return view('front.show', compact('roms','title', 'description', 'keyword', 'brands', 'brand', 'type', 'model'));

    }



    public function search(Request $request){
      $rom =   Rom::where('model', "LIKE", "%". $request['query']."%" )->select('model', 'model_name')
      ->orWhere('model_name', "LIKE", "%". $request['query']."%" )->select('model', 'model_name')
      
      ->distinct()->get();

$data = array();
      foreach($rom as $r){

       $device = Rom::where('model', $r->model)->select('brand_id')->first();
         $brands= Brand::where('id', $device->brand_id)->first();
        $data[]=array(
            "data" => $r->model,
             "value" =>$r->model. ' / '. $r->model_name,
             "brand"=> $brands->brand_name
            
            );
      }
     
      return response()->json(['suggestions'=>$data]);


    }

    public function model($brand, $model){
        $brands= Brand::all();
        $b = Brand::where('brand_name', $brand)->first();

// $cat = Rom::where('brand_id', $b->id)->where('model', $model)->orderBy('category_id', 'ASC')->get();
$cats = Category::all();
$arr = array();
foreach($cats as $cat){

    $roms = Rom::where('brand_id', $b->id)->where('model', $model)->where('category_id', $cat->id)->get();
    $model_name = Rom::where('model', $model)->first();

    if($roms->count() > 0){
array_push($arr,[
    'category_id' => $cat->id,
    'type' => $cat->category_name,
    'count'=> $roms->count()


]);
}
}
// dd($arr);
        // $devices = Device::all();
        $description = "Download  $brand  $model";
        $keyword = " $model";
        $title = 'Download  '   . $brand.' '. $model;
        return view('front.model', compact('roms','title', 'description', 'keyword', 'brands', 'brand', 'model','model_name' ,'arr'));

    }

}