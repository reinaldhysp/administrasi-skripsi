@extends('mahasiswa/layout');

@section('title')
    <title>Mahasiswa - Pra Sidang Meja Hijau</title>
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
                        <h3>Pra Sidang Meja Hijau</h3>
                        <p class="text-subtitle text-muted">Berkas Administrasi Pra Sidang Meja Hijau</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Mahasiswa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pra Sidang Hijau</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <!-- progress seminar hasil akan didapat pada fitur ini -->
                        <h5>a) Lembar Kendali Bimbingan Skripsi Pra Sidang Meja Hijau</h5>
                        <p> Formulir ini Anda butuhkan sebelum sidang meja hijau. Data Anda terkait judul skripsi, 
                            tanggal bimbingan serta catatan selama bimbingan akan di-record menggunakan formulir ini. 
                            Silahkan cetak formulir atau preview untuk memastikan 
                            data Anda sudah benar sebelum mengunduh formulir. </p>

                        @if($mhs->no_statusAkses > 4)
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <a href="{{('/mahasiswa/lembar_kendali_sidang')}}" class="btn btn-success btn-sm" target="blank"> 
                                    <i class="bi bi-printer-fill"></i> Cetak </a>
                            </div>
                        @else
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <a href="#" class="btn btn-success btn-sm disabled" target="blank"> 
                                    <i class="bi bi-printer-fill"></i> Cetak </a>
                            </div>
                        @endif

                        <hr><br>

                        <h5>b) Jadwal Sidang Meja Hijau</h5>
                        <p> Jadwal sidang meja hijau akan ditentukan oleh Program Studi. Silahkan periksa jadwal seminar proposal
                            Anda melalui <i>button</i> berikut. </p>

                        @if($mhs->no_statusAkses > 5)
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <!-- preview akan membawa mahasiswa ke halaman form yang ingin diunduh -->
                                <a href="{{('/mahasiswa/jadwal_sidang')}}" class="btn btn-primary btn-sm" target="blank"> <i class="bi bi-eye"></i> Lihat Jadwal </a>
                            </div>
                        @else
                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <!-- preview akan membawa mahasiswa ke halaman form yang ingin diunduh -->
                                <a href="#" class="btn btn-primary btn-sm disabled" target="blank"> <i class="bi bi-eye"></i> Lihat Jadwal </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection