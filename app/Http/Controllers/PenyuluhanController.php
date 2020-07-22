<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyuluhan;
use App\Bantuan;

class PenyuluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bantuan = Bantuan::where('status', 'Diterima')->get();
        $penyuluhan = Penyuluhan::with('bantuan')->get();
        $dilaksanakan = Penyuluhan::all()->where('status', 'Sudah Dilaksanakan')->count();
        $tidak_dilaksanakan = Penyuluhan::all()->where('status', 'Tidak Dilaksanakan')->count();
        // return $bantuan;
        return view('penyuluhan.index', compact('penyuluhan', 'bantuan', 'dilaksanakan', 'tidak_dilaksanakan'));
        // return $penyuluhan;
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
            'bantuan_id' => 'required',
            'tempat' => 'required',
            'tanggal_penyuluhan' => 'required',
            'status' => 'required',
        ]);
        $data = new Penyuluhan;

        $bantuan_id = $request['bantuan_id'];
        $bantuan_id_explode = explode('|', $bantuan_id);

        $data->bantuan_id = $bantuan_id_explode[0];
        $data->user_id = $bantuan_id_explode[1];
        $data->tempat = $request->tempat;
        $data->tanggal_penyuluhan = $request->tanggal_penyuluhan;
        $data->status = $request->status;
        $data->save();
        return redirect('penyuluhan')->with('status', 'Data Penyuluhan berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Penyuluhan::all();
        $penyuluhan = Penyuluhan::with('bantuan')->where('user_id', $id)->get();
        // return $penyuluhan;
        return view('bantuan.user.cek-penyuluhan', compact('penyuluhan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penyuluhan::find($id);
        $bantuan = Bantuan::where('status', 'Diterima')->get();
        return view('penyuluhan.update', compact('data', 'bantuan'));
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
            'bantuan_id' => 'required',
            'tempat' => 'required',
            'tanggal_penyuluhan' => 'required',
            'status' => 'required',
        ]);
        $data = Penyuluhan::find($id);
        $data->bantuan_id = $request->bantuan_id;
        $data->tempat = $request->tempat;
        $data->tanggal_penyuluhan = $request->tanggal_penyuluhan;
        $data->status = $request->status;
        $data->save();
        return redirect('penyuluhan')->with('status', 'Data Penyuluhan berhasil di Tambah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penyuluhan::find($id);
        $data->delete();
        return redirect('penyuluhan')->with('status', 'Data Penyuluhan berhasil di Delete!');
    }
}
