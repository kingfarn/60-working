<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'sell_price' => 'required|integer',
            'cost_price' => 'required|integer',
            'stock' => 'required|integer'
        ]);

        try {
            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'sell_price' => $request->sell_price,
                'cost_price' => $request->cost_price,
                'stock' => $request->stock
            ]);
            return redirect('/products/')->with(['success' => '<strong>' . $product->title . '</strong> product was created ']);
        } catch (\Exception $e) {
            return redirect('/products/')->with(['error' => $e->getMessage()]);
        }
    }



    public function update(Request $request, $id)
    {
        $product = Product::findOrfail($id);
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'sell_price' => $request->sell_price,
            'cost_price' => $request->cost_price,
            'stock' => $request->stock
        ]);
        return redirect('/products/')->with(['success' => '<strong>' . $product->title . '</strong> updated']);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products/')->with(['success' => '</strong>' . $product->title . '</strong> deleted']);
    }
}
