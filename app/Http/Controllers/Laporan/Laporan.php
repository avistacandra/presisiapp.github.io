<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\tb_presensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Laporan extends Controller
{
    public function jadwal(Request $request)
    {
        $admin = DB::table('tb_jadwalbelajar as a')
            ->select('a.*', 'b.nm_guru', 'c.nm_mapel', 'd.nm_kelas', 'e.semester', 'f.thn_ajaran')
            ->join('tb_guru as b', 'a.guru_id', '=', 'b.id')
            ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->join('tb_semester as e', 'a.semester_id', '=', 'e.id')
            ->join('tb_thn_ajaran as f', 'a.tahunajaran_id', '=', 'f.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Jadwal Belajar Admin',
            'admin' => $admin,
        ];
        return view('laporan.jadwalbelajar.admin', $results);
    }

    public function jadwalpdf(Request $request)
    {
        $admin = DB::table('tb_jadwalbelajar as a')
            ->select('a.*', 'b.nm_guru', 'c.nm_mapel', 'd.nm_kelas', 'e.semester', 'f.thn_ajaran')
            ->join('tb_guru as b', 'a.guru_id', '=', 'b.id')
            ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->join('tb_semester as e', 'a.semester_id', '=', 'e.id')
            ->join('tb_thn_ajaran as f', 'a.tahunajaran_id', '=', 'f.id')
            ->get();
        $url = '/download-laporan-jadwal-belajar-admin';
        $results = [
            'pagetitle' => 'Laporan Jadwal Belajar',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.jadwalbelajar.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-jadwal-belajar.pdf');
    }

    public function presensi(Request $request)
{
    // Mendapatkan inputan dari form
    $tanggalMulai = $request->input('tgl_dari');
    $tanggalSampai = $request->input('tgl_sampai');
    $keterangan = $request->input('kategori');
    $pertemuan = $request->input('pertemuan');

    // Query data presensi
    $query = DB::table('tb_presensi as a')
        ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
        ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
        ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
        ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
        ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id');

    // Menambahkan kondisi berdasarkan inputan
    if ($tanggalMulai && $tanggalSampai) {
        $query->whereBetween('a.tgl_absen', [$tanggalMulai, $tanggalSampai]);
    }
    if ($keterangan) {
        $query->where('a.ket_presensi', $keterangan);
    }
    if ($pertemuan) {
        $query->where('a.pertemuan_ke', $pertemuan);
    }

    // Mendapatkan hasil query
    $presensi = $query->get();

    // Mendapatkan total kehadiran
    $totalH = $query->where('a.ket_presensi', 'H')->count();
    $totalI = $query->where('a.ket_presensi', 'I')->count();
    $totalS = $query->where('a.ket_presensi', 'S')->count();
    $totalA = $query->where('a.ket_presensi', 'A')->count();

    // Mendapatkan daftar keterangan
    $keteranganList = DB::table('tb_presensi')->distinct()->pluck('ket_presensi');

    $results = [
        'pagetitle' => 'Data Presensi',
        'presensi' => $presensi,
        'totalH' => $totalH,
        'totalI' => $totalI,
        'totalS' => $totalS,
        'totalA' => $totalA,
        'keterangan' => $keteranganList,
        'url' => '/download-laporan',
    ];
    return view('laporan.presensi.admin', $results);
}


public function presensipdf(Request $request)
{
    // Mendapatkan inputan dari URL
    $tanggalMulai = $request->input('tgl_dari');
    $tanggalSampai = $request->input('tgl_sampai');
    $keterangan = $request->input('kategori');
    $pertemuan = $request->input('pertemuan');

    // Query data presensi
    $query = DB::table('tb_presensi as a')
        ->select('a.*', 'b.nis', 'b.nm_siswa', 'c.nm_mapel', 'd.nm_kelas', 'e.hari', 'e.jam_belajar')
        ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
        ->join('tb_mapel as c', 'a.mapel_id', '=', 'c.id')
        ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
        ->join('tb_jadwalbelajar as e', 'a.jadwalbelajar_id', '=', 'e.id');

    // Menambahkan kondisi berdasarkan inputan
    if ($tanggalMulai && $tanggalSampai) {
        $query->whereBetween('a.tgl_absen', [$tanggalMulai, $tanggalSampai]);
    }
    if ($keterangan) {
        $query->where('a.ket_presensi', $keterangan);
    }
    if ($pertemuan) {
        $query->where('a.pertemuan_ke', $pertemuan);
    }

    // Mendapatkan hasil query
    $admin = $query->get();

    $url = '/download-laporan-presensi-admin';
    $results = [
        'pagetitle' => 'Laporan Jadwal Presensi',
        'admin' => $admin,
        'url' => $url
    ];
    $jadwalpdf = PDF::loadView('laporan.pdf.presensi.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-presensi-mapel.pdf');
}


    public function ijinkeluar(Request $request)
    {
        $admin = DB::table('tb_ijinkeluar as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Ijin Keluar',
            'admin' => $admin,
        ];
        return view('laporan.ijinkeluar.admin', $results);
    }

    public function ijinkeluarpdf(Request $request)
    {
        $admin = DB::table('tb_ijinkeluar as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $url = '/download-laporan-ijin-keluar-admin';
        $results = [
            'pagetitle' => 'Laporan Ijin Keluar',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.ijinkeluar.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-izin-keluar.pdf');
    }

    public function ijinmasuk(Request $request)
    {
        $admin = DB::table('tb_ijinmasuk as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $results = [
            'pagetitle' => 'Laporan Ijin Masuk',
            'admin' => $admin,
        ];
        return view('laporan.ijinmasuk.admin', $results);
    }

    public function ijinmasukpdf(Request $request)
    {
        $admin = DB::table('tb_ijinmasuk as a')
            ->select('a.*', 'b.nm_gp', 'c.nis', 'c.nm_siswa', 'd.nm_kelas')
            ->join('tb_guru_piket as b', 'a.gurupiket_id', '=', 'b.id')
            ->join('tb_siswa as c', 'a.siswa_id', '=', 'c.id')
            ->join('tb_kelas as d', 'a.kelas_id', '=', 'd.id')
            ->get();
        $url = '/download-laporan-ijin-masuk-admin';
        $results = [
            'pagetitle' => 'Laporan Ijin Masuk',
            'admin' => $admin,
            'url' => $url
        ];
        $jadwalpdf = PDF::loadView('laporan.pdf.ijinmasuk.admin', compact('results', 'admin'))->setPaper('a4', 'portrait');
        return $jadwalpdf->stream('laporan-izin-masuk.pdf');
    }


    // public function kehadiran(Request $request)
    // {
    //     $data = DB::table('tb_presensi as a')
    //         ->select('a.*', 'b.nis', 'b.nm_siswa')
    //         ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
    //         ->get();
    //     $hal = DB::table('tb_presensi as a')
    //         ->select('a.*', 'b.nis', 'b.nm_siswa')
    //         ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
    //         ->paginate(3);
    //     $jum = $data->count();
    //     return view('laporan.kehadiran', compact('data', 'hal', 'jum'));
    // }

    // public function kehadiranpdf(Request $request)
    // {
    //     $data = DB::table('tb_presensi as a')
    //         ->select('a.*', 'b.nis', 'b.nm_siswa')
    //         ->join('tb_siswa as b', 'a.siswa_id', '=', 'b.id')
    //         ->get();
    //     $jum = $data->count();
    //     $url = '/download-laporan-ijin-masuk-admin';
    //     return view('laporan.pdf.kehadiran', compact('data', 'jum'));
    // }
}
