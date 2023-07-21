@extends('template.main')

@section('judul')
FORM TAMBAH DATA SEMESTER
@endsection

@section('data-master', 'active')
@section('data-master-show', 'show')
@section('semester', 'active')

@section('isi')

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $row)
            <li>{{ $row }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<a href="{{ route('semester/index') }}" class="btn btn-secondary btn-sm">
    << kembali </a>
        <div class="content-wrapper">
            <form action="{{ route('semester/store') }}" method="post">
                @csrf
                {{-- <a href="{{ route('guru/create') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Semester</h6>
                                </div>
                                <div class="card-body">
                                    {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
                                    {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control form-control-sm" @error('semester') is-invalid @enderror name="semester" id="semester" value="{{ Session::get('semester') }}">
                                            <option disable value>- Pilih -</option>
                                                <option value="Ganjil" {{ old('semester') === 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                                <option value="Genap" {{ old('semester') === 'Genap' ? 'selected' : '' }}>Genap</option>
                                        </select>
                                        @error('semester')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_sem">Status Semester</label>
                                        <select class="form-control form-control-sm" @error('status_sem') is-invalid @enderror name="status_sem" id="status_sem" value="{{ Session::get('status_sem') }}">
                                            <option disable value>- Pilih -</option>
                                                <option value="Aktif" {{ old('status_sem') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ old('status_sem') === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                        @error('status_sem')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
