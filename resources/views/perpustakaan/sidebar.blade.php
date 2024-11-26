    <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.beranda')}}" class="sidebar-link text-muted {{ (request()->routeIs('perpustakaan.beranda')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.data_admin')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('perpustakaan.data_admin')) ? 'active' : '' }}"><i class="o-home-1 mr-3 text-gray"></i> Admin Perpustakaan</a></li>
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.data_buku')}}" class="sidebar-link text-muted pl-lg-5 {{ (request()->routeIs('perpustakaan.data_buku')) ? 'active' : '' }}"><i class="fa fa-book mr-3 text-gray"></i>Data Buku</a></li>
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.scan_user')}}" class="sidebar-link text-muted pl-lg-5"><i class="fa fa-calendar mr-3 text-gray"></i>Scan</a></li>
            <li class="sidebar-list-item"><a href="{{route('perpustakaan.data_peminjam')}}" class="sidebar-link text-muted pl-lg-5"><i class="fa fa-calendar mr-3 text-gray"></i>Data Peminjam</a></li>
            <!-- <li class="sidebar-list-item"><a href="{{route('perpustakaan.data_denda')}}" class="sidebar-link text-muted pl-lg-5"><i class="fa fa-calendar mr-3 text-gray"></i>Data Denda</a></li> -->
        </ul>
    </div>