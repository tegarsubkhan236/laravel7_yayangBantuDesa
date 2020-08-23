<?php

namespace App\Http\Controllers;

use App\jenisBantuan;
use App\Pekerjaan;
use App\Sasaran;
use Illuminate\Http\Request;

class SasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sasaran = Sasaran::all();
        $pekerjaan = Pekerjaan::all();
        return view('sasaran.index', compact('sasaran', 'pekerjaan'));
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
        $data = new Sasaran;
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->save();
        return redirect('sasaran')->with('status', 'Data Jenis Bantuan berhasil di Tambah !');
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
        $data = Sasaran::find($id);
        $pekerjaan = Pekerjaan::all();
        return view('sasaran.update', compact('data', 'pekerjaan'));
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
        $data = Sasaran::find($id);
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->save();
        return redirect('sasaran')->with('status', 'Data Jenis Bantuan berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sasaran::find($id);
        $data->delete();
        return redirect('sasaran')->with('status', 'Data Sasaran berhasil di Delete!');
    }
}
