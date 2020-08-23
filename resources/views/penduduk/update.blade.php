@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Penduduk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Penduduk</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('penduduk',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" 
                    name="nik" 
                    value="{{ old('nik', $data->nik) }}" 
                    class="form-control 
                    @error('nik') is-invalid @enderror" autofocus readonly>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KK</label>
                    <input type="number" 
                    name="kk" 
                    value="{{ old('kk',$data->kk) }}" 
                    class="form-control 
                    @error('kk') is-invalid @enderror" autofocus readonly>
                    @error('kk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" 
                    name="nama" 
                    value="{{ old('nama', $data->nama) }}" 
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
                    {{ old('alamat', $data->alamat) }}
                    </textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="number" 
                    name="no_hp" 
                    value="{{ old('no_hp', $data->no_hp) }}" 
                    class="form-control 
                    @error('no_hp') is-invalid @enderror" autofocus>
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <select name="pekerjaan_id" class="form-control">
                        <option value="{{ $data->pekerjaan->id }}">{{ $data->pekerjaan->pekerjaan }}</option>
                        @foreach ($pekerjaan as $p)
                        <option value="{{ $p->id }}"> {{ $p->pekerjaan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>pendidikan</label>
                    <input type="text" 
                    name="pendidikan" 
                    value="{{ old('pendidikan', $data->pendidikan) }}" 
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
                    value="{{ old('jumlah_keluarga', $data->jumlah_keluarga) }}" 
                    class="form-control 
                    @error('jumlah_keluarga') is-invalid @enderror" autofocus>
                    @error('jumlah_keluarga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection