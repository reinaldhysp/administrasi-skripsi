@extends('mahasiswa/layout');

@section('title')
    <title>Mahasiswa - Perbaiki Judul Skripsi</title>
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
                                <li class="breadcrumb-item"><a href="/mahasiswa/pra_sempro">Pra Seminar Proposal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Judul</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="card card-outline-secondary">
                        <div class="row align-items-center m-5">
                            <div class="col-md mb-5">    
                                <!-- FORM EDIT JUDUL SKRIPSI -->
                                <form class="form form-horizontal" action="{{route('store_new_judul')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$mahasiswa->nim}}" name="nim">
                                    <input type="hidden" value="{{$mahasiswa->judul_skripsi}}" name="old_judul">
                                    <input type="hidden" value="{{$mahasiswa->eng_judul_skripsi}}" name="old_eng_judul">
                                    <input type="hidden" value="{{$mahasiswa->bidang_ilmu}}" name="old_bidang_ilmu">
                                    <div class="form-body">
                                        <div class="row">
                                            <h5>Edit Judul Skripsi</h5> <br><br>
                                            <div class="col-md-4">
                                                <label>NIM</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" value="{{$mahasiswa->nim}}" autocomplete="nim" disabled>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="new_judul_skripsi">Judul Skripsi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="new_judul_skripsi" class="form-control  @error('new_judul_skripsi') is-invalid @enderror" value="{{ $mahasiswa->judul_skripsi }}" name="new_judul_skripsi" autocomplete="new_judul_skripsi">
                                                @error('new_judul_skripsi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="new_eng_judul_skripsi">Judul Skripsi Bahasa Inggris</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="new_eng_judul_skripsi" class="form-control  @error('new_eng_judul_skripsi') is-invalid @enderror" value="{{ $mahasiswa->eng_judul_skripsi }}" name="new_eng_judul_skripsi" autocomplete="new_eng_judul_skripsi">
                                                @error('new_eng_judul_skripsi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="bid_ilmu">Bidang Ilmu</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select id="bid_ilmu" class="form-control  @error('bid_ilmu') is-invalid @enderror"  name="bid_ilmu" required autocomplete="bid_ilmu">
                                                    <option value="{{ $mahasiswa->bidang_ilmu }}">{{ $mahasiswa->bidang_ilmu }}</option>
                                                    @foreach($bidang_ilmu as $bid)
                                                        <option  value="{{$bid->bidang_ilmu}}">{{$bid->bidang_ilmu}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bid_ilmu')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <br>
                                            <center>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM EDIT -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection