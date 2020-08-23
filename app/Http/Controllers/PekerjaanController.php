<?php

namespace App\Http\Controllers;

use App\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pekerjaan::all();
        return view('pekerjaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerjaan.add');
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
            'pekerjaan' => 'required',
            'penghasilan' => 'required|numeric',
        ]);

        $data = new Pekerjaan;
        $data->pekerjaan = $request->pekerjaan;
        $data->penghasilan = $request->penghasilan;
        $data->save();
        return redirect('pekerjaan')->with('status', 'Data pekerjaan berhasil di Tambah !');
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
        $data = Pekerjaan::find($id);
        return view("pekerjaan.update", compact('data'));
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
            'pekerjaan' => 'required',
            'penghasilan' => 'required|numeric',
        ]);

        $data = Pekerjaan::find($id);
        $data->pekerjaan = $request->pekerjaan;
        $data->penghasilan = $request->penghasilan;
        $data->save();
        return redirect('pekerjaan')->with('status', 'Data pekerjaan berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pekerjaan::find($id);
        $data->delete();
        return redirect('pekerjaan')->with('status', 'Data pekerjaan berhasil di Delete!');
    }
}
