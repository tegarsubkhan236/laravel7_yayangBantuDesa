@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Laporan</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('kuota',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Bantuan</label>
                    <select name="jenisbantuan_id" class="form-control">
                        @foreach ($jenis as $i)
                        <option value="{{$i->id}}">{{$i->nama}} | Kuota = {{$i->kuota}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tersampaikan</label>
                    <input type="number" 
                    name="tersampaikan" 
                    value="{{ old('tersampaikan', $data->tersampaikan) }}" 
                    class="form-control 
                    @error('tersampaikan') is-invalid @enderror" autofocus>
                    @error('tersampaikan')
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