@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table User</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('user',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Penduduk</label>
                    <input type="text" 
                    name="penduduk_id" 
                    value="{{ old('penduduk_id', $data->penduduk->nama) }}" 
                    class="form-control 
                    @error('penduduk_id') is-invalid @enderror" autofocus
                    readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" 
                    name="name" 
                    value="{{ old('name', $data->name) }}" 
                    class="form-control 
                    @error('name') is-invalid @enderror" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" 
                    name="email" 
                    value="{{ old('email', $data->email) }}" 
                    class="form-control 
                    @error('email') is-invalid @enderror" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" 
                    name="password" 
                    value="{{ old('password', $data->password) }}" 
                    class="form-control 
                    @error('password') is-invalid @enderror" autofocus>
                    @error('password')
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