<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //admin panel
    public function index()
    {
        $products = Product::with('category','colors')->orderBy('created_at','desc')->get();
        return view('admin/pages/products/index', ['products' => $products]);
    }
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin/pages/products/create', ['categories' => $categories, 'colors' => $colors]);
    }
    public function store(Request $request)
    {
        //validate
        $request->validate(([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'colors' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpg,gif,svg,webp|max:2048',
        ]));
        //store image
        $image_name = 'products/' . time() . rand(0, 9999) . "." . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);
        
        //store
$product =  Product::create([
    'title'=>$request->title,
    'price'=>$request->price * 100,
    'category_id'=>$request->category_id,
    'description'=>$request->description,
    'image'=>$image_name,
]);

$product->colors()->attach($request->colors);
        //return
        return back()->with('success','Product Save');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();
        return view('admin/pages/products/edit', ['categories' => $categories, 'colors' => $colors, 'product'=>$product]);
    }
    public function update(Request $request,$id)
    {
         //validate
         $request->validate(([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'colors' => 'required',
            'image' => 'image|mimes:jpg,png,jpg,gif,svg,webp|max:2048',
        ]));

        $product = Product::findOrFail($id);
        //store image
        $image_name = $product->image;
        if($request->image){
            $image_name = 'products/' . time() . rand(0, 9999) . "." . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public', $image_name);

        }
        
        //store
$product->update([
    'title'=>$request->title,
    'price'=>$request->price * 100,
    'category_id'=>$request->category_id,
    'description'=>$request->description,
    'image'=>$image_name,
]);

$product->colors()->sync($request->colors);
        //return
        return back()->with('success','Product Save');
    }
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success','Product Deleted');
    }
}