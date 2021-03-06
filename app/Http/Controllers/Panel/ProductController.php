<?php

namespace App\Http\Controllers\Panel;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ImportRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProductRequest;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('products.index', ['products' => $products]);
        // if (auth()->user()->hasRole('Admin')) 
        // {
        //     $products = Product::all();
        //     dd($products);
        // } 
        // else 
        // {
        //     $products = auth()->user()->products;           
        // }
        // return view('products.index', ['products' => $products]);
        
    }

     public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
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
        $product->description = $request->description;
        $product->status = $request->status;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->route('home')->with('status', "el producto {$product->name} fue creado con exito");
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
    public function update(SaveProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        if ($request->hasFile('picture')) {
            Storage::delete($product->picture);
            $product->fill($request->validated());
            $product->picture = $request->file('picture')->store('img', 'public');
        }
        $product->save();

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
        return redirect()->back();
    }

     public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

     public function import(ImportRequest $request, ProductsImport $productsImport) 
    {
        $productsImport->import($request->importFile);
        return redirect()->back()->with('status', "productos importados con exito!!");
    }
}
