@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Jenis Sasaran</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Jenis Sasaran</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('sasaran',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Sasaran</label>
                    <input type="text" 
                    name="sasaran" 
                    value="{{ old('sasaran', $data->sasaran) }}" 
                    class="form-control 
                    @error('sasaran') is-invalid @enderror" autofocus>
                    @error('sasaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kriteria Penghasilan</label>
                    <input type="text" 
                    name="kriteria" 
                    value="{{ old('kriteria', $data->kriteria) }}" 
                    class="form-control 
                    @error('kriteria') is-invalid @enderror" autofocus>
                    @error('kriteria')
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