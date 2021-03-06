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
            <form action="{{url('penyuluhan',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>ID Bantuan</label>
                    <select name="bantuan_id" class="form-control">
                        <option value="{{old('bantuan_id', $data->bantuan_id)}}" selected hidden>{{$data->bantuan_id}}</option>
                        @foreach ($bantuan as $x)
                            <option value="{{$x->id}}">{{$x->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Tidak Dilaksanakan">Tidak Dilaksanakan</option>
                        <option value="Sudah Dilaksanakan">Sudah Dilaksanakan</option>
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