@extends('dosen.layout')

@section('title')
    <title>Dosen - Mahasiswa TA</title>
@endsection

@section('sidebar')
    <li class="sidebar-item ">
        <a href="/dosen/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item has-sub active">
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
                    <h3>Mahasiswa Bimbingan</h3>
                    <p class="text-subtitle text-muted">Data Mahasiswa Bimbingan dan Progres Skripsi</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dosen/mahasiswaTA">Mahasiswa TA</a></li>
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
                            <th>Atribut</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{$query[0]->nama}}</td>
                        </tr>
                        <tr>
                            <td>Nim</td>
                            <td>{{$query[0]->nim}}</td>
                        </tr>
                        <tr>
                            <td>Judul Skripsi</td>
                            <td>{{$query[0]->judul_skripsi}}</td>
                        </tr>
                        <tr>
                            <td>Tahun Masuk</td>
                            <td>{{$query[0]->angkatan}}</td>
                        </tr>
                        <?php $i =1 ?>
                        @foreach($query as $qr)
                        <tr>
                            <td>Dosen Pembimbing {{$i}}</td>
                            <td>{{$qr->dosen_pembimbing}}</td>
                        </tr>
                        <?php ++$i ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection