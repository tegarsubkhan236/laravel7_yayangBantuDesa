@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Bantuan</h1>
        {{-- <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('bantuan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Bantuan
        </a> --}}
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Bantuan</h6>
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
                    <th>Id Bantuan</th>
                    <th>NIK</th>
                    <th>KK</th>
                    <th>Nama</th>
                    {{-- <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telp</th> --}}
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    {{-- <th>Pendidikan</th> --}}
                    {{-- <th>Jumlah Keluarga</th> --}}
                    <th>Jenis Bantuan</th>
                    <th>Sasaran</th>
                    <th>Kriteria</th>
                    {{-- <th>Nominal Bantuan</th> --}}
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bantuan as $bantuan)
                <tr>
                    <td>{{ $bantuan->id }}</td>
                    <td>{{ $bantuan->penduduk->nik }}</td>
                    <td>{{ $bantuan->penduduk->kk }}</td>
                    <td>{{ $bantuan->penduduk->nama }}</td>
                    {{-- <td>{{ $bantuan->penduduk->jenis_kelamin }}</td>
                    <td>{{ $bantuan->penduduk->alamat }}</td>
                    <td>{{ $bantuan->penduduk->no_hp }}</td> --}}
                    <td>{{ $bantuan->penduduk->pekerjaan }}</td>
                    <td>{{ $bantuan->penduduk->penghasilan }}</td>
                    {{-- <td>{{ $bantuan->penduduk->pendidikan }}</td>
                    <td>{{ $bantuan->penduduk->jumlah_keluarga }}</td> --}}
                    <td>{{ $bantuan->jenisbantuan->nama }}</td>
                    {{-- <td>{{ $bantuan->sasaran->sasaran }}</td> --}}
                    <td>{{ $bantuan->jenisbantuan->sasaran->sasaran }}</td>
                    <td>{{ $bantuan->jenisbantuan->sasaran->kriteria }}</td>
                    <td>{{ $bantuan->created_at->format('d-m-Y') }}</td>
                    <td>{{ $bantuan->status }}</td>
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
{{-- <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data bantuan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('bantuan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Penduduk</label>
                    <select name="penduduk_id" class="form-control" autofocus>
                        @foreach ($penduduk as $item)
                        <option value="{{ $item->id }}">{{ $item->id }}  {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>bantuanname</label>
                    <input type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    class="form-control 
                    @error('name') is-invalid @enderror" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    class="form-control 
                    @error('email') is-invalid @enderror" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" 
                    name="password" 
                    value="{{ old('password') }}" 
                    class="form-control 
                    @error('password') is-invalid @enderror" autofocus>
                    @error('password')
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
end AddModal --}}

@endsection