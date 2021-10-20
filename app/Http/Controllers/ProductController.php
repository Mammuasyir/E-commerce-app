<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\kategory;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



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
            // echo"TERLARANG";
            // return;
        }
        $title = "List Product";
        $i = 1;
        
        $products = Product::orderBy('id', 'desc')->paginate(5);
            return view('product.index', compact('title', 'products', 'i')
        );
        
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
        $kategory = kategory::all();
        $i = 1;
        $product = product::all();
        return view('product.create', [
            'product' => $product,  
            'title' => $title,
            'kategory' => $kategory,
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
                'kategori_id' => $request->kategori_id,
                'Price' => $request->Price,
                'status' => $request->status,
                'quantity' => $request->quantity,
                'weight' => $request->weight,
                'image' => $request->file('image')->store('image-product'),
                'slug' =>Str::slug($request->name_product,'-'),
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
        $kategory = kategory::all();
        $product = Product::findOrFail($id);
        return view('product.edit', [
            'product' => $product,
            'kategory' => $kategory,
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
            'kategori_id' => $request->kategori_id,
            'Price' => $request->Price,
            'status' => $request->status,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            // 'image' => $request->file('image')->store('image-product'),
            'slug' =>Str::slug($request->name_product,'-'),
        ]);
        return redirect()->route('product.index')->with('success', 'Data berhasil diapa2in.');
    } else {
            $product = Product::findOrfail($id);
            Storage::delete($product->image);
            $product->update([
                'name_product' => $request->name_product,
                'kategori_id' => $request->kategori_id,
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
    
    public function search(Request $request)
    {
        $title = 'List Produk';
        $keyword = $request->search;
        $products = Product::where('name_product', 'like', "%" . $keyword . "%") 
        ->orWhere('status', 'like', "%" . $keyword . "%")
        ->orWhere('Price', 'like', "%" . $keyword . "%")->paginate(5);
        return view('product.index', compact('products','title'));
    }

    
}
// Tugas 1 ketika hapus data gambarnya juga harus kehapus !
// tampilkan landing page di halaman laravel
// buat halaman edit


