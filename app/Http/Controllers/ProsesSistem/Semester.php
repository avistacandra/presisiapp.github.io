<?php

namespace App\Http\Controllers\ProsesSistem;

use Illuminate\Http\Request;
use App\Models\tb_semester;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Semester extends Controller
{

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $semester = tb_semester::where('semester', 'like', "%$katakunci%")
                ->orWhere('status_sem', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $semester = tb_semester::orderBy('semester', 'desc')->paginate($jumlahbaris);
        }

        return view('semester.indexsem', ['semester' => $semester])->with([
            'user' => Auth::user()
        ]);
    }

    public function create()
    {
        $tb_semester = tb_semester::all();
        return view('semester.createsem', ['semester' => $tb_semester])->with([
            'user' => Auth::user()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|max:30',
            'status_sem' => 'required|max:30',
        ], [
            'semester.required' => 'Semester wajib diisi',
            'status_sem.required' => 'Status semester wajib diisi',
        ]);
        tb_semester::create([
            'semester' => $request->semester,
            'status_sem' => $request->status_sem,
        ]);

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Tambah Data');
    }


    public function edit($id)
    {
        $semester = tb_semester::find($id);

        return view('semester.editsem', compact('semester'))->with([
            'user' => Auth::user()
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required',
            'status_sem' => 'required',
        ], [
            'semester.required' => 'Semester wajib diisi',
            'status_sem.required' => 'Status semester wajib diisi',
        ]);

        $semester = tb_semester::find($id);
        $semester->semester = $request->semester;
        $semester->status_sem = $request->status_sem;
        $semester->save();

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Update Data');
    }

    public function updateStatus($id)
    {
        $semester = tb_semester::find($id);

        // Memperbarui status berdasarkan nilai sebaliknya
        if ($semester->status_sem == 'Aktif') {
            $semester->status_sem = 'Tidak Aktif';
        } else {
            $semester->status_sem = 'Aktif';
        }

        $semester->save();

        return redirect()->route('semester/index')->with('success', 'Berhasil Memperbarui Status');
    }


    public function destroy($id)
    {
        tb_semester::find($id)->delete();

        return redirect()->route('semester/index')->with('success', 'Berhasil Melakukan Hapus Data');
    }
}
