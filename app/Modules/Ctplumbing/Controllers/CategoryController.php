<?php

namespace App\Modules\Ctplumbing\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;

class CategoryController extends Controller
{
    protected $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }
    public function getProductByCategory($id)
    {
        $data = $this->products->where('category_id', $id)->paginate(10);
        return view('Ctplumbing::category', 'data');
    }
}
