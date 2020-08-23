@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Pekerjaan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pekerjaan</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('pekerjaan',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Penghasilan</label>
                    <input type="number" name="penghasilan" value="{{ old('penghasilan', $data->penghasilan) }}" class="form-control">
                </div>
                <a href="{{url('pekerjaan')}}" class="btn btn-secondary">Cancel</a> 
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection