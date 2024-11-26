<!-- navbar-->
<header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">{{env('NAMA_APLIKASI',null)}}</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
        <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{asset('img/favicon.png')}}" alt="Jason Doe" style="width: 2.5rem; height: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{Auth::User()->name}}</strong></a>
            <a href="{{route('form_password_siswa')}}" class="dropdown-item">Ganti Password</a>
              <div class="dropdown-divider"></div><a href="{{route('keluar')}}" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>