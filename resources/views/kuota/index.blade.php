@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('kuota/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Laporam
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
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
                    <th>Nama Bantuan</th>
                    <th>Asal Bantuan</th>
                    <th>Nominal Diterima</th>
                    <th>Kuota Disediakan</th>
                    <th>Tersampaikan</th>
                    <th>Belum Tersampaikan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuota as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->jenisbantuan->nama }}</td>
                    <td>{{ $x->jenisbantuan->asal_bantuan }}</td>
                    <td>Rp. {{ $x->jenisbantuan->nominal }}</td>
                    <td>{{ $x->jenisbantuan->kuota }}</td>
                    <td>{{ $x->tersampaikan }}</td>
                    <td>{{ $belum_tersampaikan = $x->jenisbantuan->kuota-$x->tersampaikan }}</td>
                    <td class="text-center">
                        <a href="{{ url('kuota/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('kuota',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('kuota')}}" method="POST">
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
                    value="{{ old('tersampaikan') }}" 
                    class="form-control 
                    @error('tersampaikan') is-invalid @enderror" autofocus>
                    @error('tersampaikan')
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

@endsection