<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('trashed')) {
            $products = Product::onlyTrashed()->simplepaginate(10);
        } else {
            $products = Product::simplepaginate(10);
        }

        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        $extension = $request->file('image')->getClientOriginalExtension();

        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileNameWithExt = str_replace(" ", "_", $fileNameWithExt);
    
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $filename = preg_replace("/[^a-zA-Z0-9\s]/", "", $filename);
        $filename = urlencode($filename);
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

        $product = Product::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path
        ]);

        $product->category()->attach($request->category);
     
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit')->with(compact('product'))->with(compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->file('image')!= null) {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileNameWithExt = str_replace(" ", "_", $fileNameWithExt);
        
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $filename = preg_replace("/[^a-zA-Z0-9\s]/", "", $filename);
            $filename = urlencode($filename);
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

            $product->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $path
            ]);

            $product->category()->sync($request->category);
        } else {
            $validated = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $product->update($validated);
            $product->category()->sync($request->category);
        }
    
 
    
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
  
        return redirect()->back();
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }  

    public function restoreAll()
    {
        Product::onlyTrashed()->restore();
  
        return redirect()->back();
    }
}
