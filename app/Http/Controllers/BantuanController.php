<?php

namespace App\Http\Controllers;

use App\Bantuan;
use App\JenisBantuan;
use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use PDF;

class BantuanController extends Controller
{
    public function cetak_pdf()
    {
        $bantuan = Bantuan::all();
        $pdf = PDF::loadview('bantuan.bantuan_pdf', compact('bantuan'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-bantuan-pdf');
    }

    public function store_admin(Request $request)
    {
        $validateData = $request->validate([
            'profil' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'kk' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'user_id' => 'required',
            'jenisbantuan_id' => 'required',
            'status' => 'required',
        ]);

        $data = new Bantuan;

        $id = $request['user_id'];
        $id_explode = explode('|', $id);

        $file_profil = $request->File('profil');
        $ext_profil  = $id_explode[1] . "." . $file_profil->clientExtension();
        $file_profil->storeAs('profil/', $ext_profil);
        $data->profil = $ext_profil;

        $file_kk = $request->File('kk');
        $ext_kk  = $id_explode[1] . "." . $file_kk->clientExtension();
        $file_kk->storeAs('kk/', $ext_kk);
        $data->kk = $ext_kk;

        $file_ktp = $request->File('ktp');
        $ext_ktp  = $id_explode[1] . "." . $file_ktp->clientExtension();
        $file_ktp->storeAs('ktp/', $ext_ktp);
        $data->ktp = $ext_ktp;

        $data->penduduk_id = $id_explode[1];
        $data->user_id = $id_explode[0];
        $data->jenisbantuan_id = $request->jenisbantuan_id;
        $data->status = $request->status;
        $data->save();
        return redirect('bantuan')->with('status', 'Data Bantuan berhasil di Tambah !');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->name == "admin") {
            $bantuan = Bantuan::all();
            return view("bantuan.admin.index", compact('bantuan'));
        };
        if (Auth::user()->name == "Kepala Desa") {
            $bantuan = Bantuan::all();
            return view("bantuan.admin.index", compact('bantuan'));
        };
        if (Auth::user()->name == "Kadus") {
            $bantuan = Bantuan::all();
            return view("bantuan.admin.index", compact('bantuan'));
        };
        if (Auth::user()->name != "admin" || "Kepala Desa" || "Kadus") {
            $id = Auth::id();
            $user = User::with('penduduk')->where('id', $id)->get();
            $jenisbantuan = JenisBantuan::all();
            return view("bantuan.user.index", compact('user', 'jenisbantuan'));
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bantuan = Bantuan::all();
        $jenisbantuan = JenisBantuan::all();
        $user = User::all();
        return view('bantuan.admin.add', compact('bantuan', 'jenisbantuan', 'user'));
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
            'profil' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'kk' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:512',
            'penduduk_id' => 'required',
            'user_id' => 'required',
            'jenisbantuan_id' => 'required',
        ]);

        $data = new Bantuan;

        $file_profil = $request->File('profil');
        $ext_profil  = $request->penduduk_id . "." . $file_profil->clientExtension();
        $file_profil->storeAs('profil/', $ext_profil);
        $data->profil = $ext_profil;

        $file_kk = $request->File('kk');
        $ext_kk  = $request->penduduk_id . "." . $file_kk->clientExtension();
        $file_kk->storeAs('kk/', $ext_kk);
        $data->kk = $ext_kk;

        $file_ktp = $request->File('ktp');
        $ext_ktp  = $request->penduduk_id . "." . $file_ktp->clientExtension();
        $file_ktp->storeAs('ktp/', $ext_ktp);
        $data->ktp = $ext_ktp;

        $jenis = $request['jenisbantuan_id'];
        $jenis_explode = explode('|', $jenis);
        $data->jenisbantuan_id = $jenis_explode[0];

        if ($request->pekerjaan_penduduk == $jenis_explode[1] && $request->penghasilan_penduduk <= $jenis_explode[2]) {
            $data->status = "Diterima";
        } else if ($request->pekerjaan_penduduk != $jenis_explode[1] && $request->penghasilan_penduduk <= $jenis_explode[2]) {
            $data->status = "Tidak Diterima";
        } else if ($request->pekerjaan_penduduk == $jenis_explode[1] && $request->penghasilan_penduduk >= $jenis_explode[2]) {
            $data->status = "Tidak Diterima";
        } else {
            $data->status = "Menunggu konfirmasi";
        }

        $data->penduduk_id = $request->penduduk_id;
        $data->user_id = $request->user_id;
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
