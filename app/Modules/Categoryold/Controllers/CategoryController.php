<?php

namespace App\Modules\Category\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modules\Category\Models\Category;
use App\Modules\Property\Models\Property;
use Illuminate\Support\Facades\Validator;
use App\Modules\Category\Requests\CategoryRequest;
use App\Modules\Category\Models\CategoriesProperties;
use App\Modules\Category\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    protected $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Category $category)
    {
         $this->category = $category;
    }
    public function index(Request $request)
    {
        $category = new Category;
        $search = $category->query();
        if ($title = $request->title) {
            $search->where('title', 'like', '%' . $title . '%');
         }
        $categories = $search->orderBy('id', 'desc')->paginate(10);

        return view("Category::index",compact('categories', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Category::create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
            $upload_path = 'uploads' . '/' . $upload_path;
            $category->image = $fileNameToStore;
        }
        else{
             $fileNameToStore= '';
        }
        $data=$request->except('_token');
        $data['image']=$fileNameToStore;
        
          if($this->category->create($data)){
              return redirect(route('indexCategory',$request->session()->flash('success', 'Category Added successfully')));
          } else{
              $request->session()->flash('message', 'failed');
           return redirect(route('indexCategory'));
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
        $data= $this->category->find($id);
        return view("Category::edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $category=Category::find($id);
       if ($request->hasFile('image')) {
           $fileNameWithExt = $request->file('image')->getClientOriginalName();
           $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('image')->getClientOriginalExtension();
           $fileNameToStore = $filename . '_' . time() . '.' . $extension;
           $upload_path = $request->file('image')->storeAs('images', $fileNameToStore, 'public_upload');
           $upload_path = 'uploads' . '/' . $upload_path;
           $category->image = $fileNameToStore;
       }
       else{
           $fileNameToStore= $category->image;
       }
         $dataa=$request->except('_token');
         $dataa['image']=$fileNameToStore;
       if($category->update($dataa)){
           return redirect(route('indexCategory',$request->session()->flash('success', 'Category  Updated successfully')));
       } else {
           return view("Category::edit", $request->session()->flash('message', "Failed"));
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
        $category = Category::find($id);
        $category->delete();
        return redirect(route('indexCategory',$request->session()->flash('success', 'Category Deleted Successsfully')));
    }




    public function setproperties(Request $request, $id) {
   
        $properties = Property::all();
        $old_props = CategoriesProperties::where('category_id',  $id)->get();
        $props = [];
        foreach($old_props as $p){
          array_push($props, $p->property_id);
        }
        
          return view("Category::setproperties", compact('properties', 'id', 'props'));
      }



 public function addpropertiesdetails(Request $request) {
  
    $validator = Validator::make($request->all(),
    [
      'cat_id'=>'required',
    ]);

    if($validator->fails()){
      return back()->withErrors($validator->errors())->withInput();
    }

      $data = $request->only(['properties_id']);

      if( CategoriesProperties::where('category_id',  $request->cat_id)->count() > 0){
        $sql = "delete from categories_properties where category_id=".$request->cat_id;
        DB::delete($sql);
      }
      
      $ar = [];
      
      foreach($data['properties_id'] as $d){
       
        array_push($ar, ['category_id'=>$request->cat_id, 'property_id'=> $d]);
        
      }
      
      if(CategoriesProperties::insert($ar)){
        Session::flash("message", "process success");
      }else{
        Session::flash("message", "process failed");
      }
      return redirect()->back();
       
      
 }

       




}
