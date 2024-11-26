    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="{{route('admin')}}" class="sidebar-link text-muted {{ (request()->routeIs('admin')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#tes" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>PPDB</span></a>
                <div id="tes" class="collapse {{ (request()->routeIs('data_verified','data_unverified','data_pendaftar')) ? 'show' : '' }}">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="{{route('data_pendaftar')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_pendaftar')) ? 'active' : '' }}">Pendaftar</a></li>
                    <li class="sidebar-list-item"><a href="{{route('data_unverified')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_unverified')) ? 'active' : '' }}">Unverified</a></li>
                    <li class="sidebar-list-item"><a href="{{route('data_verified')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_verified')) ? 'active' : '' }}">Verified</a></li>
                </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#siakad" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>SIAKAD</span></a>
                <div id="siakad" class="collapse {{ (request()->routeIs('data_siswa','data_guru','data_jurusan','data_kelas_jurusan','data_kelas','data_mapel')) ? 'show' : '' }}">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="{{route('data_siswa')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_siswa')) ? 'active' : '' }}"><span>Data Siswa</span></a></li>
                    <li class="sidebar-list-item"><a href="{{route('data_guru')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_guru')) ? 'active' : '' }} ">Data Guru</a></li>
                    <li class="sidebar-list-item"><a href="{{route('data_jurusan')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_jurusan','data_kelas_jurusan')) ? 'active' : '' }}">Data Jurusan</a></li>
                    <li class="sidebar-list-item"><a href="{{route('data_kelas')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('data_kelas')) ? 'active' : '' }}">Data Kelas</a></li>
                </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#sarpras" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>SARPRAS</span></a>
                <div id="sarpras" class="collapse {{ (request()->routeIs('sarpras.data_admin','sarpras.data_barang')) ? 'show' : '' }}">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="{{route('sarpras.data_admin')}}" target="_blank" class="sidebar-link text-muted pl-lg-5">Admin Sarpras</a></li>
                    <li class="sidebar-list-item"><a href="{{route('sarpras.data_barang')}}" target="_blank" class="sidebar-link text-muted pl-lg-5">Data Sarpras</a></li>
                </ul>
                </div>
            </li>
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.beranda')}}" target="_blank" class="sidebar-link text-muted {{ (request()->routeIs('perpustakaan.beranda')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>PERPUSTAKAAN</span></a></li>
        </ul>
    </div>