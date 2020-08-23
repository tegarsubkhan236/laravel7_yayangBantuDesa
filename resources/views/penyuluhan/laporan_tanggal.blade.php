@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penyuluhan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Penyuluhan</h6>
        </div>
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
            <form action="{{url("laporan_penyuluhan_process")}}" method="post">
                @csrf
                <div class="form-group col-3">
                    <label>Mulai</label>
                    <input type="datetime-local" class="form-control" name="start" autocomplete="off">
                </div>
                <div class="form-group col-3">
                    <label>Sampai</label>
                    <input type="datetime-local" class="form-control" name="end" autocomplete="off"  >
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        <li class="fa fa-print"></li> Cetak Laporan
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection