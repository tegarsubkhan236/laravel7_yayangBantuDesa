@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Penduduk</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('penduduk/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Penduduk
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
        </div>
        <form action="/penduduk/cari" method="GET">
            <div class="form-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari Nomer KK .." value="{{ old('cari') }}">
                <input type="submit" class='btn btn-success' value="CARI">
            </div>
        </form>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>KK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Pendidikan</th>
                    <th>Jumlah Keluarga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penduduks as $penduduk)
                <tr>
                    <td>{{ $penduduk->id }}</td>
                    <td>{{ $penduduk->nik }}</td>
                    <td>{{ $penduduk->kk }}</td>
                    <td>{{ $penduduk->nama }}</td>
                    <td>{{ $penduduk->jenis_kelamin }}</td>
                    <td>{{ $penduduk->alamat }}</td>
                    <td>{{ $penduduk->no_hp }}</td>
                    <td>{{ $penduduk->pekerjaan }}</td>
                    <td>{{ $penduduk->penghasilan }}</td>
                    <td>{{ $penduduk->pendidikan }}</td>
                    <td>{{ $penduduk->jumlah_keluarga }}</td>
                    <td class="text-center">
                        <a href="{{ url('penduduk/'.$penduduk->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('penduduk',$penduduk->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                            @method("delete")
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
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