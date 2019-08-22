<?php

namespace App\Modules\Products\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Modules\Products\Models\Products;
use App\Http\Traits\UploadTrait as Upload;
use App\Modules\Products\Requests\ProductRequest;
use App\Modules\Category\Models\CategoriesProperties;
use App\Modules\Products\Requests\ProductUpdateRequest;

class ProductsController extends Controller
{
    use Upload;
    protected $product;
    protected $category;
    public function __construct(Products $product, Category $category) //ICategoryproduct $categoryproduct)
    {
        //$this->middleware('auth');
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * show product in table
     *
     * @return void
     */
    public function index(Request $request)
    {
        $products = new Products;
        $search = $products->query();
        if ($product_name = $request->product_name) {
            $search->where('product_name', 'like', '%' . $product_name . '%');
        }
        $products = $search->orderBy('id', 'desc')->paginate(5);
        return view('Products::index', compact('products', 'request'));
    }

    /**
     * show create form
     *
     * @return void
     */
    public function create(Request $request)
    {
       $category_id = $request->cid;
        $form = 'create';
        $props = CategoriesProperties::join('properties as p', 'p.id', '=', 'categories_properties.property_id')
        ->where('category_id', $request->cid)
        ->get();
        return view("Products::create", compact('form', 'category_id', 'props'));
    }
    /**
     * store data in database
     * upload image
     *
     * @param productRequest $request
     * @return void
     */
 public function store(ProductRequest $request)
    {

       // dd($request->all());
        $market_price = $request->input('market_price');
        $selling_price = $request->input('discount');
        $discount_amount = $market_price - $selling_price;
        $discount_percent = ($discount_amount / $market_price) * 100;
        $products = new Products;
        
        $data = $request->except('_token','label','value','image');
    
        $data['discount_percent'] = $discount_percent;
        if ($p = $this->product->create($data)) {

            $ar = [];
            $arrayimage = [];
            $labels = $request->label;
            $values =  $request->value;
            $pid = $p->id;

            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $file) {
                    $fileNameWithExt =  $file->getClientOriginalName();
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension =  $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $upload_path = $file->storeAs('images', $fileNameToStore, 'public_upload');

                    $upload_path = 'uploads' . '/' . $upload_path;

                    $data['image'] = $fileNameToStore;
                    
                    array_push($arrayimage, ['product_id'=>$pid,'image'=>$data['image']]);
                }
                DB::table('images')->insert($arrayimage);
            }
             else {
                $fileNameToStore = '';
            }
         

            for($i=0; $i < count($labels); $i++){
                array_push($ar, ['product_id'=>$pid, 'label'=> $labels[$i], 'value'=>$values[$i]]);

            }
            DB::table('products_properties')->insert($ar);
            return redirect(route('product.index', $request->session()->flash('success', 'Products Added successfully')));
        } else {
            $request->session()->flash('message', 'failed');
            return redirect(route('product.index'));
        }
    }


    //show Edit form
    public function edit(Request $request, $id)
    {
       
        $data = $this->product->find($id);
        $categories=  Category::all();
      
        //properties of product
        $properties = DB::table('products_properties')->where('product_id', $id)->orderBy('label')->get();

        $relatedimages = DB::table('images')->where('product_id', $id)->orderBy('image')->get();
        //all the properties of related category

        // dd($properties);
        $props = CategoriesProperties::join('properties as p', 'p.id', '=', 'categories_properties.property_id')
        ->where('category_id', $data->category_id)
        ->orderBy('name')
        ->get();

        $ar = [];
        $pr = [];
        foreach($properties as $p){
            array_push($ar, $p->label);
            $pr[$p->label] = $p->value;
        }
        return view("Products::edit", compact('categories','data','props', 'ar', 'properties','pr','relatedimages'));
    }

    /**
     * update function
     *
     * @param Request $request
     * @param [int] $id
     * @return void
     */
    public function update(ProductUpdateRequest $request, $id)
    {
  
        $market_price = $request->input('market_price');
        $selling_price = $request->input('discount');

        $discount_amount = $market_price - $selling_price;

        $discount_percent = ($discount_amount / $market_price) * 100;

        $products = Products::find($id);
        $dataa = $request->except('_token','label','value','image');
      
        $dataa['discount_percent'] = $discount_percent;

        if ($p = $products->update($dataa)) {
            $ar = [];
            $arrayimage = [];
            $labels = $request->label;
            $values =  $request->value;
            $pid = $products->id;
            DB::delete("delete from products_properties where product_id=".$id);
            if ($request->hasFile('image')) {
                $dataa['image'] = $fileNameToStore;
                DB::delete("delete from images where product_id=".$id);
                $files = $request->file('image');
                foreach ($files as $file) {
                    $fileNameWithExt =  $file->getClientOriginalName();
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension =  $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $upload_path = $file->storeAs('images', $fileNameToStore, 'public_upload');

                    $upload_path = 'uploads' . '/' . $upload_path;

                    $data['image'] = $fileNameToStore;
                    
                    array_push($arrayimage, ['product_id'=>$pid,'image'=>$data['image']]);
                }
                DB::table('images')->insert($arrayimage);
            }
             else {
                  $fileNameToStore = $products->image;

                
            }
         
          // no need to update
          $ar = [];
          $labels = $request->label;
          $values =  $request->value;
  
          for($i=0; $i < count($labels); $i++){
              array_push($ar, ['product_id'=>$id, 'label'=> $labels[$i], 'value'=>$values[$i]]);

          }
          DB::table('products_properties')->insert($ar); 
            return redirect(route('product.index', $request->session()->flash('success', 'Products  Updated successfully')));
        } else {
            return view('Products::edit', $request->session()->flash('message', "Failed"));
        }
    }
    /**
     * softDelete row
     *
     * @param [int] $id
     * @return void
     */
    //Show
    public function show($id)
    {
        $categories = $this->category->getAll();
        $product = $this->product->find($id);
        return view("Products::show", compact('product', 'categories'));
    }


    public function destroy(Request $request, $id)
    {

        $product = Products::find($id);
        $product->delete();
        return redirect(route('product.index', $request->session()->flash('success', 'Product Deleted Successsfully')));
    }

    public function chooseCategory(){

        $categories = $this->category->get();
        return view("Products::chooseCategory", compact('categories'));
    }
}
