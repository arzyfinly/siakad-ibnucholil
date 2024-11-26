    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{route('admin')}}" class="sidebar-link text-muted {{ (request()->routeIs('admin')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('data_siswa')}}" class="sidebar-link text-muted {{ (request()->routeIs('data_siswa')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Data Siswa</span></a></li>
        </ul>
    </div>