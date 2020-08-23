<?php

namespace App\Http\Controllers;

use App\Pekerjaan;
use Illuminate\Http\Request;
use App\Penduduk;
use Illuminate\Support\Facades\Hash;

class PendudukController extends Controller
{
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $penduduks = Penduduk::where('kk', 'like', $cari)->get();
        return view('penduduk.cari', compact('penduduks'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduks = Penduduk::all();
        $pekerjaan = Pekerjaan::all();
        return view('penduduk.index', compact("penduduks", "pekerjaan"));
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
            'nik' => 'required|size:12',
            'nama' => 'required',
            'alamat' => 'required',
            'kk' => 'required|size:12',
            'no_hp' => 'required',
            'pendidikan' => 'required',
            'jumlah_keluarga' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan_id' => 'required',
        ]);
        $data = new Penduduk;
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->kk = $request->kk;
        $data->no_hp = $request->no_hp;
        $data->pendidikan = $request->pendidikan;
        $data->jumlah_keluarga = $request->jumlah_keluarga;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->save();
        return redirect('penduduk')->with('status', 'Data Penduduk berhasil di Tambah !');
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
        $data = Penduduk::find($id);
        $pekerjaan = Pekerjaan::all();
        return view("penduduk.update", compact('data', 'pekerjaan'));
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
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kk' => 'required',
            'no_hp' => 'required',
            'pendidikan' => 'required',
            'jumlah_keluarga' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $data = Penduduk::find($id);
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->kk = $request->kk;
        $data->no_hp = $request->no_hp;
        $data->pendidikan = $request->pendidikan;
        $data->jumlah_keluarga = $request->jumlah_keluarga;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->pekerjaan_id = $request->pekerjaan_id;
        $data->save();
        return redirect('penduduk')->with('status', 'Data Penduduk berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penduduk::find($id);
        $data->delete();
        return redirect('penduduk')->with('status', 'Data Penduduk berhasil di Delete!');
    }
}
