<?php

namespace App\Http\Controllers\Admin;

use App\Models\DrinksCategory;
use App\Models\Drink;
use DB;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use Backpack\CRUD\app\Http\Requests\CrudRequest;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DrinkRequest as StoreRequest;
use App\Http\Requests\DrinkRequest as UpdateRequest;

class DrinkCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Drink');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/drink');
        $this->crud->setEntityNameStrings('drink', 'drinks');
        $this->crud->enableAjaxTable();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

$this->crud->addColumn([
       
   // 1-n relationship
   'label' => "Drinks Category", // Table column heading
   'type' => "select",
   'name' => 'drinks_categories_id', // the column that contains the ID of that connected entity;
   'entity' => 'drinks_categories', // the method that defines the relationship in your Model
   'attribute' => "drink_cat_name", // foreign key attribute that is shown to user
   'model' => "App\Models\DrinksCategory", // foreign key model
]);

            $this->crud->addColumn([
        
            
                'name'  => 'drinks_name',
                'label' => 'Name',
                'type'  => 'text',
               ]);
              $this->crud->addColumn([
            
                'name'  => 'image',
                'label' => 'Image',
                  'type' => 'image2',

               ]);
              $this->crud->addColumn([
            
                'name'  => 'status',
                'label' => 'Status',
                'type'  =>'check',
               ]);






$this->crud->addFields([

       [  // Select
   'label' => "Select Drinks Category",
   'type' => 'select',
   'name' => 'drinks_categories_id', // the db column for the foreign key
   'entity' => 'drinks_categories', // the method that defines the relationship in your Model
   'attribute' => 'drink_cat_name', // foreign key attribute that is shown to user
   'model' => "App\Models\DrinksCategory" ,// foreign key model
],





        [
         'name' => 'drinks_name',
         'label' => 'Drinks Name',
         
        ],

          [
         'name' => 'slug',
         'label' =>' Page URL',
        
         'type' =>'text',
        ],
          [
         'name' => 'meta_title',
         'label' =>' Meta Title',
         'type' =>'text',
        ],
          [
         'name' => 'meta_keyword',
         'label' =>' Meta Keyword',
         'type' =>'text',
        ],

         [

         'name' => 'details',
         'label' =>' Details',
         'type' =>'wysiwyg',
        ],

         [   // Upload
    'name' => 'image',
    'label' => 'image',
    'type' => 'upload_multiple',
    'upload' => true,
    'disk' => 'uploads' // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
],

         [
         'name' => 'status',
         'label' =>' Status',
         'type' =>'checkbox',
        ],
    ]);

    }

    public function store(StoreRequest $request)
    {
        $this->validate($request, [
       // 'slug' => 'required|unique:posts|max:255',
       
        'slug' => 'alpha_dash|unique:drinks_categories,slug',
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


    /* ------------------- Manually Created Function Start----------------*/


/*
       functionname=  drinkfront
       author= sudarshan dadheech
       work=    show a  drink categories item in  drinks blade
       Date=   04/08/2017
*/
      public function drinkfront($slug=NULL){
        $value=null;
        $data=null;
       $data = DrinksCategory::where('slug', $slug)->first();
 /*       dd($data);*/
        // $sud=$data['id'];
    if(isset($data)){
     $value=Drink::where('drinks_categories_id',$data['id'])->where('status', '=', 1)->get();  
     /*dd($value);*/ 
       }
       return view('pages.drinks')->with(compact('value','data'));
     }
/* -------------  End of the  drinkfront function------------------------------------------*/


/*
       functionname=  showspecific
       author= sudarshan dadheech
       work=    take a  Specific item in  drinks 
                and   show  in a particular_drink blade
       Date=   04/08/2017
*/
        public function showspecific($name=NULL,$slug=Null){
      
        $data = Drink::where('slug', $slug)->firstOrFail();
         /* dd($data);*/
         return view('pages.particular_drink')->with(compact('data'));
       }

/* -----------End of the  showspecific function------------------------------------------*/

       

}
