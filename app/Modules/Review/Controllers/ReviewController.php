<?php

namespace App\Modules\Review\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Review\Requests\ReviewRequest;
use Illuminate\Support\Facades\Session;
use App\Category;
use Illuminate\Support\Facades\Redirect;
use App\Modules\Review\Models\Review;
use App\Modules\Customer\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Modules\Products\Models\Products;
use willvincent\Rateable\Rating;
class ReviewController extends Controller
{
    protected $review;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Review $review,Products $product, Rating $rating) 
    {
     
        $this->review = $review;
        $this->product = $product;
        $this->rating = $rating;
   
    }

   

    public function index()
    {
        return view("Review::index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {    
           $review= new Review;
           $data=$request->except('_token');
           if($this->review->create($data)){
           return Redirect::back()->with('success','Thank for your review !');
                 } 
    }


        /**
     * Create and Update  Rating Products
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Products\Models\Products
     * @return \Illuminate\Http\Response
     */

    public function rating(Request $request)
    {

        request()->validate(['rate' => 'required']);
      
        $newRating = $request->input('rate');

        $rating = Rating::where([
            ['customer_id', $request->customer_id],
            ['rateable_id', $request->id]
        ])->first();

        if(!$rating){

            $products = Products::find($request->id);

            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
    
            $rating->customer_id = $request->customer_id;
    
            $products->ratings()->save($rating);

        }else{
            $rating->update(['rating'=>$newRating]);
        }
       
        return back();

    }


}
