<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item  @yield('home')">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">DASHBOARD</span>
            </a>
        </li>

@if(Auth::user()->level==1)


<li class="nav-item @yield('data-master')">
    <a class="nav-link" href="#data-master" data-bs-toggle="collapse" aria-expanded="false" aria-controls="data-master">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('data-master-show')" id="data-master">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('guru')" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link @yield('kelas')" href="{{ route('kelas/index') }}">Data Kelas</a></li>
            <li class="nav-item"> <a class="nav-link @yield('mapel')" href="{{ route('data/mapel') }}">Data Mapel</a></li>
            <li class="nav-item"> <a class="nav-link @yield('semester')" href="{{ route('semester/index') }}">Data Semester</a></li>
            <li class="nav-item"> <a class="nav-link @yield('tahunajaran')" href="{{ route('ta/index') }}">Data Tahun Ajaran</a></li>
            <li class="nav-item"> <a class="nav-link @yield('siswa')" href="{{ route('siswa/index') }}">Data Siswa</a></li>
            <li class="nav-item"> <a class="nav-link @yield('gurupiket')" href="{{ route('gp/index') }}">Data Guru Piket</a></li>
        </ul>
    </div>
</li>

<li class="nav-item @yield('proses-sistem')">
    <a class="nav-link" href="#proses-sistem" data-bs-toggle="collapse" aria-expanded="false" aria-controls="proses-sistem">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('proses-sistem-show')" id="proses-sistem">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('jadwalbelajar')" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li>
            {{-- <li class="nav-item"> <a class="nav-link @yield('presensimapel')" href="{{ route('pm/index') }}">Data Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link @yield('ijinkeluar')" href="{{ route('hs/index') }}">Data Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link @yield('ijinmasuk')" href="{{ route('im/index') }}">Data Ijin Masuk</a></li> --}}
        </ul>
    </div>
</li>

<li class="nav-item @yield('laporan')">
    <a class="nav-link" href="#laporan" data-bs-toggle="collapse" aria-expanded="false" aria-controls="laporan">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('laporan-show')" id="laporan">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('ljb')" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link @yield('lpm')" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link  @yield('ijinkeluar')" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link  @yield('ijinmasuk')" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
            {{-- <li class="nav-item"> <a class="nav-link  @yield('lk')" href="{{ route('lap/kehadiran') }}">Laporan Kehadiran</a></li> --}}
        </ul>
    </div>
</li>


@elseif(Auth::user()->level==2)

{{-- <li class="nav-item @yield('data-master')">
    <a class="nav-link" href="#data-master" data-bs-toggle="collapse" aria-expanded="false" aria-controls="data-master">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('data-master-show')" id="data-master">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('guru')" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link @yield('siswa')" href="{{ route('siswa/index') }}">Data Siswa</a></li>
        </ul>
    </div>
</li> --}}

<li class="nav-item @yield('proses-sistem')">
    <a class="nav-link" href="#proses-sistem" data-bs-toggle="collapse" aria-expanded="false" aria-controls="proses-sistem">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('proses-sistem-show')" id="proses-sistem">
        <ul class="nav flex-column sub-menu">
            {{-- <li class="nav-item"> <a class="nav-link @yield('jadwalbelajar')" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li> --}}
            <li class="nav-item"> <a class="nav-link @yield('presensimapel')" href="{{ route('pm/index') }}">Data Presensi Mapel</a></li>
        </ul>
    </div>
</li>

<li class="nav-item @yield('laporan')">
    <a class="nav-link" href="#laporan" data-bs-toggle="collapse" aria-expanded="false" aria-controls="laporan">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('laporan-show')" id="laporan">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('ljb')" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link @yield('lpm')" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
        </ul>
    </div>
</li>

@elseif(Auth::user()->level==3)

<li class="nav-item @yield('data-master')">
    <a class="nav-link" href="#data-master" data-bs-toggle="collapse" aria-expanded="false" aria-controls="data-master">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('data-master-show')" id="data-master">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('guru')" href="{{ route('guru/index') }}">Data Guru</a></li>
            <li class="nav-item"> <a class="nav-link @yield('kelas')" href="{{ route('kelas/index') }}">Data Kelas</a></li>
            <li class="nav-item"> <a class="nav-link @yield('mapel')" href="{{ route('data/mapel') }}">Data Mapel</a></li>
            <li class="nav-item"> <a class="nav-link @yield('siswa')" href="{{ route('siswa/index') }}">Data Siswa</a></li>
        </ul>
    </div>
</li>

<li class="nav-item @yield('proses-sistem')">
    <a class="nav-link" href="#proses-sistem" data-bs-toggle="collapse" aria-expanded="false" aria-controls="proses-sistem">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('proses-sistem-show')" id="proses-sistem">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('jadwalbelajar')" href="{{ route('jb/index') }}">Data Jadwal Belajar</a></li>
        </ul>
    </div>
</li>

<li class="nav-item @yield('laporan')">
    <a class="nav-link" href="#laporan" data-bs-toggle="collapse" aria-expanded="false" aria-controls="laporan">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('laporan-show')" id="laporan">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('ljb')" href="{{ route('laporan/jadwal/belajar') }}">Laporan Jadwal Belajar</a></li>
            <li class="nav-item"> <a class="nav-link @yield('lpm')" href="{{ route('laporan/presensi') }}">Laporan Presensi Mapel</a></li>
            <li class="nav-item"> <a class="nav-link  @yield('ijinkeluar')" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link  @yield('ijinmasuk')" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
        </ul>
    </div>
</li>

@elseif(Auth::user()->level==4)

<li class="nav-item @yield('data-master')">
    <a class="nav-link" href="#data-master" data-bs-toggle="collapse" aria-expanded="false" aria-controls="data-master">
        <i class="mdi mdi-server menu-icon"></i>
        <span class="menu-title">DATA MASTER</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('data-master-show')" id="data-master">
        <ul class="nav flex-column sub-menu">
            {{-- <li class="nav-item"> <a class="nav-link @yield('siswa')" href="{{ route('siswa/index') }}">Data Siswa</a></li> --}}
            <li class="nav-item"> <a class="nav-link @yield('gurupiket')" href="{{ route('gp/index') }}">Data Guru Piket</a></li>
        </ul>
    </div>
</li>


<li class="nav-item @yield('proses-sistem')">
    <a class="nav-link" href="#proses-sistem" data-bs-toggle="collapse" aria-expanded="false" aria-controls="proses-sistem">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">PROSES SISTEM</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('proses-sistem-show')" id="proses-sistem">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link @yield('ijinkeluar')" href="{{ route('hs/index') }}">Data Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link @yield('ijinmasuk')" href="{{ route('im/index') }}">Data Ijin Masuk</a></li>
        </ul>
    </div>
</li>

<li class="nav-item @yield('laporan')">
    <a class="nav-link" href="#laporan" data-bs-toggle="collapse" aria-expanded="false" aria-controls="laporan">
        <i class="mdi mdi-printer menu-icon"></i>
        <span class="menu-title">LAPORAN</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse @yield('laporan-show')" id="laporan">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link  @yield('ijinkeluar')" href="{{ route('ijin/keluar') }}">Laporan Ijin Keluar</a></li>
            <li class="nav-item"> <a class="nav-link  @yield('ijinmasuk')" href="{{ route('ijin/masuk') }}">Laporan Ijin Masuk</a></li>
        </ul>
    </div>
</li>

@endif
</ul>
</nav>

