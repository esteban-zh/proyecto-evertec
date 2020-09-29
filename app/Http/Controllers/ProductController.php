<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product($request->validated());

        $product->picture = $request->file('picture')->store('img', 'public');
        $product->status = $request->status;
        $product->description = $request->description;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('home')->with('status', "el producto {$product->name} fue creado con exito");
        // $validatedData = $request->validate([
        //     'name' => 'required|min:3|max:80',
        //     'picture' => 'image',
        //     'price' => 'required|numeric|min:0',
        // ]);

        // $product = new Product;

        // $product->name = $validatedData['name'];
        // $product->price = $validatedData['price'];
        // $product->picture = $request->file('picture')->store('img', 'public');

        // $product->save();
        // return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Product $product)
    public function update(SaveProductRequest $request, Product $product)
    {

        if ($request->hasFile('picture')) {
            Storage::delete($product->picture);
            // $product->update($request->validated());
            $product->fill($request->validated());
            $product->picture = $request->file('picture')->store('img', 'public');
            //$product->save();
        }
        $product->save();
        //return redirect()->route('home');
        return redirect()->route('home')->with('status', "el producto {$product->name} fue actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->picture);
        $product->delete();
        return redirect()->route('home'); //->with('status', "el producto {$product->name} fue actualizado");

    }
}
