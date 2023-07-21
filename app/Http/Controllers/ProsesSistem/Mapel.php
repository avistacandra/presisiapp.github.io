<?php

namespace App\Http\Controllers\ProsesSistem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\tb_mapel;

class Mapel extends Controller
{
    public function index(Request $request)
    {
        // $data = [
        //     'dataMapelController' => tb_mapel::all()
        // ];
        // $mapel = tb_mapel::get();
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $mapel = tb_mapel::where('nm_mapel', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $mapel = tb_mapel::orderBy('nm_mapel', 'asc')->paginate($jumlahbaris);
        }

        return view('mapel.data-mapel', ['mapel' => $mapel])->with([
            'user' => Auth::user()
        ]);
    }

    public function create()
    {
        return view('mapel.tambah-mapel')->with([
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        // $namamapel = $r->namamapel;

        // $mapel = new tb_mapel;
        // $mapel->nm_mapel = $namamapel;
        // $mapel->save();

        // $data = [
        //     'nm_mapel'=> $request->nm_mapel
        // ];
        // tb_mapel::create($data);
        // return redirect()->route('data-mapel');
        // tb_mapel::create($request->all());
        // return redirect()->route('data-mapel')->with('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
        $request->validate([
            'nm_mapel' => 'required|max:50',
        ], [
            'nm_mapel.required' => 'Mata Pelajaran wajib diisi',
        ]);
        tb_mapel::create(['nm_mapel' => $request->nm_mapel]);

        return redirect()->route('data/mapel')->with('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        // $data = tb_mapel::find($id);
        // $data = [
        //     'dataMapelController' => tb_mapel::find($id)
        // ];
        // dd($data);
        // return view('mapel.tampildata-mapel', compact('data'))->with([
        //     'user' => Auth::user()
        // ]);
        $mapel = tb_mapel::find($id);

        return view('mapel.tampildata-mapel', ['mapel' => $mapel])->with([
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        // $data = tb_mapel::find($id);
        // $data->update($request->all());
        // return redirect()->route('data-mapel')->with('success', 'Data Mata Pelajaran Berhasil Di Update');
        $request->validate([
            'nm_mapel' => 'required|max:50',
        ], [
            'nm_mapel.required' => 'Mata Pelajaran wajib diisi',
        ]);
        tb_mapel::find($id)->update(['nm_mapel' => $request->nm_mapel]);

        return redirect()->route('data/mapel')->with('success', 'Data Mata Pelajaran Berhasil Di Update');
    }

    public function destroy($id)
    {
        tb_mapel::find($id)->delete();

        return redirect()->route('data/mapel')->with('success', 'Data Mata Pelajaran Berhasil Di Hapus');
    }
}
