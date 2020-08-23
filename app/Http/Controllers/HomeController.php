<?php

namespace App\Http\Controllers;

use App\jenisBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penduduk = DB::table("penduduks");
        $user = DB::table('users');
        $jenis = jenisBantuan::all();
        $pekerjaan = DB::table('pekerjaans');

        if (Auth::user()->name == "admin") {
            return view('dashboard', compact(
                'penduduk',
                'user',
                'jenis',
                'pekerjaan'
            ));
            // return $penduduk->count();
        };
        if (Auth::user()->name == "Kepala Desa") {
            return view('dashboard', compact(
                'penduduk',
                'user',
                'jenis',
                'pekerjaan'
            ));
        };
        if (Auth::user()->name == "Kadus") {
            return view('dashboard', compact(
                'penduduk',
                'user',
                'jenis',
                'pekerjaan'
            ));
        };
        if (Auth::user()->name != "admin" || "Kepala Desa" || "Kadus") {
            // return Auth::user();
            return view('landing-page');
        };
    }
}
