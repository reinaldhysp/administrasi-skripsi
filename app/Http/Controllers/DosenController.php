<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Skripsi;
use Illuminate\Support\Facades\Auth;
use PDF;

class DosenController extends Controller
{

    public $nim;

    public function berkasBeritaAcara($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $query = DB::table('dosens')
            ->select('nama', 'nip')
            ->whereNotIn('nip', (function ($query) {
                $query->from('dosen_pembimbings')
                    ->select('nip_dosbing2')
                    ->where('nim', '=', function ($query) {
                        $query->from('mahasiswas')
                            ->select('nim')
                            ->where('nim', '=', $this->nim);
                    });
            }))
            ->get();

        $skripsi = DB::table('skripsis')
            ->select('judul_skripsi','bidang_ilmu')
            ->where('nim','=',function($skripsi){
                $skripsi->from('mahasiswas')
                    ->select('nim')
                    ->where('nim','=',$this->nim);
            })->get();
        return view('dosen.berkas.beritaAcaraSempro', compact('mahasiswa','query','skripsi'));
    }

    public function berkasPenilaianSempro($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $query = DB::table('dosens')
            ->select('nama', 'nip')
            ->whereNotIn('nip', (function ($query) {
                $query->from('dosen_pembimbings')
                    ->select('nip_dosbing2')
                    ->where('nim', '=', function ($query) {
                        $query->from('mahasiswas')
                            ->select('nim')
                            ->where('nim', '=', $this->nim);
                    });
            }))
            ->get();

        $skripsi = DB::table('skripsis')
            ->select('judul_skripsi','bidang_ilmu')
            ->where('nim','=',function($skripsi){
                $skripsi->from('mahasiswas')
                    ->select('nim')
                    ->where('nim','=',$this->nim);
            })->get();

        return view('dosen.berkas.penilaianKelayakanSempro',compact('mahasiswa','query','skripsi'));
    }

    public function berkasPersetujuanSemhas($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $query = DB::table('dosens')
            ->select('nama', 'nip')
            ->whereNotIn('nip', (function ($query) {
                $query->from('dosen_pembimbings')
                    ->select('nip_dosbing2')
                    ->where('nim', '=', function ($query) {
                        $query->from('mahasiswas')
                            ->select('nim')
                            ->where('nim', '=', $this->nim);
                    });
            }))
            ->get();

        $skripsi = DB::table('skripsis')
            ->select('judul_skripsi','bidang_ilmu')
            ->where('nim','=',function($skripsi){
                $skripsi->from('mahasiswas')
                    ->select('nim')
                    ->where('nim','=',$this->nim);
            })->get();

        return view('dosen.berkas.persetujuanSemhas',compact('mahasiswa','query','skripsi'));
    }

    public function berkasBeritaAcaraSemhas($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $query = DB::table('dosens')
            ->select('nama', 'nip')
            ->whereNotIn('nip', (function ($query) {
                $query->from('dosen_pembimbings')
                    ->select('nip_dosbing2')
                    ->where('nim', '=', function ($query) {
                        $query->from('mahasiswas')
                            ->select('nim')
                            ->where('nim', '=', $this->nim);
                    });
            }))
            ->get();

        $skripsi = DB::table('skripsis')
            ->select('judul_skripsi','bidang_ilmu')
            ->where('nim','=',function($skripsi){
                $skripsi->from('mahasiswas')
                    ->select('nim')
                    ->where('nim','=',$this->nim);
            })->get();

        return view('dosen.berkas.beritaAcaraSemhas',compact('mahasiswa','query','skripsi'));
    }

    public function berkasPersetujuanSidang($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $query = DB::table('dosens')
            ->select('nama', 'nip')
            ->whereNotIn('nip', (function ($query) {
                $query->from('dosen_pembimbings')
                    ->select('nip_dosbing2')
                    ->where('nim', '=', function ($query) {
                        $query->from('mahasiswas')
                            ->select('nim')
                            ->where('nim', '=', $this->nim);
                    });
            }))
            ->get();

        $skripsi = DB::table('skripsis')
            ->select('judul_skripsi','bidang_ilmu')
            ->where('nim','=',function($skripsi){
                $skripsi->from('mahasiswas')
                    ->select('nim')
                    ->where('nim','=',$this->nim);
            })->get();

        return view('dosen.berkas.persetujuanSidang',compact('mahasiswa','query','skripsi'));
    }

    public function berkasKataPengantarSidang($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        return view('dosen.berkas.kataPengantarSidang', compact('mahasiswa'));
    }

    public function berkasBeritaAcaraSidang($nim)
    {
        $this->nim = $nim;
        $mahasiswa = Mahasiswa::findOrFail($nim);

        return view('dosen.berkas.beritaAcaraSidang',compact('mahasiswa'));
    }

    public function index()
    {
        return view('dosen.dashboard');
    }

    //INI MON
    public function mahasiswaTA()
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $mahasiswa = DB::table('v_progress_skripsi as ps')
                    ->join('v_mhs_bimbingan as db','ps.nim','=','db.nim')
                    ->join('status_akses as sk','ps.nim','=','sk.nim')
                    ->select('db.nama_mhs','db.nim','ps.persentase_skripsi','ps.keterangan')
                    ->where('nip',$nip->nip)->where('sk.no_statusAkses','<','7')
                    ->get();

         $angkatan = DB::table('mahasiswas as m')
                    -> select('m.angkatan')
                    -> distinct()
                    -> get();
        // dd($mahasiswa);
        return view('dosen.mahasiswaBimbingan-dosen', compact('mahasiswa', 'angkatan'));
    }

    public function mahasiswaLulus()
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $mahasiswa = DB::table('v_progress_skripsi as ps')
                    ->join('v_mhs_bimbingan as db','ps.nim','=','db.nim')
                    ->join('mahasiswas as m','ps.nim','=','m.nim')
                    ->select('db.nama_mhs','db.nim')
                    ->where('nip',$nip->nip)->where('m.status','=','Lulus')
                    ->get();
        // dd($mahasiswa);
        return view('dosen.mahasiswaBimbinganLulus-dosen', compact('mahasiswa'));
    }

    //INI MON
    public function detailMahasiswa($nim)
    {
        $query = DB::table('v_detail_mhs')->where('nim',$nim)
                ->select('nama','nim','angkatan','judul_skripsi','dosen_pembimbing')
                ->get();
        // dd($query);
        return view('dosen.layoutMahasiswadetail', compact('query'));
    }

    public function search_mhs_lulus(Request $request)
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $mahasiswa = DB::table('v_progress_skripsi as ps')
                    ->join('v_mhs_bimbingan as db','ps.nim','=','db.nim')
                    ->join('mahasiswas as m','ps.nim','=','m.nim')
                    ->select('db.nama_mhs','db.nim')
                    ->where('nip',$nip->nip)->where('m.status','=','Lulus')
                    ->where('db.nama_mhs','like',"%". $request->keyword . "%")->where('nip',$nip->nip)
                    ->orWhere('db.nim','like',"%" . $request->keyword . "%")->where('nip',$nip->nip)
                    ->paginate(25);

        $counter = $mahasiswa->count(); 
        // dd($counter);

        return view('dosen/hasil_pencarian_lulus',compact('mahasiswa','counter'));
    }

    public function search_mhs_aktif(Request $request)
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $mahasiswa = DB::table('v_progress_skripsi as ps')
                    ->join('v_mhs_bimbingan as db','ps.nim','=','db.nim')
                    ->join('status_akses as sk','ps.nim','=','sk.nim')
                    ->select('db.nama_mhs','db.nim','ps.persentase_skripsi','ps.keterangan')
                    ->where('nip',$nip->nip)->where('sk.no_statusAkses','<','7')
                    ->where('ps.keterangan','like',"%" . $request->keyword . "%")
                    ->orWhere('ps.persentase_skripsi','like',"%" . $request->keyword . "%")->where('nip',$nip->nip)
                    ->orWhere('db.nama_mhs','like',"%" . $request->keyword . "%")->where('nip',$nip->nip)
                    ->orWhere('db.nim','like',"%" . $request->keyword . "%")->where('nip',$nip->nip)
                    ->get();
        // dd($mahasiswa);

        $counter = $mahasiswa->count();
        
        $angkatan = DB::table('mahasiswas as m')
                    -> select('m.angkatan')
                    -> distinct()
                    -> get();

        return view('dosen/hasil_pencarian_aktif',compact('mahasiswa','counter','angkatan'));
    }

    public function filter(Request $request)
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $mahasiswa = DB::table('v_progress_skripsi as ps')
                    ->join('v_mhs_bimbingan as db','ps.nim','=','db.nim')
                    ->join('mahasiswas as m', 'ps.nim','=','m.nim')
                    ->join('status_akses as sk','ps.nim','=','sk.nim')
                    ->select('db.nama_mhs','db.nim','ps.persentase_skripsi','ps.keterangan','m.angkatan')
                    ->where('nip',$nip->nip)->where('sk.no_statusAkses','<','7')
                    ->where('m.angkatan','=',$request->angkatan)
                    ->get();
    
        // dd($mahasiswa);

        $angkatan = DB::table('mahasiswas as m')
                    -> select('m.angkatan')
                    -> distinct()
                    -> get();
        $sum = $mahasiswa->count();
        $tahun = $request->angkatan;

        return view('dosen/filter',compact('mahasiswa','angkatan','sum','tahun'));
    }

    public function mahasiswaBimbingan()
    {
        return view('dosen.mahasiswaTA');
    }

    public function lembar_kendali($nim)
    { 
        $this->nim = $nim;
        return view('dosen.lembar_kendali', compact('nim'));
    }

    public function lembar_kendali_sempro($nim)
    {
        $data       = DB::table('mahasiswas as m')
                    ->  join('dosen_pembimbings as dp', 'm.nim', '=', 'dp.nim')
                    ->  leftJoin('skripsis as s', 'm.nim', '=', 's.nim')
                    ->  join('jadwal_sempros as j', 'm.nim', '=', 'j.nim')
                    ->  select('m.nim', 'm.nama', 'dp.nip_dosbing1', 'dp.nip_dosbing2', 's.judul_skripsi', 'j.tanggal_sempro')
                    ->  where('m.nim', '=', $nim)
                    ->  first();
        $tanggal    = Carbon::parse($data->tanggal_sempro)->translatedFormat('l, d F Y');
        $dosbing1   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing1)->select('nama')->first();
        $dosbing2   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing2)->select('nama')->first();
        return view('dosen.berkas.lembar_kendali_sempro', compact('data', 'dosbing1', 'dosbing2','tanggal'));
    }

    public function lembar_kendali_semhas($nim)
    {
        $data   = DB::table('mahasiswas as m')
                    ->join('dosen_pembimbings as dp', 'm.nim', '=', 'dp.nim')
                    ->join('skripsis as s', 'm.nim', '=', 's.nim')
                    ->join('jadwal_semhas as j', 'm.nim', '=', 'j.nim')
                    ->select('m.nim', 'm.nama', 'dp.nip_dosbing1', 'dp.nip_dosbing2', 's.judul_skripsi', 'j.tanggal_semhas')
                    ->where('m.nim', '=', $nim)
                    ->first();
        $tanggal    = Carbon::parse($data->tanggal_semhas)->translatedFormat('l, d F Y');
        $dosbing1   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing1)->select('nama')->first();
        $dosbing2   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing2)->select('nama')->first();

        return view('dosen.berkas.lembar_kendali_semhas', compact('data', 'dosbing1', 'dosbing2', 'tanggal'));
    }

    public function lembar_kendali_sidang($nim)
    {
        $data   = DB::table('mahasiswas as m')
                    ->join('dosen_pembimbings as dp', 'm.nim', '=', 'dp.nim')
                    ->join('skripsis as s', 'm.nim', '=', 's.nim')
                    ->join('jadwal_sidangs as j', 'm.nim', '=', 'j.nim')
                    ->select('m.nim', 'm.nama', 'dp.nip_dosbing1', 'dp.nip_dosbing2', 's.judul_skripsi', 'j.tanggal_sidang')
                    ->where('m.nim', '=', $nim)
                    ->first();

        $tanggal    = Carbon::parse($data->tanggal_sidang)->translatedFormat('l, d F Y');
        $dosbing1   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing1)->select('nama')->first();
        $dosbing2   = DB::table('dosens')->where('nip', '=', $data->nip_dosbing2)->select('nama')->first();
        return view('dosen.berkas.lembar_kendali_sidang', compact('data', 'dosbing1', 'dosbing2', 'tanggal'));
    }

    public function mahasiswaUji()
    {
        return view('dosen.mahasiswaUji.mahasiswaUji-dosen');
    }

    //INI MON
    public function mejaHijau()
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $query = DB::table('jdSidangMejaHijau')
                ->where('nip',$nip->nip)
                ->orderBy('tanggal_sidang','DESC')
                ->get();
        return view('dosen.sidangMejaHijau',compact('query'));
    }

    public function mejaHijau1()
    {
        return view('dosen.mahasiswaUji.mejaHijau-dosen');
    }

    public function pascaMeHij()
    {
        return view('dosen.mahasiswaBimbingan.pascaMeHij-dosen');
    }

    public function pascaMeHij1()
    {
        return view('dosen.mahasiswaUji.pascaMeHij-dosen');
    }

    public function praMehij()
    {
        return view('dosen.mahasiswaBimbingan.praMehij-dosen');
    }

    public function praMehij1()
    {
        return view('dosen.mahasiswaUji.praMehij-dosen');
    }

    public function progresSkripsi()
    {
        return view('dosen.mahasiswaBimbingan.progresSkripsi-dosen');
    }

    public function semhas()
    {
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $query = DB::table('v_jdSemhas')
                ->where('nip',$nip->nip)
                ->orderBy('tanggal_semhas','DESC')
                ->get();
        return view('dosen.semhas',compact('query'));
    }

    public function semhas1()
    {
        return view('dosen.mahasiswaUji.semhas-dosen');
    }

    public function sempro()
    {
        // dd($data);
        $nip= Dosen::where('id_user', Auth::user()->id)->select('nip')->first();
        $query = DB::table('v_jdSempro')
                ->where('nip',$nip->nip)
                ->orderBy('tanggal_sempro','DESC')
                ->get();

        return view('dosen.sempro',compact('query'));
    
    }

    public function sempro1()
    {
        return view('dosen.mahasiswaUji.sempro-dosen');
    }

    public function jadwalSeminarSidang()
    {
        return view('dosen.mahasiswaBimbingan.sidMejaHijau-dosen');
    }

    public function sidMejaHijau1()
    {
        return view('dosen.mahasiswaUji.sidMejaHijau-dosen');
    }
}