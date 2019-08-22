<?php

namespace App\Modules\Customer\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Requests\CustomerLoginRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
use Redirect;
use Input;
use App;
use App\Page;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function customerlogin()
    {
         $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
         return view("Customer::login",compact('aboutus'));
    }

    public function loginverifyHome(CustomerLoginRequest $request)
    {

      $admins = $request->session()->get('user');

        $encryp_pass= $request->input('password');

        $admin = Customer::select('id', 'email', 'image', 'verified','password')
            ->where([
                ['email', '=', $request->input('email')],
                ['verified', '=', 1]
            ])->first();

        if ($admin == null) {
            return redirect()->back()->with('message','Email not found!');
        }
         else {
            if (Hash::check($encryp_pass, $admin->password, [])) {

                //user is defined here to adjust with existing system
                session(['user' => $admin]);
                session(['user_id' => $admin->id]);

                 return redirect('/');
              
            } else {
               
                return redirect()->back()->with('message','Password do not match!');
            }
        }
    }


    public function customerLogout() {
        Auth::logout();
        session()->forget('user');
        session()->flush();
        Session::flash('logoutcustomer', 'You are successfully logged out.');
        return Redirect::to('/');
    }

}
