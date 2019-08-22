<?php

namespace App\Modules\Property\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Property\Requests\PropertyRequest;
use App\Modules\Property\Requests\PropertyUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Modules\Property\Models\Property;


class PropertyController extends Controller
{
    protected $property;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
     
    }
    public function index(Request $request)
    {
        $property = new Property;
        $search = $property->query();
        if ($name = $request->name) {
            $search->where('name', 'like', '%' . $name . '%');
         }
        $properties = $search->orderBy('id', 'desc')->paginate(10);

        return view("Property::index",compact('properties', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Property::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
      
        $property = new Property();
        $property->name = $request->input('name');
        $property->save();
        return redirect(route('indexProperty',$request->session()->flash('success', 'Property  Created successfully')));
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
        $data= $this->property->find($id);
        return view("Property::edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
       // dd($request->all());
     
        $property->name = $request->input('name');
        $property->update();
        return redirect(route('indexProperty',$request->session()->flash('success', 'Property Updated Successsfully')));


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect(route('indexProperty',$request->session()->flash('success', 'Property Deleted Successsfully')));
    }
}
