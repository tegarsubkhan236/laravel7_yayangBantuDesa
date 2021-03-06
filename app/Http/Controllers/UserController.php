<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Penduduk;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('penduduk')->get();
        $penduduk = Penduduk::all();
        // return $user;
        return view('user.index', compact('user', 'penduduk'));
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
        $validateData = $request->validate([
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/',
        ]);

        $data = new User;

        $penduduk = $request["penduduk_id"];
        $penduduk_explode = explode("|", $penduduk);

        // return $penduduk_explode;
        $data->penduduk_id = $penduduk_explode[0];
        $data->name = $penduduk_explode[1];
        $data->nik = $penduduk_explode[2];
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect('user')->with('status', 'Data parfum berhasil di Tambah !');
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
        $data = User::find($id);
        return view("user.update", compact('data'));
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
        $validateData = $request->validate([
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/',
        ]);

        $data = User::find($id);
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect('user')->with('status', 'Data User berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user')->with('status', 'Data User berhasil di Delete!');
    }
}
