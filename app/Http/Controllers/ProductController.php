<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('id_produk', 'nama_produk', 'stok', 'nama_kategori')
            ->get();

        return view("products/index")->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('id_produk', 'nama_produk', 'stok', 'nama_kategori', 'kategori.id_kategori')
            ->get();
        return view("products/create")->with([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required'
        ]);

        Product::create([
            'nama_produk' => $request->nama,
            'id_kategori' => $request->kategori,
            'stok' => $request->stok
        ]);

        return redirect()->route('product.index')->with('Berhasil', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = Product::join('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->select('nama_kategori', 'kategori.id_kategori')
            ->get();
        $kategori = Product::Join('kategori', 'produk.id_kategori', '!=', 'kategori.id_kategori')
            ->distinct()
            ->select('nama_kategori', 'kategori.id_kategori')
            ->get();

        return view('products.edit', compact('product', 'data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required'
        ]);

        $product->update([
            'nama_produk' => $request->nama,
            'id_kategori' => $request->kategori,
            'stok' => $request->stok
        ]);

        return redirect()->route('product.index')->with('Berhasil', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('Berhasil', "Data berhasil dihapus");
    }
}
