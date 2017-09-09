<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;

class DrinksCategory extends Model
{
    use CrudTrait;

    protected $fillable =[

'drink_cat_name','meta_title','meta_keyword','status','image','details','slug'
    ];

   /*    protected $casts  = [
        'image' => 'array'
    ];*/

//-------------------relationship between  Drink Model ----------------------//
    
public function Drink()
    {
        return $this->hasMany('App\Models\Drink');
    }
    

    //-------------insert a file via  type "uplodad"---------------------//

/*
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "drinks-category";

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
  */

}