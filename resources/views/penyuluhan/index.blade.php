@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Penyuluhan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('penyuluhan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Penyuluhan
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyuluhan</h6>
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
                    <th>ID Bantuan</th>
                    <th>Nama Bantuan</th>
                    <th>Nama Penerima</th>
                    <th>Tempat</th>
                    <th>Tanggal Penyuluhan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyuluhan as $x)
                <tr>
                    <td>{{ $x->bantuan->id }}</td>
                    <td>{{ $x->bantuan->jenisbantuan->nama }}</td>
                    <td>{{ $x->bantuan->penduduk->nama }}</td>
                    <td>{{ $x->tempat }}</td>
                    <td>{{ $x->tanggal_penyuluhan }}</td>
                    <td>{{ $x->status }}</td>
                    <td class="text-center">
                        {{-- <a href="{{ url('penyuluhan/'.$x->id) }}" class="btn btn-success btn-circle btn-sm">
                            <i class="fa fa-check"></i>
                        </a> --}}
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
                </tr>
                @endforeach
            </tbody>
            </table>
            <br><br>
            <form action="">
                <div class="form-group">
                    <label for="">Telah di laksanakan</label>
                    <input type="text" class="form-control" value="{{ $dilaksanakan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tidak di laksanakan</label>
                    <input type="text" class="form-control" value="{{ $tidak_dilaksanakan }}" readonly>
                </div>
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
                        <option value="{{$x->id}}|{{$x->user->id}}"> 
                            ID : {{$x->id}} |
                            [nama bantuan : {{$x->jenisbantuan->nama}}] |
                            [Penerima : {{$x->penduduk->nama}}]
                        </option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label>Tempat Penyuluhan</label>
                    <input type="text" 
                    name="tempat" 
                    value="{{ old('tempat') }}" 
                    class="form-control 
                    @error('tempat') is-invalid @enderror" autofocus>
                    @error('tempat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="form-group">
                    <label>Tanggal Penyuluhan</label>
                    <input type="date" 
                    name="tanggal_penyuluhan" 
                    value="{{ old('tanggal_penyuluhan') }}" 
                    class="form-control 
                    @error('tanggal_penyuluhan') is-invalid @enderror" autofocus>
                    @error('tanggal_penyuluhan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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