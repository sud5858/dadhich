<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class UserController extends Controller
{
    //--------------------open signup page--------------------------------//
    public function getSignup(){
    	return view('user.signup');
    }
  

  //------------------Post signup page data----------------------------------//
    public function postSignup(Request $request){
    
     $this->validate($request,[
         'email' => 'email|required|unique:users',
         'password' => 'required|min:4',
     	]);
     $user= new User([
       'name' => $request->input('name'),
       'email' => $request->input('email'),
       'password' => bcrypt($request->input('password'))
     	]);
     	/*dd($user);*/
     $user->save();
   /*  dd('submit');*/
     return redirect('/');
    }

//--------------Open Sign In Page------------------------------//
    public function getSignin(){
    	return view('user.signin');
    }



//--------------Check Sign In Data ------------------------------//

    public function postSignin(Request $request){
    	$this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:4'
    		]);

    	if(Auth::attempt([
         'email' => $request->input('email'),
         'password' => ($request->input('password'))
    		])){
    
    		 return redirect('/user/profile');
    	}
    	
    	return redirect()->back();
    }

//--------------Redirect Profile Page When Condition Match --------------//
       public function profile(){
        return view('user.profile');
    }


//--------------Redirect Profile Page When Condition Match --------------//
    public function getLogout(){

        Auth::logout();
        return redirect('/');

    }
}
