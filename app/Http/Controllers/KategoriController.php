<?php

namespace App\Http\Controllers;

use App\Models\kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'Admin'){
            abort(404);
        }
        $title = "List Kategori";
        $i = 1;
        $kategory = kategory::orderBy('id', 'desc')->paginate(5);
            return view('kategory.index', compact('title', 'kategory', 'i')
        );
    }


public function addKategori(Request $request)
{
    // return dd($request);
    kategory::create([
        'nama_kategori' => $request->nama_kategori,
        'slug'          => Str::slug($request->nama_kategori,'-'),
    ]);
    return redirect()->back();
}


public function editKategori(Request $request, $id)
{
        
            kategory::findOrfail($id)->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' =>Str::slug($request->nama_kategori,'-'),
        ]);
    return redirect()->back();
}

public function delKategori($id)
    {
        // return dd($id);
        kategory::findOrFail($id)->delete();
        return redirect()->back();
    }

}