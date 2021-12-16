<?php

namespace App\Http\Controllers;

use App\Price;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller

{

    public function index(){
        return view('products');
    }


    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Product::get())
                ->addColumn('action', function ($id) {
                    $editText = auth()->check() ? 'Edit' : 'View';
                    $delete = auth()->check() ? '
                    <form action="product/' . $id->id . '/delete" method="POST">
                        ' . csrf_field() . '
                        <button class="btn" type="submit">Delete</button>
                    </form>' : '';
                    return '
                    <a      href="product/' . $id->id . '/'. strtolower($editText) .'" class="btn btn-primary">' . $editText . '</a>'
                        .$delete;
                })->make(true);
        }
    }
//                            <a href="/product/' . $id->id . '/delete" >Delete</a>


    public function edit(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->note = $request->note;
        $product->save();

        $prices = Price::where('product_id',$product->id)->get();
        foreach ($prices as $price){
            $version_key = 'version_'.$price->id;
            $price_key = 'price_'.$price->id;
            if(isset($request->$version_key))
                $price->version = $request->$version_key;
            if(isset($request->$price_key))
                $price->price = $request->$price_key;
            $price->save();
        }
        return redirect()->route('products')->with('success', 'Saved!');
    }

    public function delete($id){
        Product::find($id)->delete();
        return redirect()->route('products')->with('success', 'Deleted!');
    }

    public function add(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->note = $request->note ?? '';
        $product->save();

        return redirect()->route('products')->with('success', 'Added!');
    }

    public function priceAdd(Request $request){
        $this->validate($request, [
            'product_id' => 'required',
            'price' => 'required',
            'version' => 'required'
        ]);

        $price = new Price();
        $price->product_id = $request->product_id;
        $price->price = $request->price;
        $price->version = $request->version ?? '';
        $price->save();

        return back()->with('success', 'Added!');
    }

    public function priceDelete(Request $request){
        $this->validate($request, [
            'price_id' => 'required'
        ]);
        $price = Price::find($request->price_id);
        $product_id = $price->product_id;
        $price->delete();

        return redirect('/product/' . $product_id . '/edit')->with('success', 'Added!');
    }
}
