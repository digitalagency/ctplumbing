<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonial = new Testimonial;
        $search = $testimonial->query();
        if ($name = $request->title) {
            $search->where('person_name', 'like', '%' . $name . '%');
        }
        $testimonials = $search->orderBy('id', 'desc')->paginate(10);
        return view('backend.testimonial.index', compact('testimonials', 'request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = 'create';
        return view('backend.testimonial.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'title' => 'required' ,
        //     'designation'=>'required'
        //    ]);
        $testimonial = new Testimonial;
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
            $testimonial->feature_image= $fileNameToStore;
        }
        $testimonial->person_name = $request->person_name;
        $testimonial->slug = $request->slug;
        $testimonial->title = $request->title;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        $testimonial->save();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial Created successfully');

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
    public function edit(Testimonial $testimonial)
    {
        $form ="edit";

        return view('backend.testimonial.form', compact('form','testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Testimonial $testimonial, Request $request)
    {

        if ($request->hasFile('feature_image')) {
            $fileNameWithExt = $request->file('feature_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('feature_image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            // dd($upload_path);
             $testimonial->feature_image	 = $fileNameToStore;
        }

        $testimonial->person_name = $request->input('person_name');
        $testimonial->title = $request->input('title');
        $testimonial->designation = $request->input('designation');
        $testimonial->description = $request->description;
        $testimonial->update();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial Updated Successsfully');
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial )
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial Deleted Successfully');

    }
}
