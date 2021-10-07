<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function ganti()
    {
        $title = "Ganti password";
        return view('user.konten.ganti-password',[
        'title' => $title,
        ]);
    }
    public function updatePass(ChangePasswordRequest $request)
    {
        // return dd($request);
        $old_pass = auth()->user()->password;

        if(Hash::check($request->input('old_password'),$old_pass)) {
            return redirect()->back()->with('Success', 'Hore !');

        }else{
            return redirect()->back()->with('Failed', 'Password Gaul !');
        }
    }
}
