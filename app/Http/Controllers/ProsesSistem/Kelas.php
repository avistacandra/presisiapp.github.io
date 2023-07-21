<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Models\tb_kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Kelas extends Controller
{
    public function index(Request $request)
    {
        // $kelas = tb_kelas::get();
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $kelas = tb_kelas::where('nm_kelas', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $kelas = tb_kelas::orderBy('nm_kelas', 'asc')->paginate($jumlahbaris);
        }

        return view('kelas.index', ['kelas' => $kelas])->with([
            'user' => Auth::user()
        ]);
    }

    public function create()
    {
        return view('kelas.create')->with([
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kelas' => 'required|max:50',
        ], [
            'nm_kelas.required' => 'Kelas wajib diisi',
        ]);
        tb_kelas::create(['nm_kelas' => $request->nm_kelas]);

        return redirect()->route('kelas/index')->with('success', 'Berhasil melakukan tambah Data Kelas ');
    }

    public function edit($id)
    {
        $kelas = tb_kelas::find($id);

        return view('kelas.edit', ['kelas' => $kelas])->with([
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_kelas' => 'required|max:10',
        ], [
            'nm_kelas.required' => 'Kelas wajib diisi',
        ]);

        tb_kelas::find($id)->update(['nm_kelas' => $request->nm_kelas]);

        return redirect()->route('kelas/index')->with('success', 'Berhasil melakukan Update Data Kelas ');
    }

    public function destroy($id)
    {
        $kelas = tb_kelas::where('id', '=', $id)->first();

        if ($kelas != null) {
            $kelas->delete();
            return redirect()->route('kelas/index')->with('success', 'Berhasil melakukan Delete Data Kelas');
        }
    }
}
