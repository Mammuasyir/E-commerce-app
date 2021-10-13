<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            // abort(404);
            echo"TERLARANG";
            return;
        }
        $title = "List Product";
        $i = 1;
        $product = product::all();
        return view('product.product', [
            'product' => $product,  
            'title' => $title,
            'i' => $i,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role !== 'Admin'){
            // abort(404);
            echo"TERLARANG";
            return;
        }
        $title = "Create Product";
        $i = 1;
        $product = product::all();
        return view('product.create', [
            'product' => $product,  
            'title' => $title,
            'i' => $i,
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
        // return dd($request);
        
            Product::create([
                'name_product' => $request->name_product,
                'Price' => $request->Price,
                'status' => $request->status,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
                'image' => $request->file('image')->store('image-product'),
                
            ]);

            return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan.');
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = "Edit Product";
        $product = Product::findOrFail($id);
        return view('product.edit', [
            'product' => $product,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return dd($request);
        if(empty($request->file('image'))) {
        $product = Product::findOrfail($id);
        $product->update([
            'name_product' => $request->name_product,
            'Price' => $request->Price,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            // 'image' => $request->file('image')->store('image-product'),
        ]);
        return redirect()->route('product.index')->with('success', 'Data berhasil diapa2in.');
    } else {
            $product = Product::findOrfail($id);
            Storage::delete($product->image);
            $product->update([
                'name_product' => $request->name_product,
                'Price' => $request->Price,
                'status' => $request->status,
                'quantity' => $request->quantity,
                'weight' => $request->weight,

                'image' => $request->file('image')->store('image-product'),
            ]);
            return redirect() ->route('product.index')->with('success', 'Data berhasil diapa2in.');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::where('id', $id)->first();
        Storage::delete($product->image);
        Product::findOrFail($id)->delete();
        return redirect()->route('product.index')->with('success', 'Data berhasil dimusnahkan.');
    }
}
// Tugas 1 ketika hapus data gambarnya juga harus kehapus !
// tampilkan landing page di halaman laravel
// buat halaman edit