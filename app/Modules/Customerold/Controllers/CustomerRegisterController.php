<?php

namespace App\Modules\Customer\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Modules\Customer\EmailVerification\SendVerificationEmail;
use App\Modules\Customer\Requests\CustomerRegisterRequest;
use App\Modules\Customer\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Mail;
use App\Page;
use App\Modules\Customer\Mail\EmailVerification;

class CustomerRegisterController extends Controller
{
    public function customerregister()
    {
        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        return view("Customer::register",compact('aboutus')); 
    }
    protected function create(array $data)
    {
        return Customer::create([
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'email_token' => base64_encode($data['email'])
        ]);
    }
    /**

* Handle a registration request for the application.

*the email is dispatched into the queue and instead of directly logging in that user
* redirect him to another page which will ask him to verify his email in order to continue

* @param \Illuminate\Http\Request $request

* @return \Illuminate\Http\Response
*/
    public function register(CustomerRegisterRequest $request)
    {
       
        $customer = Customer::where([
            ["email", "=", $request->email],
            ["verified", "=", 0]
            ])->first();
        $existing_customer = Customer::where([
                ["email", "=", $request->email],
                ["verified", "=", 1]
                ])->count();

        if ($existing_customer > 0) {
            // return response()->json('email already used', 200);
            return redirect()->route('customerregister')->with('message', 'Email already used');

        }
        
        if ($customer!=null && $customer->exists) {
            $customer->delete();
        }
        event(new Registered($customer = $this->create($request->all())));
 
        dispatch(new SendVerificationEmail($customer));// push a SendWelcomeEmail job onto the queue


        return redirect()->route('customerregister')->with('success', 'Sign Up Success! Please check your email for links and verification');

       // return response()->json('Sign Up Success! Please check your email for links and verification', 200);
    }

    /**

    * Handle a registration request for the application.

    * redirect to customer edit profile page after varification

    * @param $token

    * @return \Illuminate\Http\Response

    */

    public function verify($token)
    {
        $customer = Customer::where('email_token', $token)->first();

        if ($customer !=null) {
            $customer->verified = 1;
            $customer->isfirsttime = 0;
    
            if ($customer->save()) {
                $admins = $customer;
                
                return view("Customer::login")->with(compact('admins'));
                
            }
        } else {
            return abort(404);
        }
    }

   
}
