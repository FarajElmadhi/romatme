<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Brand extends Model {

protected $table    = 'brands';
protected $fillable = [
		'id',
		'admin_id',
        'brand_name',
        'brand_title',
        'brand_description',
        'tags',
		'created_at',
		'updated_at',
	];

 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
      parent::boot();
      // if you disable constraints should by run this static method to Delete children data
         static::deleting(function($brand) {
         });
   }
		
}