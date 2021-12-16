<?php

namespace App\Http\Controllers;

use App\Price;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductViewController extends Controller

{

    public function index($id){
        $product = Product::find($id);
        return view('productView', [
            'product' => $product,
            'prices' => Price::where('product_id',$product->id)->get(),
        ]);
    }



}
