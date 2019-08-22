<?php
namespace App\Http\Controllers;

use App\Modules\Products\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use App\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->take(4)->get();

        $topcategpries = Products::orderBy('id', 'desc')->take(4)->get();

        $sliders= Slider::orderBy('id', 'desc')->take(3)->get();


        //print_r($products);exit;

        return view('home', compact('products', 'topcategpries', 'nav','sliders'));
    }

    public function menu()
    {
        return view('menu');
    }


}
