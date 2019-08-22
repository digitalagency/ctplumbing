<?php

namespace App\Modules\Slider\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Slider\Requests\SliderRequest;
use App\Modules\Slider\Requests\SliderUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Modules\Slider\Models\Slider;

class SliderController extends Controller
{
    protected $slider;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
     
    }
    public function index(Request $request)
    {

        $slider = new Slider;

        $search = $slider->query();
        if ($title = $request->title) {
            $search->where('title', 'like', '%' . $title . '%');
        }
        $sliders = $search->orderBy('id', 'desc')->paginate(10);
        return view('Slider::index', compact('sliders', 'request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("Slider::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
       
        $sliders= new Slider;
       
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $sliders->image = $fileNameToStore;
        }
        else{
             $fileNameToStore= '';
        }

      $data=$request->except('_token');
      $data['image']=$fileNameToStore;
      
        if($this->slider->create($data)){
            return redirect(route('indexSlider',$request->session()->flash('success', 'Slider Added successfully')));
        } else{
            $request->session()->flash('message', 'failed');
         return redirect(route('indexSlider'));
        } 

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
    public function edit($id)
    {
        $data= $this->slider->find($id);
        return view("Slider::edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $sliders=Slider::find($id);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $sliders->image = $fileNameToStore;
        }
        else{
            $fileNameToStore= $sliders->image;
        }
      $dataa=$request->except('_token');
      $dataa['image']=$fileNameToStore;
        if($sliders->update($dataa)){
            return redirect(route('indexSlider',$request->session()->flash('success', 'Slider  Updated successfully')));
        } else {
            return view('Slider::edit', $request->session()->flash('message', "Failed"));
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sliders = Slider::find($id);
        $sliders->delete();
        return redirect(route('indexSlider',$request->session()->flash('success', 'Slider Deleted Successsfully')));
        
    }
}
