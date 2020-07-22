<?php

namespace App\Http\Controllers;

use App\Bantuan;
use App\jenisBantuan;
use App\Kuota;
use App\Penyuluhan;
use Illuminate\Http\Request;

class KuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kuota = Kuota::with('jenisbantuan')->get();
        // $jenis = jenisBantuan::all();
        // return view('kuota.index', compact('kuota', 'jenis'));
        $laporan = Penyuluhan::all()->where('status', '=', 'Sudah Dilaksanakan');
        return view('laporan-penyuluhan.dilaksanakan', compact('laporan'));
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
            'tersampaikan' => 'required',
        ]);
        $data = new Kuota;
        $data->jenisbantuan_id = $request->jenisbantuan_id;
        $data->tersampaikan = $request->tersampaikan;
        $data->save();
        return redirect('kuota')->with('status', 'Data Kuota berhasil di Tambah !');
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
        $data = Kuota::find($id);
        $jenis = jenisBantuan::all();
        return view('kuota.update', compact('data', 'jenis'));
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
            'tersampaikan' => 'required',
        ]);
        $data = Kuota::find($id);
        $data->jenisbantuan_id = $request->jenisbantuan_id;
        $data->tersampaikan = $request->tersampaikan;
        $data->save();
        return redirect('kuota')->with('status', 'Data Kuota berhasil di Update !');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kuota::find($id);
        $data->delete();
        return redirect('kuota')->with('status', 'Data kuota berhasil di Delete!');
    }
}
