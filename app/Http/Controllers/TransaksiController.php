<?php

namespace App\Http\Controllers;

use App\Models\Detailpesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function pending()
    {
        $title = "Pending";
        $i = 1;
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('id', 'desc')->get();
            }
            
        return view('transaksi.pending', compact('title', 'i', 'pesanan'));
    }

    public function editPending(Request $request)
    {
        $pesanan = Pesanan::where('id', $request->id)->first();
        $pesanan->status = $request->status;
        $pesanan->update();
        return redirect()->back();
    }

    public function cariPesanan(Request $request)
    {

    }

    public function lunas()
    {
        $title = "Lunas";
        $i = 1;
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->get();
            }
            
        return view('transaksi.lunas', compact('title', 'i', 'pesanan'));
    }

    public function terkirim()
    {
        $title = "Terkirim";
        $i = 1;
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 3)->orderBy('id', 'desc')->get();
            }
            
        return view('transaksi.terkirim', compact('title', 'i', 'pesanan'));
    }

}