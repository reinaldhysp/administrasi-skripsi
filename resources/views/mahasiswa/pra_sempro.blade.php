@extends('mahasiswa/layout');

@section('title')
    <title>Mahasiswa - Pra Seminar Proposal</title>
@endsection

@section('sidebar')              
    <li class="sidebar-item">
        <a href="/mahasiswa/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item active">
        <a href="/mahasiswa/pra_seminar_proposal" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Pra Seminar Proposal</span>
        </a>
    </li>

    <li class="sidebar-item  ">
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
                        <h3>Pra Seminar Proposal</h3>
                        <p class="text-subtitle text-muted">Berkas administrasi pra seminar proposal</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/mahasiswa/dashboard">Mahasiswa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pra Seminar Proposal</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- submenu 1 -->
            <div class="row">
                <div class="col-8">
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i> {{session('status')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('prohibited'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <i class="bi bi-exclamation-triangle"></i> {{session('prohibited')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>01. Formulir Calon Pembimbing</h4>
                        </div>
                        <div class="card-body">
                            <p> Formulir ini Anda butuhkan untuk mengajukan calon pembimbing dan bidang ilmu tulis. 
                                Silahkan cetak formulir atau preview untuk memastikan data Anda sudah benar 
                                sebelum formulir diunduh.</p>

                            <div class="d-grid gap-2 d-md-flex justify-content">
                                <a href="/mahasiswa/calon_pembimbing/{{Auth::user()->id}}" target="blank" class="btn btn-primary btn-sm"><i class="bi bi-printer-fill"></i> Cetak </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end submenu 1 -->

            <!-- submenu 2 -->
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>02. Pra Seminar Proposal</h4>
                        </div>
                        <div class="card-body">
                            <!-- progress seminar proposal akan didapatkan melalui fitur ini -->
                            <h5>a) Formulir Pengajuan Judul </h5>
                            <p> Formulir ini Anda butuhkan sebelum seminar proposal untuk untuk mengajukan judul yang disetujui 
                                dan ringkasan skripsi. Silahkan cetak formulir ini atau preview untuk memastikan 
                                data Anda sudah benar sebelum mengunduh formulir. </p>
                            @if($mhs->no_statusAkses > 0)
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a href="{{('/mahasiswa/pengajuan_judul_skripsi')}}" target="blank" class="btn btn-primary btn-sm">
                                        <i class="bi bi-printer-fill"></i> Cetak</a>
                                </div>
                            @else
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a href="#"><button class="btn btn-primary btn-sm disabled">
                                        <i class="bi bi-printer-fill"></i> Cetak</button></a>
                                </div>
                            @endif

                            <hr><br>

                            <h5>b) Pendaftaran Judul Skripsi</h5>
                            <p> Bagi mahasiswa yang judul skripsinya sudah di-<i>acc</i> oleh dosen pembimbing, silakan menginput judul skripsi pada bagian ini. 
                                Kesesuaian judul yang diinput akan menjadi tanggung jawab mahasiswa. Harap menginput data sebenar-benarnya.
                            </p>

                            @if($mhs->no_statusAkses > 0 && $skripsi_checker == 0)
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a href="{{route('pendaftaran_judul')}}" target="blank" class="btn btn-success btn-sm">
                                        <i class="bi bi-plus-circle"></i> Daftarkan Judul
                                    </a>
                                </div>
                            @elseif($mhs->no_statusAkses > 0)
                                @if($skripsi_checker > 0)
                                    <p>Judul skripsi kamu sudah terdaftar di sistem.</p>
                                    <div class="d-grid gap-2 d-md-flex justify-content">
                                        <form action="{{route('perbaikan_judul')}}">
                                            <input type="hidden" name="nim" value="{{$mhs->nim}}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square"></i> Perbaiki judul skripsi </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="d-grid gap-2 d-md-flex justify-content">
                                        <a href="#"><button class="btn btn-success btn-sm disabled">
                                            <i class="bi bi-pencil-square"></i> Daftarkan Judul </button>
                                        </a>
                                    </div>
                                @endif
                            @endif
                            <hr><br>

                            <h5>c) Jadwal Seminar Proposal</h5>
                            <p> Jadwal seminar proposal akan ditentukan oleh Program Studi. Silahkan periksa jadwal seminar proposal
                                Anda melalui <i>button</i> berikut. </p>
                            @if($mhs->no_statusAkses > 1)
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <!-- preview akan membawa mahasiswa ke halaman form yang ingin diunduh -->
                                    <a href="{{('/mahasiswa/jadwal_sempro')}}"><button class="btn btn-success btn-sm"><i class="bi bi-eye"></i> Lihat Jadwal</button></a>
                                </div>
                            @else
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <!-- preview akan membawa mahasiswa ke halaman form yang ingin diunduh -->
                                    <a href="#"><button class="btn btn-primary btn-sm disabled"><i class="bi bi-eye"></i> Lihat Jadwal</button></a>
                                </div>
                            @endif

                            <hr><br>
                            <h5>d) Lembar Kendali Bimbingan Skripsi Pra Seminar Proposal</h5>
                            <p> Formulir ini Anda butuhkan sebelum seminar proposal untuk menjadi lembar kendali skripsi. 
                                Data Anda terkait rencana judul skripsi, tanggal bimbingan serta catatan selama bimbingan
                                akan di-record menggunakan formulir ini.
                                Silahkan cetak formulir atau preview untuk memastikan data Anda sudah benar sebelum mengunduh formulir. </p>
                            @if($mhs->no_statusAkses > 0 )
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <!-- <a href="{{('/mahasiswa/lembar_kendali_proposal')}}" target="blank" class="btn btn-primary btn-sm"> -->
                                    <a href="{{ route('mhs_lks') }}" target="blank" class="btn btn-primary btn-sm">  
                                        <i class="bi bi-printer-fill"></i> Cetak 
                                    </a>
                                </div>
                            @else
                                <div class="d-grid gap-2 d-md-flex justify-content">
                                    <a href="#"><button class="btn btn-success btn-sm disabled">
                                        <i class="bi bi-printer-fill"></i> Cetak </button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>    
                </div>
            </div>
            <!-- end submenu 2 -->
        </div>
    </div>
@endsection