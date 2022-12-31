@extends('dosen/layout')

@section('title')
    <title>Dosen - Dashboard</title>
@endsection

@section('sidebar')
    <li class="sidebar-item active   ">
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

    <li class="sidebar-item  ">
        <a href="jadwalSeminarSidang" class='sidebar-link'>
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
                            <h3>Dashboard</h3>
                            <p class="text-subtitle text-muted">Halaman Utama</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dosen</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card card-outline-secondary">
                        <div class="row align-items-center m-5">
                            <div class="col-md mb-5">
                                <h4>Selamat Datang, Dosen Pembimbing!</h4>
                                <p>
                                Untuk mengetahui berbagai jadwal mahasiswa bimbingan anda dalam mencicil skripsi, anda bisa melihatnya disini. Disini anda bisa melihat berbagai jadwal mahasiswa bimbingan anda untuk seminar proposal, seminal hasil, dan sidang meja hijau. Anda juga bisa melihat progress sudah sejauh mana mahasiswa bimbingan anda mencicil skripsi. Anda juga bisa melihat detail data mahasiswa bimbingan anda. Diharapkan untuk para dosen pembimbing agar mengingat jadwal - jadwal tersebut untuk setiap mahasiswanya.
                                </p>
                            </div>
                            <div class="col-md-auto">
                                <img style="height: 10rem" src="{{asset('assets/images/dosen.png')}}" >	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <!-- SHORTCUT 1 -->
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title">Jadwal Seminar Proposal</h4>
                                                <p class="card-text">
                                                    Jadwal Seminar Proposal Mahasiswa Bimbingan
                                                </p>
                                                <a href="/dosen/sempro" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <!-- END SHORTCUT 1 -->

                                <!-- SHORTCUT 2 -->
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title">Jadwal Seminar Hasil</h4>
                                                <p class="card-text">
                                                    Jadwal Seminar Hasil Mahasiswa Bimbingan
                                                </p>
                                                <a href="/dosen/semhas" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <!-- END SHORTCUT 2 -->

                                <!-- SHORTCUT 3 -->
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <h4 class="card-title">Jadwal Sidang Meja Hijau</h4>
                                                <p class="card-text">
                                                    Jadwal Sidang Meja Hijau Mahasiswa Bimbingan
                                                </p>
                                                <a href="/dosen/mejaHijau" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <!-- END SHORTCUT 3 -->

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
@endsection