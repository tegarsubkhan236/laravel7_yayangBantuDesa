@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Pekerjaan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('pekerjaan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Pekerjaan
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pekerjaan</h6>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->pekerjaan }}</td>
                    <td>Rp. {{ $x->penghasilan }}</td>
                    <td class="text-center">
                        <a href="{{ url('pekerjaan/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('pekerjaan',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pekerjaan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('pekerjaan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Penghasilan</label>
                    <input type="number" name="penghasilan" value="{{ old('penghasilan') }}" class="form-control">
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