@extends('template.main')

@section('judul')
FORM TAMBAH DATA MATA PELAJARAN
@endsection

@section('data-master', 'active')
@section('data-master-show', 'show')
@section('mapel', 'active')

@section('isi')
<a href="{{ route('data/mapel') }}" class="btn btn-secondary btn-sm">
    << kembali </a>
        <div class="content-wrapper">
            <form action="{{ route('simpan/mapel') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kelas</h6>
                            </div>
                            <div class="card-body">
                                {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
                                {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
                                <div class="form-group">
                                    <label for="nm_mapel">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" name="nm_mapel" id="nm_mapel" value="{{ Session::get('nm_mapel') }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @endsection



        {{-- @extends('template.main')

@section('judul')
FORM TAMBAH DATA MATA PELAJARAN
@endsection

@section('isi')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Data Mata Pelajaran</h4>
        <p class="card-description">
        Tambah Data Mata Pelajaran
        </p>
        <form class="forms-sample">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleSelectGender">Gender</label>
            <select class="form-control" id="exampleSelectGender">
                <option>Male</option>
                <option>Female</option>
            </select>
            </div>
        <div class="form-group">
            <label for="exampleInputCity1">City</label>
            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Textarea</label>
            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
    </div>
    </div>
</div>

@endsection      --}}
