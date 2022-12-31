@extends('admin/layout')

@section('title')
    <title>Admin - Riwayat Pendaftaran Skripsi</title>
@endsection

@section('sidebar')        
    <li class="sidebar-item">
        <a href="/admin/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item has-sub">
        <a href="{{route('mhs_ta')}}" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Mahasiswa TA</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('aktif')}}">Mahasiswa Aktif</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('alumni')}}">Lulus / Alumni</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Pra Seminar Proposal</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('daftar_dosbing')}}">Dosen Pembimbing</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('daftar_skripsi')}}">Judul Skripsi</a>
            </li>
            <li class="submenu-item ">
                <a href="/admin/validasi_sempro">Berkas Administrasi</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item has-sub">
        <a href="{{route('prasemhas_menu')}}" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Pra Seminar Hasil</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('daftar_dosenPenguji')}}">Dosen Penguji</a>
            </li>
            <li class="submenu-item ">
                <a href="/admin/validasi_semhas">Berkas Administrasi</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a href="/admin/validasi_sidang" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Pra Sidang Meja Hijau</span>
        </a>
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-person-badge-fill"></i>
            <span>Manajemen User</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="/admin/manajemen_admin">Admin</a>
            </li>
            <li class="submenu-item ">
                <a href="/admin/manajemen_prodi">Prodi</a>
            </li>
            <li class="submenu-item ">
                <a href="/admin/manajemen_dosen">Dosen</a>
            </li>
            <li class="submenu-item ">
                <a href="/admin/manajemen_mhs">Mahasiswa</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-pen-fill"></i>
            <span>Penjadwalan</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('jadwal_sempro')}}">Seminar Proposal</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('jadwal_semhas')}}">Seminar Hasil</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('jadwal_sidang')}}">Sidang Meja Hijau</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item has-sub active">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-clock-history"></i>
            <span>Riwayat Aktivitas</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('log_pendaftaran_dosbing')}}">Riwayat Pendaftaran Dosbing</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('log_pengubahan_dosbing')}}">Riwayat Pengubahan Dosbing</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('log_penghapusan_dosbing')}}">Riwayat Penghapusan Dosbing</a>
            </li>
            <li class="submenu-item active">
                <a href="{{route('log_pendaftaran_skripsi')}}">Riwayat Pendaftaran Judul Skripsi</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('log_pengubahan_skripsi')}}">Riwayat Pengubahan Skripsi</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('log_penghapusan_skripsi')}}">Riwayat Penghapusan Skripsi</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a href="{{route('profile_admin')}}" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Profile Saya</span>
        </a>
    </li>

    <li class="sidebar-item has-sub ">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-clipboard-plus"></i>
            <span>Input Nilai</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('adm_nilai_IPK')}}">Input Nilai IPK</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('adm_nilai_uji_program')}}">Input Nilai Uji Program</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('adm_nilai_semhas')}}">Input Nilai Seminar Hasil</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('nilai_sidang_admin')}}">Input Nilai Sidang Meja Hijau</a>
            </li>
        </ul>
    </li>   
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Riwayat Aktivitas Pendaftaran Skripsi</h3>
                    <p class="text-subtitle text-muted">Judul skripsi dapat didaftarkan oleh admin dan mahasiswa.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('log_aktivitas')}}">Riwayat Aktivitas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pendaftaran Skripsi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- FORM UNTUK CARI RIWAYAT -->
        <div class="row">
            <form action="{{route('cariLogDaftarSkripsi')}}">
                @csrf
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="keyword" placeholder="Cari Riwayat Pendaftaran...">
                        </td>
                        <td>
                            <button class="btn btn-primary" type = "submit"><i class="b bi-search"></i> </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- END FORM CARI-->

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="card card-outline-secondary">
                    <div class="row align-items-center m-5">
                        <div class="col-xl-12 mb-6">    
                            <!-- DAFTAR RIWAYAT  PENDAFTARAN SKRIPSI -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pengguna</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Detail Aktivitas</th>
                                            <td>Tanggal</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($logs as $log)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="text-bold-500">{{$log->id_user}}</td>
                                            <td>{{$log->nama_pendaftar}}</td>
                                            <td>
                                                @if($log->registered_by == 'mahasiswa')
                                                    <p>Mahasiswa bersangkutan ({{$log->nama_pendaftar}} | $log->nim) mendaftarkan judul skripsi sebagai berikut: <br>
                                                        <b>{{$log->judul_skripsi}} <b>
                                                    </p>
                                                @else
                                                    <p>Admin {{$log->nama_pendaftar}} mendaftarkan judul skripsi mahasiswa dengan NIM <b>{{$log->nim}}</b> sebagai berikut: <br>
                                                        <b>{{$log->judul_skripsi}}<b>
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                {!! date('d, M Y', strtotime($log->created_at)) !!}
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table><br>
                                
                                <br><br>
                            </div>
                            <div class="d-felx justify-content-center">
                                {{ $logs->links() }}
                            </div>                        

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    
@endsection