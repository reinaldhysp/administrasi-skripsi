@extends('admin/layout')

@section('title')
    <title>Prodi - Input Nilai IPK</title>
@endsection

@section('sidebar')              
    <li class="sidebar-item">
        <a href="/prodi/dashboard" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item has-sub">
        <a href="/prodi/menu_mahasiswa" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Mahasiswa TA</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="/prodi/menu_mahasiswa/mahasiswa_aktif">Mahasiswa Aktif</a>
            </li>
            <li class="submenu-item ">
                <a href="/kaprodi/menu_mahasiswa/mahasiswa_alumni">Lulus / Alumni</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item ">
        <a href="/prodi/beritaacara" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Berita Acara</span>
        </a>
    </li>
                            
    <li class="sidebar-item  ">
        <a href="/prodi/undangan_daftar_peserta" class='sidebar-link'>
            <i class="bi bi-journal-plus"></i>
            <span>Undangan dan Daftar Peserta</span>
        </a>
    </li>
    <li class="sidebar-item has-sub active">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-clipboard-plus"></i>
            <span>Input Nilai</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item ">
                <a href="{{route('nilai_IPK')}}">Input Nilai IPK</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('nilai_uji_program')}}">Input Nilai Uji Program</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('nilai_semhas')}}">Input Nilai Seminar Hasil</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('nilai_sidang')}}">Input Nilai Sidang Meja Hijau</a>
            </li>
        </ul>
    </li>                          
@endsection


@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Nilai IPK Mahasiswa</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('input_nilai')}}">Input Nilai</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Nilai IPK</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="card card-outline-secondary">
                    <div class="row align-items-center m-5">
                        <div class="col-md mb-6">    
                            <div class="table-responsive">
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
                                <table class="table table-bordered mb-0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama / NIM</th>
                                            <th>Nilai IPK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($mahasiswas as $mhs)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="text-bold-500">{{$mhs->nama}} ({{$mhs->nim}})</td>
                                            <td>
                                                @if($mhs->IPK != NULL)
                                                    {{$mhs->IPK}}
                                                @else
                                                    <p>Nilai IPK belum diinput</p>
                                                @endif
                                            </td>
                                            <td>
                                                <center>
                                                <table>
                                                    <tr>
                                                    @if($mhs->IPK != NULL)
                                                        <td>
                                                            <form action="{{route('edit_nilai_IPK')}}">
                                                                @csrf
                                                                <input type="hidden" name="nim" value="{{$mhs->nim}}">
                                                                <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="{{route('delete_nilai_IPK')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="nim" value="{{$mhs->nim}}">
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus? Anda tidak dapat mengembalikan data yang telah dihapus.')"><i class="bi bi-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td>
                                                            <form action="{{route('add_nilai_IPK')}}" method="GET">
                                                                @csrf
                                                                <input type= "hidden" name= "nim" value= "{{$mhs->nim}}">
                                                                <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i> Daftar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </table>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table><br><br><br>
                            </div>
                            <div class="d-felx justify-content-center">
                               {{ $mahasiswas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection