<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Rom extends Model {

protected $table    = 'roms';
protected $fillable = [
		'id',
		'admin_id',
        'brand_id',

        'category_id',

        'model',
        'model_name',
        'region',
        'baseband',
        'security_level',
        'security_date',
        'version_id',

        'build date',
        'status',
        'url1',
        'url2',
        'url3',
        'views',
        'info',
        'tags',
        'root_mode',
        'key_id',
        'imei',
		'created_at',
		'updated_at',
	];

	/**
    * brand_id relation method
    * @param void
    * @return object data
    */
   public function brand_id(){
      return $this->hasOne(\App\Models\Brand::class,'id','brand_id');
   }

	/**
    * category_id relation method
    * @param void
    * @return object data
    */
   public function category_id(){
      return $this->hasOne(\App\Models\Category::class,'id','category_id');
   }

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($rom) {
			//$rom->brand_id()->delete();
			//$rom->brand_id()->delete();
         });
   }
		
}
