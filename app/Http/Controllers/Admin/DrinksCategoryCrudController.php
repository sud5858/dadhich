<?php

namespace App\Http\Controllers\Admin;
use App\Models\DrinksCategory;


use Backpack\CRUD\app\Http\Controllers\CrudController;

use Backpack\CRUD\app\Http\Requests\CrudRequest;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DrinksCategoryRequest as StoreRequest;
use App\Http\Requests\DrinksCategoryRequest as UpdateRequest;

class DrinksCategoryCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\DrinksCategory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/drinkscategory');
        $this->crud->setEntityNameStrings('Drinks Category', 'Drinks Category');
          $this->crud->enableAjaxTable();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */  // Columns.
        
   $this->crud->addColumn([
            
                'name'  => 'drink_cat_name',
                'label' => 'Name',
               
            ]);

          
            $this->crud->addColumn([
                'name'  => 'image',
                'label' => 'Image',
                'type'=> 'image2',
                 
               
               
            ]);
          $this->crud->addColumn([
                'name'  => 'status',
                'label' => 'Status',
                'type'=>'check',
               
            ]);
           
        

         // Fields
        $this->crud->addFields([
            [
                'name'  => 'drink_cat_name',
                'label' => 'Name',
                'type'  => 'text',
            ],
            [
                'name'  => 'slug',
                'label' => 'Page URL',
                'type'  => 'text',
            ],
            [
                'name'  => 'details',
                'label' => 'Details',
                'type'  => 'wysiwyg',
            ],
          
              [ // image
             'label' => "Image",
              'name' => "image",
              'type' => 'image',
               'upload' => true,
               'crop' => true, // set to true to allow cropping, false to disable
               'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
                //'prefix' => 'uploads' //in case you only store the filename in the database, this text will be prepended to the database value 
            ],


            
            [
                'name'  => 'status',
                'label' => 'Status',
                'type'  => 'checkbox',
            ],
            [
                'name'  => 'meta_title',
                'label' => 'Meta Title',
                'type'  => 'text',
            ],
            [
                'name'  => 'meta_keyword',
                'label' => 'Meta Keywords',
                'type'  => 'text',
            ],
           
         ]);
    }


  

    public function store(StoreRequest $request)
    {

          $this->validate($request, [
       // 'slug' => 'required|unique:posts|max:255',
       
        'slug' => 'alpha_dash|unique:drinks_categories,slug',
        'meta_title' => 'required',
    ]);
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry

      
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

     
     /*
       functionname=  indexfront
       author= sudarshan dadheech
       work=   show a category list  click on drinks Category buttion 
       Date=   03/08/2017
*/
    public function indexfront(){

        $val= DrinksCategory::where('status', '=', 1)->get();
        /*dd($val);*/
        return view('pages.drinks_categories')->with(compact('val')); 
    }
    /* -----------End of the  indexfront function------------------------------------------*/


  
}
