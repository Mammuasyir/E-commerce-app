<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $user = User::all();
        $jumlahUser = User::where('role', 'User')->count();
        return view('user.konten.index',[
        'jumlahUser' => $jumlahUser,
        'user' => $user,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $title = "My Profile";
        $user = User::where('username', $username)->first();
        return view('user.konten.show', [
        'user' => $user,
        'title' => $title,
        
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $user = User::where('username', $username)->first();
        return view('user.konten.edit', [
        'user' => $user,
        'title' => $title,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // return dd($request);
        $title = "My profile";

        if(empty($request->file('image'))){
            $user = User::where('username', $username)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'number_phone' => $request->number_phone,
                'address' => $request->address,
            ]);

            return view('user.konten.show', [
                'user' => $user,
                'title' => $title,
            ]);
    
    
        }
        else{
            $user = User::where('username', $username)->first();
            Storage::delete($user->image);
            $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
            'image' => $request->file('image')->store('image-user'),
        ]);
        return view('user.konten.show', [
            'user' => $user,
            'title' => $title,
        ]);

        return redirect()->route('user.konten')->with(['success' => 'data berhasil terupdate']);

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
        //
    }

    public function table()
    {
        $title = "Table User";
        $i = 1;
        $user = User::all();
        return view('user.konten.table',[
            'user' => $user,
            'title' => $title,
            'i' => $i
        ]);
    }

}
