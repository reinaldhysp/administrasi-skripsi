@extends('dosen.layout')

@section('title')
    <title>Dosen - Mahasiswa TA</title>
@endsection

@section('sidebar')
    <li class="sidebar-item ">
        <a href="dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item has-sub ">
        <a href="{{route('mahasiswa_ta')}}" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Mahasiswa TA</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('mhs_aktif')}}">Mahasiswa Aktif</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('lulus')}}">Lulus / Alumni</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item  active">
        <a href="jadwalSeminarSidang" class='sidebar-link'>
            <i class="bi bi-calendar-date"></i>
                <span>Jadwal Seminar/Sidang</span>
        </a>
    </li>
@endsection
            
@section('content')
    <?php use Carbon\Carbon ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Mahasiswa Bimbingan</h3>
                    <p class="text-subtitle text-muted">Data Mahasiswa Bimbingan dan Progres Skripsi</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="jadwalSeminarSidang">Jadwal Seminar/Sidang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dosen</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Jadwal Seminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach($query as $qr)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$qr->nama}}</td>
                            <td>{{$qr->nim}}</td>
                            <td>{{Carbon::createFromFormat('H:i:s', $qr->waktu)->format('H:i')}} WIB</td>
                            <td>{{$qr->tempat}}</td>
                            <td>{{Carbon::parse($qr->tanggal_sempro)->translatedFormat('l , d F Y')}}</td>
                        </tr>
                    <?php $i++ ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection