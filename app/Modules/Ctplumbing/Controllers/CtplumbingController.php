<?php

namespace App\Modules\Ctplumbing\Controllers;

use DB;
use App\Page;
use App\Category;
use App\MenuItems;
use App\Testimonial;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;
use App\Http\Controllers\Controller;
use App\Modules\Review\Models\Review;
use App\Modules\Slider\Models\Slider;
use Illuminate\Support\Facades\Input;
use App\Modules\Products\Models\Images;
use Illuminate\Support\Facades\Session;
use App\Modules\Partners\Models\Partners;
use App\Modules\Products\Models\Products;
use Illuminate\Support\Facades\Validator;
use App\Contact;


class CtplumbingController extends Controller
{
        public function __construct(Products $product, Rating $rating)
        {
        $this->product = $product;
        $this->rating = $rating;

        }
    public function showPage( $slug){

        if($data = Page::where('slug', $slug)->first()){
            return view('Ctplumbing::page', compact('data'));
        }else{

            return redirect()->back();
        }

    }


//    this is how i do
    public function index()
    {
        $products = $this->product->orderBy('id', 'desc')->take(4)->get();

        $topcategpries = $this->product->orderBy('id', 'desc')->take(12)->get();


        $sliders = Slider::orderBy('id', 'desc')->take(3)->get();

        $testomonials = Testimonial::orderBy('id', 'desc')->take(3)->get();

        $partners = Partners::orderBy('id', 'desc')->take(6)->get();

        $promotions =  $this->product->orderBy('id', 'desc')->take(3)->get();

       //print_r($topcategpries);exit;

        return view("Ctplumbing::home", compact('products', 'testomonials', 'topcategpries', 'partners', 'promotions', 'nav', 'sliders'));
    }

    public function product_show($id)
    {
        $partners = Partners::orderBy('id', 'desc')->take(6)->get();

        $products = Products::find($id);

        $images = DB::table('images')->where('product_id', $id)->get();

        $related_products = Products::where('category_id', $products->category_id)->get();

        $reviews =  Review::all();

        $props = DB::table('products_properties')->where('product_id', $id)->get();

        return view("Ctplumbing::product-details")->with(compact('images','props','products', 'reviews', 'id', 'related_products', 'partners'));
    }

    public function Interested_Not_Interested(Request $request)
    {
        $product = $this->product->find($request->id);
        if ($product->interested == 1) {
            $product->update(['interested' => 0]);
        } else {
            $product->update(['interested' => 1]);
        }
        return back();
    }
        /**
     * Update Rating Post
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function rating(Request $request)
    {
        $newRating = $request->input('rate');
        $rating = Rating::where([
            ['customer_id', $request->customer_id],
            ['rateable_id', $request->id]
        ])->first();

        if(!$rating){

            $post = Products::find($request->id);

            $rating = new \willvincent\Rateable\Rating;

            $rating->rating = $request->rate;

            $rating->customer_id = $request->customer_id;

            $post->ratings()->save($rating);

        }else{
            $rating->update(['rating'=>$newRating]);
        }

      return back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request, $slug)
    {

        $cat_id = Category::getIdBySlug($slug);

        if($filter = $request->sortby){
            switch($filter){
                case 'latest':
                $products  = $this->getCategory($cat_id)->orderBy('id', 'DESC')->paginate(12);
                break;
                case 'lowPrice':
                $products  = $this->getCategory($cat_id)->orderBy('discount', 'ASC')->paginate(12);
                break;
                case 'highPrice':
                $products  = $this->getCategory($cat_id)->orderBy('discount', 'DESC')->paginate(12);
                break;
                default:
                $products  = $this->getCategory($cat_id)->paginate(12);
            }
        }else{

                $products  = $this->getCategory($cat_id)->paginate(12);

                // $products = Products::where('category_id', $images->image)->first();

               // dd($products);
        }
            $links = "category/".$slug;
            $link = MenuItems::where('link', $links)->first();

            $categories = MenuItems::where('parent', $link->parent)->get();


        return view("Ctplumbing::category", compact('products','categories', 'slug'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchProduct(Request $request)
    {
        if($filter = $request->sortby){
            switch($filter){
                case 'latest':
                $products  = $this->getProductByName($request->txt)->orderBy('id', 'DESC')->paginate(12);
                break;
                case 'lowPrice':
                $products  = $this->getProductByName($request->txt)->orderBy('discount', 'ASC')->paginate(12);
                break;
                case 'highPrice':
                $products  = $this->getProductByName($request->txt)->orderBy('discount', 'DESC')->paginate(12);
                break;
                default:
                $products  = $this->getProductByName($request->txt)->paginate(12);
            }
        }else{
            $products = $this->getProductByName($request->txt)->paginate(12);
        }

        $categories = MenuItems::all()->random(10);
        $txt = $request->txt;
        return view("Ctplumbing::searchResult", compact('products','categories', 'txt'));
    }

    public function getProductByName($name) {
        return Products::Where('product_name', 'like', '%' . $name. '%');
    }


/**
 * Get Products by Category
 */
    public function getCategory($cat_id){
        return Products::where('category_id', $cat_id);
    }

    public function sortByNewestProduct(Request $request, $slug)
    {


        $cat_id = Category::getIdBySlug($slug);
        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        $products  = \DB::table('products')
            ->where('category_id', $cat_id)->orderBy('id', 'DESC')->paginate(4);
        $test = \Request::path();

        $products  = \DB::table('products')
            ->where('category_id', $cat_id)->orderBy('id', 'DESC')->paginate(4);

        $slug = "category/".$slug;
        $link = MenuItems::where('link', $slug)->first();

        $categories = MenuItems::where('parent', $link->parent)->get();


        return view("Ctplumbing::category", compact('aboutus', 'products','categories'));
    }




    public function dsortByNewestProduct()
    {
        $newest  = Products::orderBy('id', 'DESC')->paginate(4);


        return view("Ctplumbing::catsortByNewest-products", compact('newest','products','categories'));


    }

    public function sortByPriceLowToHigh()
    {
        $products  = Products::orderBy('discount', 'DESC')->paginate(4);
    }

    public function sortByPriceHighToLow()
    {
        $products  = Products::orderBy('discount', 'ASC')->paginate(4);
    }



    public function aboutus()
    {
        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        return view('Ctplumbing::contact', compact('aboutus'));
    }

    public function quicklinks()
    {
        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        return view('Ctplumbing::contact', compact('aboutus'));
    }

    public function newsletter()
    {
        $aboutus = Page::orderBy('id', 'desc')->take(1)->get();
        return view('Ctplumbing::contact', compact('aboutus'));
    }

    public function contact()
    {
        return view('Ctplumbing::contact');
    }

    public function Postcontact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $contactus = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message')
    	]);

        session()->put('contactmessage', 'Thank you, We will contact you soon !');
        return view('Ctplumbing::contact',compact('contactus'));

    }

    public function sitemap()
    {

        return view('Ctplumbing::sitemap');
    }
}
