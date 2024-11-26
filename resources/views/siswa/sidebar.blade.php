<div id="sidebar" class="sidebar py-3">
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
    <ul class="sidebar-menu list-unstyled">
          <li class="sidebar-list-item"><a href="{{route('siswa')}}" class="sidebar-link text-muted {{ (request()->routeIs('siswa')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
          <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#tes" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Detail Siswa</span></a>
            <div id="tes" class="collapse {{ (request()->routeIs('data_pribadi','data_sekolah','data_ayah','data_ibu','data_wali','data_jurusan_siswa')) ? 'show' : '' }}">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="{{route('data_pribadi')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_pribadi')) ? 'active' : '' }}">Data Pribadi</a></li>
                <li class="sidebar-list-item"><a href="{{route('data_sekolah')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_sekolah')) ? 'active' : '' }}">Data Sekolah</a></li>
                <li class="sidebar-list-item"><a href="{{route('data_ayah')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_ayah','data_soal1')) ? 'active' : '' }}">Data Ayah</a></li>
                <li class="sidebar-list-item"><a href="{{route('data_ibu')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_ibu')) ? 'active' : '' }}">Data Ibu</a></li>
                <li class="sidebar-list-item"><a href="{{route('data_wali')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_wali')) ? 'active' : '' }}">Data Wali</a></li>
                <li class="sidebar-list-item"><a href="{{route('data_jurusan_siswa')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_jurusan_siswa')) ? 'active' : '' }}">Jurusan</a></li>
              </ul>
            </div>
        </li>
        <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#nilai" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Nilai Siswa</span></a>
            <div id="nilai" class="collapse {{ (request()->routeIs('siswa_nilai_pengetahuan','siswa_nilai_keterampilan')) ? 'show' : '' }}">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="{{route('siswa_nilai_pengetahuan')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('siswa_nilai_pengetahuan')) ? 'active' : '' }}">Pengetahuan</a></li>
                <li class="sidebar-list-item"><a href="{{route('siswa_nilai_keterampilan')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('siswa_nilai_keterampilan')) ? 'active' : '' }}">Keterampilan</a></li>
              </ul>
            </div>
        </li>
        <li class="sidebar-list-item"><a href="{{route('siswa.data_kelas')}}" class="sidebar-link text-muted {{ (request()->routeIs('siswa.data_kelas')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Soal Ujian</span></a></li>
        <li class="sidebar-list-item"><a href="{{route('data_skl_siswa')}}" class="sidebar-link text-muted {{ (request()->routeIs('data_skl_siswa')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>SKL SISWA</span></a></li>
    </ul>
</div>