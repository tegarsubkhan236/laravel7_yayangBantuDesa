@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table user</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('user/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah user
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data user</h6>
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
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->password }}</td>
                    <td class="text-center">
                        <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('user',$user->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data user</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Penduduk</label>
                    <select name="penduduk_id" class="form-control" autofocus>
                        @foreach ($penduduk as $item)
                        <option value="{{ $item->id }}|{{ $item->nama }}|{{ $item->nik }}">{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" 
                    name="password" 
                    value="{{ old('password') }}" 
                    class="form-control 
                    @error('password') is-invalid @enderror" autofocus>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
{{-- end AddModal --}}

@endsection