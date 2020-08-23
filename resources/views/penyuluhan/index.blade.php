@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Penyuluhan</h1>
        @if (Auth::user()->name == 'admin')
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('penyuluhan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Penyuluhan
        </a>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (Auth::user()->name == 'admin')
        <div class="card-header py-3">
            <a href="{{ url('penyuluhan/cetak_pdf') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
        </div>
        @endif
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
                    {{-- <th>ID</th> --}}
                    <th>Tanggal Hadir</th>
                    <th>ID Bantuan</th>
                    <th>Nama Bantuan</th>
                    <th>Nama Penerima</th>
                    <th>Tempat</th>
                    <th>Tanggal Penyuluhan</th>
                    <th>Status</th>
                    @if (Auth::user()->name == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($penyuluhan as $x)
                <tr>
                    {{-- <td>{{ $x->id }}</td> --}}
                    <td>{{ $x->created_at->format('d-m-Y') }}</td>
                    <td>{{ $x->bantuan->id }}</td>
                    <td>{{ $x->bantuan->jenisbantuan->nama }}</td>
                    <td>{{ $x->bantuan->penduduk->nama }}</td>
                    <td>{{ $x->bantuan->jenisbantuan->tempat }}</td>
                    <td>{{ $x->bantuan->jenisbantuan->tgl_penyuluhan->format('d-m-Y') }}</td>
                    <td>{{ $x->status }}</td>
                    @if (Auth::user()->name == 'admin')
                    <td class="text-center">
                        <a href="{{ url('penyuluhan/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('penyuluhan',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                            @method("delete")
                            @csrf
                            <button class="btn btn-danger btn-circle btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            </table>
            <br><br>

            <form action="">
                @foreach ($jenis as $x)
                <div class="form-group">
                    <label>{{ $x->nama }}</label>
                    <input type="text" class="form-control" value="Nama Bantuan = {{ $x->nama }}, dengan Kuota = {{ $x->kuota_tetap }}" readonly>
                    <input type="text" class="form-control" value="Kuota Tersisa = {{ $x->kuota }}" readonly>
                </div>
                @endforeach
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Bantuan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('penyuluhan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>ID Bantuan</label>
                    <select name="bantuan_id" class="form-control">
                        @foreach ($bantuan as $x)
                        <option value="{{$x->id}}|{{$x->user->id}}|{{$x->jenisbantuan->id}}|1"> 
                            ID : {{$x->id}} |
                            [nama bantuan : {{$x->jenisbantuan->nama}}] |
                            [Penerima : {{$x->penduduk->nama}}]
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Tidak Dilaksanakan">Tidak Dilaksanakan</option>
                        <option value="Sudah Dilaksanakan">Sudah Dilaksanakan</option>
                    </select>
                </div> 
        </div>

        <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
{{-- end AddModal --}}

@endsection