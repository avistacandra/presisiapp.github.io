<?php

namespace App\Http\Controllers;

use App\Models\tb_guru;
use App\Models\tb_siswa;
use App\Models\tb_kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
{
    $guru = tb_guru::count();
    $siswa = tb_siswa::count();
    $kelas = tb_kelas::count();

    $guru2 = tb_guru::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Year(created_at)"))
        ->pluck('count');

    $siswa2 = tb_siswa::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Year(created_at)"))
        ->pluck('count');

    $kelas2 = tb_kelas::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Year(created_at)"))
        ->pluck('count');

    $totalGuru = $guru + $guru2->sum();
    $totalSiswa = $siswa + $siswa2->sum();
    $totalKelas = $kelas + $kelas2->sum();

    return view('template.home', compact('guru', 'guru2', 'siswa', 'siswa2', 'kelas', 'kelas2', 'totalGuru', 'totalSiswa', 'totalKelas'))->with([
        'user' => Auth::user()
    ]);
}

}
