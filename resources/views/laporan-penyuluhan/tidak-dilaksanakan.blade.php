@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Tidak Dilaksanakan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Tidak Dilaksanakan</h6>
        </div>
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
                    <th>No</th>
                    <th>Nama Bantuan</th>
                    <th>Nama Penerima</th>
                    <th>Nominal Diterima</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Penyuluhan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $x->bantuan->jenisbantuan->nama }}</td>
                    <td>{{ $x->bantuan->penduduk->nama }}</td>
                    <td>Rp. {{ $x->bantuan->jenisbantuan->nominal }}</td>
                    <td>{{ $x->bantuan->created_at->format('d-m-Y') }}</td>
                    <td>{{ $x->tanggal_penyuluhan }}</td>
                    <td>{{ $x->status }}</td>
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