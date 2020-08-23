@extends('home')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penduduk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$penduduk->count()}} Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pekerjaan Terdaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pekerjaan->count()}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penerima Bantuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user->count()}} Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bantuan Tersedia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jenis->count()}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>

        <!-- Content Row -->
        <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Info Bantuan</h6>
            </div>
            <div class="card-body">
                @foreach ($jenis as $item)
                <h4 class="small font-weight-bold">{{$item->nama}} <span class="float-right">{{$item->kuota_tetap - $item->kuota}} Penerima dari Total Kuota {{$item->kuota_tetap}}</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: {{$item->kuota_tetap - $item->kuota}}%" aria-valuenow="{{$item->kuota_tetap - $item->kuota}}" aria-valuemin="0" aria-valuemax="{{$item->kuota_tetap}}"></div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection