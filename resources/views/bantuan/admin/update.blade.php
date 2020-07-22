@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table bantuan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data bantuan</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('bantuan',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" value="{{ $data->penduduk->nik }}" class="form-control" autofocus readonly>
                </div>
                {{-- <div class="form-group">
                    <label>KK</label>
                    <input type="text" value="{{ $data->penduduk->kk }}" class="form-control" autofocus readonly>
                </div> --}}
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="{{ $data->penduduk->nama }}" class="form-control" autofocus readonly>
                </div>
                {{-- <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" value="{{ $data->penduduk->jenis_kelamin }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" value="{{ $data->penduduk->alamat }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" value="{{ $data->penduduk->no_hp }}" class="form-control" autofocus readonly>
                </div> --}}
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" value="{{ $data->penduduk->pekerjaan }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Penghasilan</label>
                    <input type="text" value="{{ $data->penduduk->penghasilan }}" class="form-control" autofocus readonly>
                </div>
                {{-- <div class="form-group">
                    <label>Pendidikan</label>
                    <input type="text" value="{{ $data->penduduk->pendidikan }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Jumlah Keluarga</label>
                    <input type="text" value="{{ $data->penduduk->jumlah_keluarga }}" class="form-control" autofocus readonly>
                </div> --}}
                <div class="form-group">
                    <label>Jenis Bantuan</label>
                    <input type="text" value="{{ $data->jenisbantuan->nama }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Sasaran seharusnya</label>
                    <input type="text" value="{{ $data->jenisbantuan->sasaran->sasaran }}" class="form-control" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Kriteria seharusnya</label>
                    <input type="text" value="{{ $data->jenisbantuan->sasaran->kriteria }}" class="form-control" autofocus readonly>
                </div>
                {{-- <div class="form-group">
                    <label>ID User</label>
                    <input type="text" value="{{ $data->user_id }}" class="form-control" autofocus readonly>
                </div> --}}
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