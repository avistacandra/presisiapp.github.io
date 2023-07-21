@extends('template.main')

@section('judul')
FORM TAMBAH DATA TAHUN AJARAN
@endsection

@section('data-master', 'active')
@section('data-master-show', 'show')
@section('tahunajaran', 'active')

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
<a href="{{ route('ta/index') }}" class="btn btn-secondary btn-sm">
    << kembali </a>
        <div class="content-wrapper">
            <form action="{{ route('ta/store') }}" method="post">
                @csrf
                {{-- <a href="{{ route('guru/index') }}" class="btn btn-secondary btn-sm"><< kembali </a> --}}
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Tahun Ajaran</h6>
                                </div>
                                <div class="card-body">
                                    {{-- <h4 class="card-title">Tambah Data Kelas</h4> --}}
                                    {{-- <p class="card-description">
        Silahkan Input Kelas
        </p> --}}
                                    <div class="form-group">
                                        <label for="thn_ajaran">Tahun Ajaran</label>
                                        <select class="form-control form-control-sm" @error('thn_ajaran') is-invalid @enderror name="thn_ajaran" id="thn_ajaran">
                                                <option disable value>- Pilih -</option>
                                                @php
                                                    $currentYear = date('Y');
                                                    $startYear = $currentYear - 10;
                                                    $endYear = $currentYear + 10;
                                                @endphp

                                                @for ($year = $startYear; $year <= $endYear; $year++)
                                                    @php
                                                        $nextYear = $year + 1;
                                                        $optionValue = $year . '/' . $nextYear;
                                                        $isSelected = old('thn_ajaran') === $optionValue ? 'selected' : '';
                                                    @endphp
                                                    <option value="{{ $optionValue }}" {{ $isSelected }}>{{ $optionValue }}</option>
                                                @endfor
                                        </select>
                                        @error('thn_ajaran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_ta">Status Semester</label>
                                        <select class="form-control form-control-sm" @error('status_ta') is-invalid @enderror name="status_ta" id="status_ta">
                                            <option disable value>- Pilih -</option>
                                            <option value="Aktif" {{ old('status_ta') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="Tidak Aktif" {{ old('status_ta') === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                        @error('status_ta')
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
