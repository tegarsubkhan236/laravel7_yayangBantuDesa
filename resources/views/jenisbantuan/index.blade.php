@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Jenis Bantuan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('jenisbantuan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Jenis Bantuan
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jenis Bantuan</h6>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
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
                    <th>ID</th>
                    <th>Nama Bantuan</th>
                    <th>Asal Bantuan</th>
                    <th>Bentuk Bantuan</th>
                    <th>Nominal Bantuan</th>
                    <th>Kuota Tetap</th>
                    <th>Kuota</th>
                    <th>Tempat Penyuluhan</th>
                    <th>Tanggal Penyuluhan</th>
                    <th>Sasaran</th>
                    <th>Kriteria Penghasilan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisbantuan as $jenisbantuan)
                <tr>
                    <td>{{ $jenisbantuan->id }}</td>
                    <td>{{ $jenisbantuan->nama }}</td>
                    <td>{{ $jenisbantuan->asal_bantuan }}</td>
                    <td>{{ $jenisbantuan->bentuk_bantuan }}</td>
                    <td>Rp. {{ $jenisbantuan->nominal }}</td>
                    <td>{{ $jenisbantuan->kuota_tetap }} Orang</td>
                    <td>{{ $jenisbantuan->kuota }} Orang</td>
                    <td>{{ $jenisbantuan->tempat }}</td>
                    <td>{{ $jenisbantuan->tgl_penyuluhan->format('d-m-Y') }}</td>
                    <td>{{ $jenisbantuan->sasaran->pekerjaan->pekerjaan }}</td>
                    <td>{{ $jenisbantuan->sasaran->pekerjaan->penghasilan }}</td>
                    <td class="text-center">
                        <a href="{{ url('cetak_undangan/'.$jenisbantuan->id) }}" class="btn btn-primary btn-sm">
                            Undangan
                        </a>
                        <a href="{{ url('jenisbantuan/'.$jenisbantuan->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('jenisbantuan',$jenisbantuan->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <form action="{{url('jenisbantuan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Bantuan</label>
                    <input type="text" 
                    name="nama" 
                    value="{{ old('nama') }}" 
                    class="form-control 
                    @error('nama') is-invalid @enderror" autofocus>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Asal Bantuan</label>
                    <input type="text" 
                    name="asal_bantuan" 
                    value="{{ old('asal_bantuan') }}" 
                    class="form-control 
                    @error('asal_bantuan') is-invalid @enderror" autofocus>
                    @error('asal_bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Bentuk Bantuan</label>
                    <input type="text" 
                    name="bentuk_bantuan" 
                    value="{{ old('bentuk_bantuan') }}" 
                    class="form-control 
                    @error('bentuk_bantuan') is-invalid @enderror" autofocus>
                    @error('bentuk_bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nominal Bantuan</label>
                    <input type="number" 
                    name="nominal" 
                    value="{{ old('nominal') }}" 
                    class="form-control 
                    @error('nominal') is-invalid @enderror" autofocus>
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kuota</label>
                    <input type="number" 
                    name="kuota" 
                    value="{{ old('kuota') }}" 
                    class="form-control 
                    @error('kuota') is-invalid @enderror" autofocus>
                    @error('kuota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    name="tgl_penyuluhan" 
                    value="{{ old('tgl_penyuluhan') }}" 
                    class="form-control 
                    @error('tgl_penyuluhan') is-invalid @enderror" autofocus>
                    @error('tgl_penyuluhan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sasaran</label>
                    <select name="sasaran_id" class="form-control">
                        @foreach ($sasaran as $x)
                        <option value="{{ $x->id }}"> {{$x->pekerjaan->pekerjaan}} = {{$x->pekerjaan->penghasilan}} </option>
                        @endforeach
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