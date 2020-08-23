@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Jenis Bantuan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Jenis Bantuan</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('jenisbantuan',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Bantuan</label>
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
                    <label>Asal Bantuan</label>
                    <input type="text" 
                    name="asal_bantuan" 
                    value="{{ old('asal_bantuan',$data->asal_bantuan) }}" 
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
                    value="{{ old('bentuk_bantuan',$data->bentuk_bantuan) }}" 
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
                    value="{{ old('nominal',$data->nominal) }}" 
                    class="form-control 
                    @error('nominal') is-invalid @enderror" autofocus>
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kuota</label>
                    <input type="number" value="{{ $data->kuota }}" class="form-control" autofocus readonly>
                </div>

                <div class="form-group">
                    <label>Tempat Penyuluhan</label>
                    <input type="text" 
                    name="tempat" 
                    value="{{ old('tempat',$data->tempat) }}" 
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
                    value="{{ old('tgl_penyuluhan',$data->tgl_penyuluhan) }}" 
                    class="form-control 
                    @error('tgl_penyuluhan') is-invalid @enderror" autofocus>
                    @error('tgl_penyuluhan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Sasaran</label>
                    <select name="sasaran_id" class="form-control">
                        <option hidden> ==Pilih Sasaran== </option>
                        @foreach ($sasaran as $x)
                        <option value="{{ $x->id }}"> {{$x->pekerjaan->pekerjaan}} = {{$x->pekerjaan->penghasilan}} </option>
                        @endforeach
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