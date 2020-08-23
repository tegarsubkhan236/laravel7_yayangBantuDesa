@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Sasaran</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('sasaran/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Sasaran
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Sasaran</h6>
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
                    <th>ID</th>
                    <th>Sasaran Pekerjaan</th>
                    <th>Maksimal Penghasilan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sasaran as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->pekerjaan->pekerjaan }}</td>
                    <td>Rp. {{ $x->pekerjaan->penghasilan }}</td>
                    <td class="text-center">
                        <a href="{{ url('sasaran/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('sasaran',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis sasaran</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('sasaran')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Sasaran</label>
                    <select name="pekerjaan_id" class="form-control">
                        @foreach ($pekerjaan as $x)
                            <option value="{{$x->id}}">{{$x->id}} | {{$x->pekerjaan}} | {{$x->penghasilan}}</option>
                        @endforeach
                    </select>
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

@endsection