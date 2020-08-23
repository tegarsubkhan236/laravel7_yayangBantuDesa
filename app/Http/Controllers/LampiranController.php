<?php

namespace App\Http\Controllers;

use App\jenisBantuan;
use App\Lampiran;
use Illuminate\Http\Request;

class LampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lampiran::all();
        $jenisbantuan = jenisBantuan::all();
        return view('lampiran.index', compact('data', 'jenisbantuan'));
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
        // $validateData = $request->validate([
        //     'foto1' => 'nullable|file|image|mimes:jpeg,png,jpg|max:512',
        //     'foto2' => 'nullable|file|image|mimes:jpeg,png,jpg|max:512',
        //     'foto3' => 'nullable|file|image|mimes:jpeg,png,jpg|max:512',
        //     'foto4' => 'nullable|file|image|mimes:jpeg,png,jpg|max:512',
        //     'foto5' => 'nullable|file|image|mimes:jpeg,png,jpg|max:512',
        //     'jenisbantuan_id' => 'required',
        // ]);

        $data = new Lampiran;


        if ($request->has('foto1')) {
            $foto1 = $request->File('foto1');
            $ext_foto1  = $request->jenisbantuan_id . "_1" . "." . $foto1->clientExtension();
            $foto1->storeAs('lampiran_penyuluhan/', $ext_foto1);
            $data->foto1 = $ext_foto1;
        }
        if ($request->has('foto2')) {
            $foto2 = $request->File('foto2');
            $ext_foto2  = $request->jenisbantuan_id . "_2" . "." . $foto1->clientExtension();
            $foto2->storeAs('lampiran_penyuluhan/', $ext_foto2);
            $data->foto2 = $ext_foto2;
        }
        if ($request->has('foto3')) {
            $foto3 = $request->File('foto3');
            $ext_foto3  = $request->jenisbantuan_id . "_3" . "." . $foto1->clientExtension();
            $foto3->storeAs('lampiran_penyuluhan/', $ext_foto3);
            $data->foto3 = $ext_foto3;
        }
        if ($request->has('foto4')) {
            $foto4 = $request->File('foto4');
            $ext_foto4  = $request->jenisbantuan_id . "_4" . "." . $foto1->clientExtension();
            $foto4->storeAs('lampiran_penyuluhan/', $ext_foto4);
            $data->foto4 = $ext_foto4;
        }
        if ($request->has('foto5')) {
            $foto5 = $request->File('foto5');
            $ext_foto5  = $request->jenisbantuan_id . "_5" . "." . $foto1->clientExtension();
            $foto5->storeAs('lampiran_penyuluhan/', $ext_foto5);
            $data->foto5 = $ext_foto5;
        }

        $data->jenisbantuan_id = $request->jenisbantuan_id;
        $data->save();
        return redirect('lampiran')->with('status', 'Lampiran berhasil di Tambah !');
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lampiran::find($id);
        $data->delete();
        return redirect('lampiran')->with('status', 'Data lampiran berhasil di Delete!');
    }
}
