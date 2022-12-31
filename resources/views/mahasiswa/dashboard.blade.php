@extends('mahasiswa/layout')

@section('title')
    <title>Mahasiswa - Dashboard</title>
@endsection

@section('sidebar')              
    <li class="sidebar-item active">
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
                            
    <li class="sidebar-item  ">
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
                        <h3>Dashboard</h3>
                        <p class="text-subtitle text-muted">Selamat datang kembali! </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <!-- SHORTCUT 1 -->
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Pra Seminar Proposal</h4>
                                        <p class="card-text">
                                        Berkas administrasi pra seminar proposal
                                        </p>
                                        <a href="/mahasiswa/pra_sempro" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- END SHORTCUT 1 -->

                        <!-- SHORTCUT 2 -->
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Pra Seminar Hasil</h4>
                                        <p class="card-text">
                                        Berkas Administrasi Pra Seminar Hasil
                                        </p>
                                        <a href="/mahasiswa/pra_semhas" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- END SHORTCUT 2 -->

                        <!-- SHORTCUT 3 -->
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Pra Sidang Meja Hijau</h4>
                                        <p class="card-text">
                                        Berkas Administrasi Pra Sidang Meja Hijau
                                        </p>
                                        <a href="/mahasiswa/pra_sidang" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- END SHORTCUT 3 -->

                        <!-- SHORTCUT 4 -->
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Pasca Sidang Meja Hijau</h4>
                                        <p class="card-text">
                                        Proses lanjutan pra sidang meja hijau
                                        </p>
                                        <a href="pasca_meja_hijau" class="btn btn-primary btn-sm"><i class="bi bi-check-circle"></i> Akses</a>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- END SHORTCUT 4 -->
                    </div>
                </div>

                <!-- PROFILE - PROGRESS -->
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <br>
                            @if ($profile->foto != NULL)
                            <center>
                                <img class="" src="../main/photos/{{$profile->foto}}" alt="student_image"
                                style="height: 200px; width:200px " />
                            </center>
                            @else
                            <center>
                                <img class="card-img-top img-fluid" src="../main/photos/graduate_student.png" alt="default_student_image"
                                style="height: 200px; width:200px" />
                            </center>
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{$profile->nama}}</h4>
                                <p class="card-text"><br>
                                    <div class="progress progress-primary  mb-2">
                                        <div class="progress-bar progress-label" role="progressbar" style="width: {{$percent}}%" aria-valuenow="{{$percent}}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> 
                                    <br>
                                    Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$profile->nama}} <br>
                                    NIM  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$profile->nim}} <br>
                                    Angkatan &nbsp; &nbsp;: {{$profile->angkatan}} <br>
                                    Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$profile->status}}
                                    <br><br>
                                    Judul Skripsi&nbsp;&nbsp;: <br>
                                        @if ($profile->judul_skripsi == NULL)    
                                            <i>Judul Skripsi Belum Terdaftar</i><br><br>
                                        @else 
                                            <i>{{$profile->judul_skripsi}}</i><br><br>
                                        @endif
                                    
                                    Tahap Skripsi&nbsp;: <br>{{$status_akses->keterangan}}.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE -->
            </div>
        </div>    
    </div>
@endsection
