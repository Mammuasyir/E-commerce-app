<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Detailpesanan;
use App\Models\kategory;
use App\Models\Pesanan;
use App\Models\product;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{


    public function index()
    {
        $products = product::take(4)->orderBy('id', 'desc')->get();
        $kategory = kategory::all();
        return view('landing.yield.index', [
            'products' => $products,
            'kategory' => $kategory,
        ]);
    }

    public function detailproduct($slug)
    {
        $title = "Detail Product";
        $kategory = kategory::all();
        $products = Product::where('slug', $slug)->first();
        return view('landing.yield.detail', [
            'products' => $products,
            'kategory' => $kategory,
            'title' => $title,

        ]);
    }

    public function perKategori($slug)
    {
        $nm_kt = kategory::where('slug', $slug)->first();
        $title = "Kategori $nm_kt->nama_kategori";
        $product = product::where('kategori_id', $nm_kt->id)->get();
        return view('landing.yield.perKategori', [
            'product' => $product,
            'title'  => $title,
            'nm_kt' => $nm_kt,
        ]);
    }

    public function allproduct()
    {
        $title = "All Product";
        $products = product::orderBy('id', 'desc')->get();
        $kategory = kategory::all();
        return view('landing.yield.allproduct', [
            'products' => $products,
            'kategory' => $kategory, 
            'title' => $title,
        ]);
    }

    public function searchall(Request $request)
    {
        $keyword = $request->search;
        $title = "Search All";
        $products = product::where('name_product', 'like', "%" . $keyword . "%")->get();
        $kategory = kategory::all();
        return view('landing.yield.searchall', compact('products', 'title', 'kategory', 'keyword'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function tambah_keranjang(Request $request)
    {
        // return dd($request);
        $harga_detail =  $request->Price * $request->jumlah;

        //cek apakah user punya pesanan utama
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //save atau update pesanan utama
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id'       => Auth::user()->id,
                'status'        => 0,
                'total_harga'   => $harga_detail,
                'kode_pemesanan' => 'terserah',
                'kode_unik'     => mt_rand(100, 999)
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $karakter_kode = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $pesanan->kode_pemesanan = substr(str_shuffle($karakter_kode), 0, 12);
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $harga_detail;
            $pesanan->update();
        }

        //menyimpan data detail pesanan
        if (empty($request->catatan)) {
            Detailpesanan::create([
                'product_id'        => $request->id,
                'pesanan_id'        => $pesanan->id,
                'jumlah_pesanan'    => $request->jumlah,
                'Price'             => $harga_detail,
                'catatan'           => 'Tidak ada komen',
            ]);
            return redirect()->back()->with('Success', 'Berhasil menambahkan product !');
        } else {
            Detailpesanan::create([
                'product_id'        => $request->id,
                'pesanan_id'        => $pesanan->id,
                'jumlah_pesanan'    => $request->jumlah,
                'Price'             => $harga_detail,
                'catatan'           => $request->catatan,
            ]);
            return redirect()->back()->with('Success', 'Berhasil menambahkan product !');
        }
    }

    public function cart()
    {
        $i = 1;
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $details = [];

        if ($pesanan) {
            $details = Detailpesanan::where('pesanan_id', $pesanan->id)->get();
        }
        return view('landing.yield.cart', compact('details', 'i', 'pesanan'));
    }

    public function delcart($id)
    {

        $detail = Detailpesanan::findOrFail($id);
        $product = product::where('id', $detail->product_id)->first();

        if (!empty($detail)) {
            $pesanan = Pesanan::where('id', $detail->pesanan_id)->first();
            $jumlah_pesanan_detail = Detailpesanan::where('pesanan_id', $pesanan->id)->count();
            if ($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            } else {
                $pesanan->total_harga = $pesanan->total_harga - $detail->Price;
                $pesanan->update();
            }

            $detail->delete();
        }
        return redirect()->back()->with('Success', "$product->name_product Telah hilang kayak dia, Hehe!");
    }

    public function checkout()
    {
        $i = 1;
        $title = "Checkout";
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        return view('landing.yield.checkout', compact('pesanan', 'title', 'i'));
    }

    public function editcheckout(Request $request)
    {
        if(Auth::user()) {
            $user = User::where('id', $request->id)->first();
        $user->address = $request->address;
        $user->update();

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        return redirect()->route('landing.history');
        }
        
    }

    public function history()
    {
        $title = "History";
        $i = 1;
        //Nyari user yg pesanannya berdasarkan id
        if(Auth::user()) {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }
            

        
        //Nyari detail pesanan user berdasarkan pesanan ID

        return view('landing.yield.history', compact('title', 'pesanan', 'i'));

    }

    public function searchHistory(Request $request)
    {
        $i = 1;
        $title = "Search History";
        $keyword = $request->search;
        $pesanan = Pesanan::where('kode_pemesanan', 'like', "%" . $keyword . "%")->get();
        return view('landing.yield.history', compact('pesanan','title', 'keyword', 'i'));
    }
}
