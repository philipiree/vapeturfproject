<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product = DB::select('select * from products );
        //$products = Product::all();
        //$products = Product::orderBy('created_at','desc')->get();
        $products = Product::orderBy('created_at','desc')->paginate(10);
        return view('admin.productsview')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createproduct');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'maker' => 'required',
            'flavor' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'strength' => 'required',
            'quantity' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->maker = $request->input('maker');
        $product->flavor = $request->input('flavor');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->strength = $request->input('strength');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect('/listedproducts')->with('success', 'Product Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);

        return view('admin.productshow')->with('product', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products = Product::find($id);

        return view('admin.editproduct')->with('product', $products);
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
        //
        $this->validate($request, [
            'name' => 'required',
            'maker' => 'required',
            'flavor' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'strength' => 'required',
            'quantity' => 'required'
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->maker = $request->input('name');
        $product->flavor = $request->input('flavor');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->strength = $request->input('strength');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect('/listedproducts')->with('success', 'Product Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/listedproducts')->with('error','Successfully Deleted');


    }
}
