<?php

namespace App\Http\Controllers\Backend;
use App\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /*  ******************  */
    public function form()
    {
      $form = 'option';
      $options = [];
      $options_data = Option::all()->toArray();
      foreach ($options_data as $value) {
        $options[$value['option_key']] = $value['option_value'];
      }

      return view('backend.option.form',compact('form', 'options'));
    }

    public function save( Request $request ){

      $validatedData = $request->validate([
        'title' => 'required',
        'admin_email' =>'required',
       ]);

        $this->update_option('site_title', $request->input('title') );
        $this->update_option('short_desc', $request->input('short_desc') );
        $this->update_option('admin_email', $request->input('admin_email') );
        $this->update_option('fb_page_link', $request->input('fb_page_link') );
        $this->update_option('newsletter_title', $request->input('newsletter_title') );
        $this->update_option('newsletter_sub_title', $request->input('newsletter_sub_title') );
        $this->update_option('copy_right', $request->input('copy_right') );
        return redirect()->route('option.index')->with('success', 'Option has been updated successfully');


    }

    public function update_option($option_key, $option_value){

      $count = Option::where('option_key', $option_key)
                      ->first();
      if( $count ){

        $updated = Option::findOrFail($count->id);
        $updated->option_key = $option_key;
        $updated->option_value = $option_value;
        $updated->autoload = '_yes';
        $updated->update();
      } else {
        $option = new Option();
        $option->option_key = $option_key;
        $option->option_value = $option_value;
        $option->autoload = '_yes';
        $option->save();
      }

    }

    public function get_option($option_key){

      $option = Option::where('option_key', $option_key)
                      ->first();

      return $option['option_value'];
    }
}
