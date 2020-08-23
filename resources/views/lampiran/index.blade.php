@extends('home')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lampiran Penyuluhan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('lampiran/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Lampiran
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lampiran Penyuluhan</h6>
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
                    <th>Foto 1</th>
                    <th>Foto 2</th>
                    <th>Foto 3</th>
                    <th>Foto 4</th>
                    <th>Foto 5</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->jenisbantuan->nama }}</td>
                    <td><img src="{{asset('lampiran_penyuluhan/'.$x->foto1)}}" height="128"></td>
                    <td><img src="{{asset('lampiran_penyuluhan/'.$x->foto2)}}" height="128"></td>
                    <td><img src="{{asset('lampiran_penyuluhan/'.$x->foto3)}}" height="128"></td>
                    <td><img src="{{asset('lampiran_penyuluhan/'.$x->foto4)}}" height="128"></td>
                    <td><img src="{{asset('lampiran_penyuluhan/'.$x->foto5)}}" height="128"></td>
                    <td class="text-center">
                        {{-- <a href="{{ url('lampiran/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a> --}}
                        <form action="{{ url('lampiran',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Lampiran</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('lampiran')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Jenis Bantuan</label>
                    <select name="jenisbantuan_id" class="form-control">
                        <option value="" hidden> ==Jenis Bantuan== </option>
                        @foreach ($jenisbantuan as $x)
                        <option value="{{$x->id}}">{{$x->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto Lampiran 1</label>
                    <input type="file" name="foto1" class="form-control">
                </div><div class="form-group">
                    <label>Foto Lampiran 2</label>
                    <input type="file" name="foto2" class="form-control">
                </div><div class="form-group">
                    <label>Foto Lampiran 3</label>
                    <input type="file" name="foto3" class="form-control">
                </div><div class="form-group">
                    <label>Foto Lampiran 4</label>
                    <input type="file" name="foto4" class="form-control">
                </div><div class="form-group">
                    <label>Foto Lampiran 5</label>
                    <input type="file" name="foto5" class="form-control">
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