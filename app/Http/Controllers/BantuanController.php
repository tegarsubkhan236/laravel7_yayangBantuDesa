<?php

namespace App\Http\Controllers;

use App\Bantuan;
use App\JenisBantuan;
use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() == 1) {
            $bantuan = Bantuan::all();
            return view("bantuan.admin.index", compact('bantuan'));
        }
        if (Auth::id() != 1) {;
            $id = Auth::id();
            $user = User::with('penduduk')->where('id', $id)->get();
            $jenisbantuan = JenisBantuan::all();

            return view("bantuan.user.index", compact('user', 'jenisbantuan'));
            // return $user;
        }
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
            'penduduk_id' => 'required',
            'user_id' => 'required',
            'jenisbantuan_id' => 'required',
        ]);
        $data = new Bantuan;
        $data->penduduk_id = $request->penduduk_id;
        $data->user_id = $request->user_id;
        $data->jenisbantuan_id = $request->jenisbantuan_id;
        $data->save();
        return redirect('bantuan')->with('status', 'Data Bantuan berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bantuan = Bantuan::with('penduduk', 'jenisbantuan', 'user')->where('user_id', $id)->get();
        return view('bantuan.user.cek-status', compact('bantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bantuan::find($id);
        return view('bantuan.admin.update', compact('data'));
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
        $data = Bantuan::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect('bantuan')->with('status', 'Status Data Bantuan berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bantuan::find($id);
        $data->delete();
        return redirect('bantuan')->with('status', 'Data bantuan berhasil di Delete!');
    }
}
