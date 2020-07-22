<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use Illuminate\Support\Facades\Hash;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduks = Penduduk::all();
        return view('penduduk.index', compact("penduduks"));
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
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'kk' => 'required',
            'no_hp' => 'required',
            'penghasilan' => 'required',
            'pendidikan' => 'required',
            'jumlah_keluarga' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $data = new Penduduk;
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->pekerjaan = $request->pekerjaan;
        $data->kk = $request->kk;
        $data->no_hp = $request->no_hp;
        $data->penghasilan = $request->penghasilan;
        $data->pendidikan = $request->pendidikan;
        $data->jumlah_keluarga = $request->jumlah_keluarga;
        $data->jenis_kelamin = $request->jenis_kelamin;
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
        return view("penduduk.update", compact('data'));
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
            'pekerjaan' => 'required',
            'kk' => 'required',
            'no_telp' => 'required',
            'penghasilan' => 'required',
            'pendidikan' => 'required',
            'jumlah_keluarga' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $data = Penduduk::find($id);
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->pekerjaan = $request->pekerjaan;
        $data->kk = $request->kk;
        $data->no_telp = $request->no_telp;
        $data->penghasilan = $request->penghasilan;
        $data->pendidikan = $request->pendidikan;
        $data->jumlah_keluarga = $request->jumlah_keluarga;
        $data->jenis_kelamin = $request->jenis_kelamin;
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
