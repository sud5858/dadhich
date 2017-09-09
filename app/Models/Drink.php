<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Drink extends Model
{
    use CrudTrait;

     protected $fillable =[
     'drinks_name','meta_title','meta_keyword','status','image','details','slug' ,
     'drinks_categories_id',
     ];

       protected $casts  = [
        'image' => 'array'
    ];



    public function drinks_categories()
    {
        return $this->belongsTo('App\Models\DrinksCategory', 'drinks_categories_id');
    }




    //-------------insert a file via  type "uplodad"---------------------//


    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "drinks";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }




//   delete function ----------------------------------------------------//


  public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            if (count((array)$obj->image)) {
                foreach ($obj->image as $file_path) {
                    \Storage::disk('uploads')->delete($file_path);
                }
            }
        });
    }



}
