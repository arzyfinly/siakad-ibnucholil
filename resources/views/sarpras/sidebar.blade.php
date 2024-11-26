    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{route('sarpras.sarpras')}}" class="sidebar-link text-muted {{ (request()->routeIs('sarpras.sarpras')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('sarpras.data_admin')}}" class="sidebar-link text-muted {{ (request()->routeIs('sarpras.data_admin')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Data Admin</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('sarpras.data_ruang')}}" class="sidebar-link text-muted {{ (request()->routeIs('sarpras.data_ruang')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Ruang</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('sarpras.data_barang')}}" class="sidebar-link text-muted {{ (request()->routeIs('sarpras.data_barang')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Sarpras</span></a></li>
              <li class="sidebar-list-item"><a href="{{route('sarpras.scan_qr_code')}}" class="sidebar-link text-muted {{ (request()->routeIs('sarpras.scan_qr_code')) ? 'active' : '' }}"><i class="o-table-content-1 mr-3 text-gray"></i><span>Scan QR</span></a></li>
    </div>