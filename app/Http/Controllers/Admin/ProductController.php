<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

   
    public function create()
    {
        
        return view('admin.product.create');
    }

   
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required | min:3',
            'price' => 'required'
        ]);

        $product = new Product();

        $product->title       = $request->title;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;
        $product->description = $request->description;

        if($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName  = time().'.'.$extension;
            $file->move('upload/productImages/', $fileName);
            $product->image = $fileName;

        }
        $product->save();

        return redirect()->route('products.index')->with('message', 'Product Create Successfully');
        
    }

   
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', [
            'product' => $product
        ]);
    }

   
    public function edit($id)
    {

        $product = Product::find($id);

        return view('admin.product.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        $product->title       = $request->title;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;
        $product->description = $request->description;

        if($request->hasFile('image'))
        {

        $oldImage = 'upload/productImages/'.$product->image;

        if(File::exists($oldImage))
        {
            File::delete($oldImage);
        }

        $file      = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName  = time().'.'.$extension;
        $file->move('upload/productImages/', $fileName);
        $product->image = $fileName;
        }

        $product->save();

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product Deleted Successfully');
    }

    //show order
    public function showOrder()
    {
        $orders = Order::all();

        return view('admin.product.showOrder', [
            'orders' => $orders
        ]);
    }

    //update status
    public function updateStatus($id)
    {
        $order = Order::find($id);
        $order->status = 'Done';
        $order->save();

        return redirect()->back();
    }


    //search admin product
    public function productSearch(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'like', '%'.$search.'%')->get();
        // return $products;
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

}
