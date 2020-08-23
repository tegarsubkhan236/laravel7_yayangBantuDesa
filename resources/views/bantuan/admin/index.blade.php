@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Bantuan</h1>
        @if (Auth::user()->name == 'admin')
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('bantuan/create') }}">
            Tambah Bantuan
        </a>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (Auth::user()->name == 'admin')
        <div class="card-header py-3">
            <a href="{{ url('bantuan/cetak_pdf') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
        </div>
        @endif
        @if (session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id Bantuan</th>
                    <th>NIK</th>
                    <th>KK</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Foto Profil</th>
                    <th>Foto KK</th>
                    <th>Foto KTP</th>
                    <th>Jenis Bantuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    @if (Auth::user()->name == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($bantuan as $bantuan)
                <tr>
                    <td>{{ $bantuan->id }}</td>
                    <td>{{ $bantuan->penduduk->nik }}</td>
                    <td>{{ $bantuan->penduduk->kk }}</td>
                    <td>{{ $bantuan->penduduk->nama }}</td>
                    <td>{{ $bantuan->penduduk->pekerjaan->pekerjaan }}</td>
                    <td>{{ $bantuan->penduduk->pekerjaan->penghasilan }}</td>
                    <td><img src="{{asset('profil/'.$bantuan->profil)}}" height="128"></td>
                    <td><img src="{{asset('kk/'.$bantuan->kk)}}" height="128"></td>
                    <td><img src="{{asset('ktp/'.$bantuan->ktp)}}" height="128"></td>
                    <td>{{ $bantuan->jenisbantuan->nama }}</td>
                    <td>{{ $bantuan->created_at->format('d-m-Y') }}</td>
                    <td>{{ $bantuan->status }}</td>
                    @if (Auth::user()->name == 'admin')
                    <td class="text-center">
                        <a href="{{ url('bantuan/'.$bantuan->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('bantuan',$bantuan->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                            @method("delete")
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection