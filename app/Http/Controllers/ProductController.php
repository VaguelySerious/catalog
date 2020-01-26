<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('product', ['product' => []]);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/products');
    }

    public function show($id)
    {
        return view('product', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('product', ['product' => Product::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update($request->all());
        return redirect('/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
