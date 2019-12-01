<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
        $categories = Category::all();

        //$select = Category::pluck('name', 'id');

        return view('admin.createproduct')->with('category', $categories);


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
            'quantity' => 'required',
            'display_image' => 'image|nullable|max:1999'
        ]);

        //handling file upload

        if($request->hasFile('display_image')){
            //get file name with extension
            $filenameWithExt = $request->file('display_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('display_image')->getClientOriginalExtension();
            //Create a file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image

            $path = $request->file('display_image')->storeAs('public/display_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->maker = $request->input('maker');
        $product->flavor = $request->input('flavor');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->strength = $request->input('strength');
        $product->quantity = $request->input('quantity');
        $product->display_image = $fileNameToStore;

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
        $categories = Category::all();
        $select = array();

        foreach ($categories as $category) {
           $select[$category->id] = $category->name;
        }
        return view('admin.editproduct')->with('product', $products)->withCategories($select);
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

         if($request->hasFile('display_image')){
            //get file name with extension
            $filenameWithExt = $request->file('display_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('display_image')->getClientOriginalExtension();
            //Create a file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image

            $path = $request->file('display_image')->storeAs('public/display_images', $fileNameToStore);
        }
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->maker = $request->input('name');
        $product->flavor = $request->input('flavor');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->strength = $request->input('strength');
        $product->quantity = $request->input('quantity');

        if($request->hasFile('display_image')){
            $product->display_image = $fileNameToStore;
        }
        $product->save();

        return redirect('/listedproducts')->with('update', 'Product Updated');


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

    //front page view
    public function viewer()
    {
        //$product = DB::select('select * from products );
        //$products = Product::all();
        //$products = Product::orderBy('created_at','desc')->get();
        $products = Product::orderBy('created_at','desc')->paginate(9);
        return view('pages.collections')->with('products', $products);
    }

    // public function sortBy($sort)
    // {
    //     //$product = DB::select('select * from products );
    //     //$products = Product::all();
    //     //$products = Product::orderBy('created_at','desc')->get();

    //     $product = Product::orderBy('name', 'desc');
    //     $products = Product::orderBy('created_at','desc')->paginate(10);
    //     return view('admin.productsview')->with('products', $products);
    // }


}
