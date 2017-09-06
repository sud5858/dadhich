<?php

namespace App\Http\Controllers\Admin;
use App\Models\Slider;
use App\Models\Drink;
use App\Models\DrinksCategory;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;

class SliderCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Slider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/slider');
        $this->crud->setEntityNameStrings('Slider', 'sliders');
        $this->crud->enableAjaxTable();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumns([
         [
           'name' => 'slider_name',
           'label' => 'Slider Name',
           'type' => 'text',
         ],
         [
            'name' => 'slider_image',
            'label' => 'Image',
            'type' => 'image',
         ],
         [
             'name' => 'status',
             'label' => 'Status',
             'type' => 'check',
         ],


            ]);

        $this->crud->addFields([

            [
             'name' => 'slider_name',
             'label' => 'Slider Name',
             'type' => 'text',
            ],
            [
            'name' => 'slider_image',
            'label' => 'Slider_image',
            'type' => 'browse',
            ],
            [
            'name' => 'status',
            'label' => 'Status',
            'type' => 'checkbox',
            ],



            ]);

    }

    public function store(StoreRequest $request)
    {
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
       functionname=  slidershow
       author= sudarshan dadheech
       work=    show a image of the sliders table
       Date=   04/08/2017
*/

    public function slidershow(){
        $sliderimage=Slider::where('status', '=' ,1)->get();
        /* $coun = Drink::count();
       
         dd($coun1);*/
     $homevalue=Drink::where('status', '=', 1)->get();  


      /*  dd($sliderimage);*/
 /*dd($homevalue);*/
       return view('pages.home')->with(compact('sliderimage','homevalue'));

    }
        /* -----------End of the  slidershow function------------------------------------------*/






        public function showspecific($slug=Null){
   /*   dd($slug);*/
        $pdata = Drink::where('slug', $slug)->firstOrFail();
         /* dd($data);*/
         return view('pages.homeshow')->with(compact('pdata'));
       }
}
