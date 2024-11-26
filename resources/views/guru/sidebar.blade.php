    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{route('guru.guru')}}" class="sidebar-link text-muted {{ (request()->routeIs('guru.guru')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('guru.data_tahun_ajaran')}}" class="sidebar-link text-muted {{ (request()->routeIs('guru.data_mapel')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Data Mapel</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('guru.data_kelas')}}" class="sidebar-link text-muted {{ (request()->routeIs('guru.data_kelas')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Wali Kelas</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('guru.tahun_ajaran')}}" class="sidebar-link text-muted {{ (request()->routeIs('guru.data_mapel_ujian')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Ujian</span></a></li>
    </div>