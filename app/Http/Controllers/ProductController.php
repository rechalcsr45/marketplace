<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'description' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'required',
        ]);
        return redirect()->route('product.index')->with(['success' => 'Produk Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::findOrFail($id);

        //render view with job
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kd_product' => 'required|unique:products,kd_product',
            'name_product' => 'required',
            'description' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required',
        ]);
        return redirect()->route('product.index')->with(['success' => 'Produk Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
