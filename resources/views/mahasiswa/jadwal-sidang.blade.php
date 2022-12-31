@extends('mahasiswa/layout')

@section('title')
    <title>Mahasiswa - Jadwal Sidang Meja Hijau</title>
@endsection

@section('sidebar')              
    <li class="sidebar-item">
        <a href="/mahasiswa/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a href="/mahasiswa/pra_sempro" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Pra Seminar Proposal</span>
        </a>
    </li>

    <li class="sidebar-item ">
        <a href="/mahasiswa/pra_semhas" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Pra Seminar Hasil</span>
        </a>
    </li>
                            
    <li class="sidebar-item  active">
        <a href="/mahasiswa/pra_sidang" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Pra Sidang Meja Hijau</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="/mahasiswa/pasca_meja_hijau" class='sidebar-link'>
            <i class="bi bi-hourglass-bottom"></i>
            <span>Pasca Sidang Meja Hijau</span>
        </a>
    </li>
    
    <li class="sidebar-item  ">
        <a href="{{route('profile_mhs')}}" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Profile Saya</span>
        </a>
    </li>
@endsection

@section('content')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Seminar Proposal</h3>
                            <p class="text-subtitle text-muted">Berita Acara Sidang Meja Hijau</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/mahasiswa/pra_sidang">Pra Sidang Meja Hijau</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

               <!-- Striped rows start -->
               <section class="section">
                    <div class="row" id="table-striped">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <!-- table striped -->
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr> 
                                                    <th>NO.</th>
                                                    <th>NAMA / NIM</th>
                                                    <th>JUDUL SKRIPSI</th>
                                                    <th>PEMBIMBING I / II</th>
                                                    <th>PEMBANDING I / II</th>
                                                    <th>TANGGAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 ?>
                                                <tr>
                                                    <td class="text-sm">{{$i}}</td>
                                                    <td class="text-sm">{{$data->nama}} {{$data->nim}}</td>
                                                    <td class="text-sm">{{$data->judul_skripsi}}</td>
                                                    <td class="text-sm">1. {{$data->nama_dosbing1}} <br> 2. {{$data->nama_dosbing2}}</td>
                                                    <td class="text-sm">1. {{$data->nama_dosen_penguji1}} <br> 2. {{$data->nama_dosen_penguji2}}</td>
                                                    <td class="text-sm">{{$tanggal}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Striped rows end -->
@endsection