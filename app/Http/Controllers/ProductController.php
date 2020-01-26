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
        return view('product', ['product' => [], 'creating' => true]);
    }

    public function store(Request $request)
    {
        // TODO validate
        Product::create($request->all());
        return redirect('/products');
    }

    public function show($id)
    {
        return $this->edit($id);
    }

    public function edit($id)
    {
        return view('product', ['product' => Product::findOrFail($id), 'creating' => false]);
    }

    public function update(Request $request, $id)
    {
        // TODO validate
        Product::where('id', $id)->update($request->all());
        return redirect('/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
