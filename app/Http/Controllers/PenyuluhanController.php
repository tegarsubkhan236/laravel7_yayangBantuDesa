<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyuluhan;
use App\Bantuan;
use App\jenisBantuan;
use PDF;

class PenyuluhanController extends Controller
{
    public function laporan_sorted()
    {
        return view('penyuluhan.laporan_tanggal');
    }

    public function laporan_sorted_process(Request $req)
    {
        $validateData = $req->validate([
            'start' => 'required',
            'end' => 'required',
        ]);

        $find = Penyuluhan::where("created_at", ">=", $req->start)->where("created_at", "<=", $req->end);
        if ($find->count() > 0) {
            $penyuluhan = $find;
            $pdf = PDF::setPaper('a4', 'landscape')->loadView("penyuluhan.laporan_sorted", [
                "penyuluhan" => $penyuluhan,
                "req" => $req,
            ]);
            return $pdf->download('laporan_penyuluhan_' . time() . '.pdf');
        } else {
            // $pesan = "Data dengan awal $req->start dan akhir $req->end tidak ditemukan";
            return redirect('/laporan_penyuluhan')->with('status', 'Data tidak ditemukan');
        }
        // return $find;
    }

    public function cetak_pdf()
    {
        $penyuluhan = Penyuluhan::all();
        $pdf = PDF::loadview('penyuluhan.penyuluhan_pdf', compact('penyuluhan'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan-penyuluhan-pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bantuan = Bantuan::where('status', 'Diterima')->get();
        $penyuluhan = Penyuluhan::with('bantuan')->get();
        $jenis = jenisBantuan::all();

        // $dilaksanakan = Penyuluhan::all()->where('status', 'Sudah Dilaksanakan')->count();
        // $tidak_dilaksanakan = Penyuluhan::all()->where('status', 'Tidak Dilaksanakan')->count();

        return view('penyuluhan.index', compact('penyuluhan', 'bantuan', 'jenis'));
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
            'status' => 'required',
        ]);
        $data = new Penyuluhan;

        $bantuan_id = $request['bantuan_id'];
        $bantuan_id_explode = explode('|', $bantuan_id);

        $data->bantuan_id = $bantuan_id_explode[0];
        $data->user_id = $bantuan_id_explode[1];
        $data->jenisbantuan_id = $bantuan_id_explode[2];
        $data->status = $request->status;
        $data->save();

        $jenis = jenisBantuan::findOrFail($bantuan_id_explode[2]);
        $jenis->kuota -= $bantuan_id_explode[3];
        $jenis->save();
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
            'status' => 'required',
        ]);
        $data = Penyuluhan::find($id);
        $data->bantuan_id = $request->bantuan_id;
        $data->status = $request->status;
        $data->save();
        return redirect('penyuluhan')->with('status', 'Data Penyuluhan berhasil di Update !');
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
