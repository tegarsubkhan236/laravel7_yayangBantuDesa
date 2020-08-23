<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenisBantuan;
use App\Sasaran;
use PDF;

class JenisBantuanController extends Controller
{
    public function cetak_undangan($id)
    {
        $data = jenisBantuan::find($id);
        $pdf = PDF::loadview('undangan_pdf', compact('data'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisbantuan = JenisBantuan::with('sasaran')->get();
        $sasaran = Sasaran::all();
        return view('jenisbantuan.index', compact('jenisbantuan', 'sasaran'));
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
            'nama' => 'required',
            'asal_bantuan' => 'required',
            'bentuk_bantuan' => 'required',
            'nominal' => 'required',
            'kuota' => 'required',
            // 'kuota_tetap' => 'required',
            'tempat' => 'required',
            'tgl_penyuluhan' => 'required',
            'sasaran_id' => 'required',
        ]);
        $data = new jenisBantuan;
        $data->nama = $request->nama;
        $data->asal_bantuan = $request->asal_bantuan;
        $data->bentuk_bantuan = $request->bentuk_bantuan;
        $data->nominal = $request->nominal;
        $data->kuota_tetap = $request->kuota;
        $data->kuota = $request->kuota;
        $data->tempat = $request->tempat;
        $data->tgl_penyuluhan = $request->tgl_penyuluhan;
        $data->sasaran_id = $request->sasaran_id;
        $data->save();
        return redirect('jenisbantuan')->with('status', 'Data Jenis Bantuan berhasil di Tambah !');
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
        $data = jenisBantuan::find($id);
        $sasaran = Sasaran::all();
        return view('jenisbantuan.update', compact('data', 'sasaran'));
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
            'nama' => 'required',
            'asal_bantuan' => 'required',
            'bentuk_bantuan' => 'required',
            'nominal' => 'required',
            'tempat' => 'required',
            'tgl_penyuluhan' => 'required',
            'sasaran_id' => 'required',
        ]);
        $data = jenisBantuan::find($id);
        $data->nama = $request->nama;
        $data->asal_bantuan = $request->asal_bantuan;
        $data->bentuk_bantuan = $request->bentuk_bantuan;
        $data->nominal = $request->nominal;
        $data->tempat = $request->tempat;
        $data->tgl_penyuluhan = $request->tgl_penyuluhan;
        $data->sasaran_id = $request->sasaran_id;
        $data->save();
        return redirect('jenisbantuan')->with('status', 'Data Jenis Bantuan berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = jenisBantuan::find($id);
        $data->delete();
        return redirect('jenisbantuan')->with('status', 'Data Jenis Bantuan berhasil di Delete!');
    }
}
