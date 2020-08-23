@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table bantuan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data bantuan</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('bantuan/store/admin')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Penduduk Terdaftar</label>
                    <select name="user_id" class="form-control">
                        <option hidden> ==Pilih Penduduk Terdaftar== </option>
                        @foreach ($user as $x)
                        <option value="{{ $x->id }}|{{ $x->penduduk->id }}"> {{ $x->nik }} | {{ $x->name }}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Bantuan</label>
                    <select name="jenisbantuan_id" class="form-control">
                        <option hidden> ==Pilih Jenis Bantuan== </option>
                        @foreach ($jenisbantuan as $jenis)
                        <option value="{{ $jenis->id }}"> {{ $jenis->nama }}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto Profil</label>
                    <input type="file" name="profil" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto Kartu Keluarga</label>
                    <input type="file" name="kk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto Kartu Tanda Penduduk</label>
                    <input type="file" name="ktp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="0" hidden> ==Masukan Status== </option>
                        <option value="Diterima">Diterima</option>
                        <option value="Tidak Diterima">Tidak Diterima</option>
                    </select>
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