@extends('template.main')

@section('judul')
DATA PRESENSI HARIAN
@endsection

@section('proses-sistem', 'active')
@section('proses-sistem-show', 'show')
@section('ijinmasuk', 'active')

@section('isi')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Detail Presensi Ijin Masuk</h4>
                <p class="card-description"></p>
                <div class="pull-right">
                    <a href="{{ route('im/index') }}" class="btn btn-secondary btn-sm">Back
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width:30%">Nama Guru Piket</th>
                                    <td>{{ $ijinmasuk->gurupiket->nm_gp ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $ijinmasuk->siswa->nis ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>{{ $ijinmasuk->siswa->nm_siswa ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $ijinmasuk->kelas->nm_kelas ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Jam Masuk</th>
                                    <td>{{ $ijinmasuk->jam_masuk ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Ijin Masuk</th>
                                    <td>{{ $ijinmasuk->tgl_ijinmasuk }}</td>
                                </tr>
                                <tr>
                                    <th>Alasan </th>
                                    <td>{{ $ijinmasuk->ket }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $ijinmasuk->alasan }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
