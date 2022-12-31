@extends('mahasiswa/layout')

@section('title')
    <title>Mahasiswa - Profile</title>
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

    <li class="sidebar-item  active">
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
                        <h3>Profile Saya</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('profile_mhs')}}">Profile Saya</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-xl-">
                        <div class="row">
                            <div class="card card-outline-secondary">
                                <br><br>
                                <center>
                                @if(Auth::user()->mhs->foto != NULL)
                                    <img class="image" src="../main/photos/{{Auth::user()->mhs->foto}}" alt="lecturer_image"
                                    style="height: 200px; width:200px" />
                                @else
                                    <img class="card-img-top img-fluid" src="../main/photos/graduate_student.png" alt="default_student_image"
                                    style="height: 200px; width:200px" />
                                    <p><i>Anda belum mengunggah foto profile.</i></p>
                                @endif
                                </center>
                                <!-- ALERT SECTION -->
                                <center>
                                    <div class="col-xl-6 mb-6">            
                                        <div class="table-responsive">
                                            @if(session('status'))
                                                <div class="alert alert-success alert-dismissible show fade">
                                                    <i class="bi bi-check-circle"></i> {{session('status')}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                            @if(session('prohibited'))
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    <i class="bi bi-exclamation-triangle"></i> {{session('prohibited')}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </center>
                                <!-- END ALERT SECTION -->
                                <div class="row align-items-center m-5">
                                    <div class="col-md mb-5">    
                                        <!-- FORM EDIT PROFILE -->
                                        <form class="form form-horizontal" method="post" action="{{route('upd_mhs')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_email" value="{{Auth::user()->email}}">
                                            <input type="hidden" name="old_foto" value="{{Auth::user()->mhs->foto}}">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <label for="new_foto">Ubah Foto</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="file" id="new_foto" class="form-control @error('new_foto') is-invalid @enderror" name="new_foto">
                                                        @error('new_foto')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="nama">NIM</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="id" class="form-control " value="{{Auth::user()->mhs->nim}}" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{Auth::user()->mhs->nama}}">
                                                        @error('nama')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="new_email">Email</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="email" id="new_email" class="form-control @error('email') is-invalid @enderror" name="new_email" value="{{Auth::user()->email}}">
                                                        @error('new_email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <br><br>
                                                    <center>
                                                        <table>
                                                            <tr>
                                                                <td>         
                                                                    <a href="/mahasiswa/dashboard" class="btn btn-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                                                </td>
                                                                <td>
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Perubahan</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM EDIT PROFILE -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
