<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Drink extends Model
{
    use CrudTrait;

     protected $fillable =[
     'drinks_name','meta_title','meta_keyword','status','drinks_image','details','slug' ,
     'drinks_categories_id',
     ];


    public function drinks_categories()
    {
        return $this->belongsTo('App\Models\DrinksCategory', 'drinks_categories_id');
    }


}
