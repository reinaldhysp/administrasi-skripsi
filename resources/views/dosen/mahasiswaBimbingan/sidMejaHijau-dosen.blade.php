@extends('dosen/layout')

@section('title')
    <title>Dosen - Jadwal Seminar/Sidang</title>
@endsection

@section('sidebar')
    <li class="sidebar-item  ">
        <a href="/dosen/dashboard" class='sidebar-link'>
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

    <li class="sidebar-item active ">
        <a href="/dosen/jadwalSeminarSidang" class='sidebar-link'>
            <i class="bi bi-calendar-date"></i>
                <span>Jadwal Seminar/Sidang</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Jadwal Seminar/Sidang Mahasiswa Bimbingan</h3>
                    <p class="text-subtitle text-muted">Data Jadwal Seminar/Sidang Mahasiswa Bimbingan</p>
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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="{{asset('assets/images/MeHij.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h3 class="card-title" align="center">Seminar Proposal</h3></br>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a href="/dosen/sempro"><button class="btn btn-primary btn-block">Access</button></a>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="{{asset('assets/images/pict9.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h3 class="card-title" align="center">Seminar Hasil</h3></br>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a href="/dosen/semhas"><button class="btn btn-primary btn-block">Access</button></a>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="{{asset('assets/images/sidMejaHijau.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h3 class="card-title" align="center">Sidang Meja Hijau</h3></br>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a href="/dosen/mejaHijau"><button class="btn btn-primary btn-block">Access</button></a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection