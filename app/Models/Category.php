<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Category extends Model {

protected $table    = 'categories';
protected $fillable = [
		'id',
		'admin_id',
        'category_name',
        'brand_id',

        'title',
        'description',
        'slug',
        'tags',
        'views',
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
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($category) {
			//$category->brand_id()->delete();
         });
   }
		
}
