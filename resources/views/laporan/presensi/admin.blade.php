@extends('template.main')

@section('judul')
LAPORAN PRESENSI
@endsection

@section('laporan', 'active')
@section('laporan-show', 'show')
@section('lpm', 'active')

@section('isi')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Form Laporan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Laporan Presensi</h4>
                        <a class="btn btn-md btn-success btn-sm text-white mb-3" href="{{ route('presensi.pdf', ['tgl_dari' => @$_GET['tgl_dari'], 'tgl_sampai' => @$_GET['tgl_sampai'], 'kategori' => @$_GET['kategori'], 'pertemuan' => @$_GET['pertemuan']]) }}"><i class="fa fa-print"></i> Cetak PDF</a>
                        <form action="{{ route('laporan/presensi') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-9 d-flex gap-1 mb-2">
                                    <input type="date" class="form-control" value="{{ @$_GET['tgl_dari'] }}" name="tgl_dari">
                                    <p>s.d.</p>
                                    <input type="date" class="form-control" value="{{ @$_GET['tgl_sampai'] }}" name="tgl_sampai">
                                    <select name="kategori" class="form-select">
                                        <option value="">-- Keterangan --</option>
                                        <option value="H" {{ @$_GET['kategori'] == 'H' ? 'selected' : '' }}>Hadir</option>
                                        <option value="I" {{ @$_GET['kategori'] == 'I' ? 'selected' : '' }}>Izin</option>
                                        <option value="S" {{ @$_GET['kategori'] == 'S' ? 'selected' : '' }}>Sakit</option>
                                        <option value="A" {{ @$_GET['kategori'] == 'A' ? 'selected' : '' }}>Alpha</option>
                                    </select>
                                    <select name="pertemuan" class="form-select">
                                        <option value="">-- Pertemuan --</option>
                                        @for ($i = 1; $i <= 14; $i++)
                                        <option value="{{ $i }}" {{ @$_GET['pertemuan'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <button class="btn btn-success text-white btn-sm">Tampil</button>
                                    <a href="{{ route('laporan/presensi') }}" class="btn btn-warning text-white btn-sm"><i class="bi bi-arrow-clockwise"></i> Reset</a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <tr class="font-12">
                                <th style="width: 90px">NIS</th>
                                <th style="width: 90px">Nama Siswa</th>
                                <th style="width: 200px">Nama Mapel</th>
                                <th style="width: 200px">Kelas</th>
                                <th style="width: 200px">Pertemuan Ke</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 200px">Hadir</th>
                                <th style="width: 200px">Izin</th>
                                <th style="width: 200px">Sakit</th>
                                <th style="width: 200px">Alpha</th>
                                <th style="width: 200px">Tanggal Presensi</th>
                            </tr>
                            @foreach ($presensi as $data)
                            <tr>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nm_siswa }}</td>
                                <td>{{ $data->nm_mapel }}</td>
                                <td>{{ $data->nm_kelas }}</td>
                                <td>{{ $data->pertemuan_ke }}</td>
                                <td>{{ $data->ket_presensi }}</td>
                                <td>{{ $data->ket_presensi == 'H' ? 1 : 0 }}</td>
                                <td>{{ $data->ket_presensi == 'I' ? 1 : 0 }}</td>
                                <td>{{ $data->ket_presensi == 'S' ? 1 : 0 }}</td>
                                <td>{{ $data->ket_presensi == 'A' ? 1 : 0 }}</td>
                                <td>{{ $data->tgl_absen }}</td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
