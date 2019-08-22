<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Option;
use App\country;

class CmsoptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cmsoption = new Option();
        $search = $cmsoption->query();

        if ($option_title = $request->name) {
            $search->where('option_title', 'like', '%' . $option_title . '%');
        }

        $cmsoptions = $search->orderBy('id', 'desc')->paginate(10);
        return view('backend.cmsoption.index', compact('cmsoptions', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = 'create';
        $cmsoption = Option::all();
        return view('backend.cmsoption.form', compact('form', 'cmsoption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Option $cmsoption)
    {
        // $validatedData = $request->validate([
        //     'option_name' => 'required',
        //     'option_title' => 'required'
        // ]);

        // dd($request);
        if($request->hasFile('feature_image')){
            $fileNameWithExt = $request->file('feature_image')->getClientOriginalName();
            // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('feature_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload
            $upload_path = $request->file('feature_image')->storeAs('images', $fileNameToStore,'public_upload');
            $upload_path = 'uploads'.'/'.$upload_path;
            $cmsoption->feature_image= $fileNameToStore;
        }
        $mystring = $request->option_title;
        $resultstring = str_replace(' ', '-', $mystring);
        $cmsoption->option_title = $resultstring;
        $cmsoption->option_key = $request->input('option_key');
        $cmsoption->option_value = $request->input('option_value');
        $cmsoption->group = $request->group;
        $cmsoption->autoload = $request->autoload;
        $cmsoption->save();
        return redirect()->route('cmsoption.index')->with('success', 'Option Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $cmsoption)
    {

        $form = "edit";
        return view('backend.cmsoption.form', compact('form', 'cmsoption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $cmsoption)
    {
        // $validatedData = $request->validate([
        //     'optionname' => 'required',
        //     'option_title' => 'required'
        // ]);
        $mystring = $request->option_key;
        $resultstring = str_replace(' ', '', $mystring);
        $cmsoption->option_key = $resultstring;
        $cmsoption->option_title = $request->option_title;
        $cmsoption->option_value = $request->input('option_value');
        $cmsoption->group = $request->group;
        $cmsoption->autoload = $request->autoload;
        $cmsoption->update();
        return redirect()->route('cmsoption.index')->with('success', 'Option Created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $cmsoption)
    {
        $cmsoption->delete();
        return redirect()->route('cmsoption.index')->with('success', 'Option Deleted Successfully');

    }
    public function group(Request $request)
    {
        $data = Option::select("group as name")->where("group", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}
