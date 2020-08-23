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
                    <td>{{ $penduduk->pekerjaan->pekerjaan }}</td>
                    <td>{{ $penduduk->pekerjaan->penghasilan }}</td>
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

<!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('penduduk')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" 
                    name="nik" 
                    value="{{ old('nik') }}" 
                    class="form-control 
                    @error('nik') is-invalid @enderror">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KK</label>
                    <input type="number" 
                    name="kk" 
                    value="{{ old('kk') }}" 
                    class="form-control 
                    @error('kk') is-invalid @enderror" autofocus>
                    @error('kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama</label>
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
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" autofocus>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    {{ old('alamat') }}
                    </textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="number" 
                    name="no_hp" 
                    value="{{ old('no_hp') }}" 
                    class="form-control 
                    @error('no_hp') is-invalid @enderror" autofocus>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>ID Pekerjaan</label>
                    <select name="pekerjaan_id" class="form-control">
                        <option hidden> ==Pilih ID Pekerjaan== </option>
                        @foreach ($pekerjaan as $x)
                        <option value="{{$x->id}}"> {{$x->id}} | {{$x->pekerjaan}} | {{$x->penghasilan}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>pendidikan</label>
                    <input type="text" 
                    name="pendidikan" 
                    value="{{ old('pendidikan') }}" 
                    class="form-control 
                    @error('pendidikan') is-invalid @enderror" autofocus>
                    @error('pendidikan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah Keluarga</label>
                    <input type="number" 
                    name="jumlah_keluarga" 
                    value="{{ old('jumlah_keluarga') }}" 
                    class="form-control 
                    @error('jumlah_keluarga') is-invalid @enderror" autofocus>
                    @error('jumlah_keluarga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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