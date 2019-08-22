<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;
use session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    public  function adminprofile()
    {
        $form = 'create';
        $admins = User::find( Auth::user()->id);
       
        return view('admin.profile',compact('form', 'admins'));
    }
    public function profileupdate(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'old_password' => 'required',
            'new_password' => 'required',
            're_password' => 'required|same:new_password',

        ]);

        $admins = User::find( Auth::user()->id);
       
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
         
             $admins->image = $fileNameToStore;
        }
        else{
            $fileNameToStore= $admins->image;
        }



        if ($validator->fails()) {
            $data['admins'] = User::find( Auth::user()->id);

            return view('admin.profile', $data)
                ->withInput($request->all())
                ->withErrors($validator, 'errors');
        }
        $admins=User::find( Auth::user()->id);
        $old_password = Input::get('old_password');

        if (Hash::check($old_password, $admins->password)) {
            $admins  = \DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('new_password')),
                    'image'=>$fileNameToStore,
                ]);
         

    return redirect(route('dashboard.index',$request->session()->flash('success', 'Admin Profile Updated successfully')));


        }
        else{
            $data['admins'] = User::find( Auth::user()->id);
            $validator->errors()->add('old_password', 'Old Password Donot Match');

            return view('admin.profile', $data)
                ->withInput($request->all())
                ->withErrors($validator, 'errors');

        }


    }


}
