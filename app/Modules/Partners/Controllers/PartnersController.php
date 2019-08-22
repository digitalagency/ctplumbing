<?php

namespace App\Modules\Partners\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Partners\Requests\PartnersRequest;
use App\Modules\Partners\Requests\PartnersUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Modules\Partners\Models\Partners;

class PartnersController extends Controller
{
    protected $partners;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Partners $partners)
    {
        $this->partners = $partners;
     
    }
  
    public function index(Request $request)
    {

      
        $partner = new Partners;

        $search = $partner->query();
        if ($title = $request->title) {
            $search->where('title', 'like', '%' . $title . '%');
        }
        $partners = $search->orderBy('id', 'desc')->paginate(10);
        return view('Partners::index', compact('partners', 'request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $form = 'create';

        return view("Partners::create", compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnersRequest $request)
    {
        $partners= new Partners;
       
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $partners->image = $fileNameToStore;
        }
        else{
             $fileNameToStore= '';
        }

      $data=$request->except('_token');
      $data['image']=$fileNameToStore;
      
        if($this->partners->create($data)){
            return redirect(route('indexPartners',$request->session()->flash('success', 'Partners Added successfully')));
        } else{
            $request->session()->flash('message', 'failed');
         return redirect(route('indexPartners'));
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
        $data= $this->partners->find($id);


        return view("Partners::edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnersUpdateRequest $request, $id)
    {
        $partners=Partners::find($id);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $partners->image = $fileNameToStore;
        }
        else{
            $fileNameToStore= $partners->image;
        }
      $dataa=$request->except('_token');
      $dataa['image']=$fileNameToStore;
        if($partners->update($dataa)){
            return redirect(route('indexPartners',$request->session()->flash('success', 'Partners  Updated successfully')));
        } else {
            return view('Partners::edit', $request->session()->flash('message', "Failed"));
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
        $partners = Partners::find($id);
        $partners->delete();
        return redirect(route('indexPartners',$request->session()->flash('success', 'Partners Deleted Successsfully')));
    }
}
