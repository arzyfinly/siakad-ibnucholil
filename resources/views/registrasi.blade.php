<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('NAMA_APLIKASI',null)}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{asset('css/orionicons.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.png?3')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{asset('img/registrasi.svg')}}" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">{{env('SEKOLAH_NAMA',null)}}</h1>
            <h2 class="mb-4">Selamat Datang !</h2>
            <p class="text-muted">Silahkan daftarkan diri anda di SMKS IBNU CHOLIL</p>
            <form id="loginForm" action="{{route('daftar')}}" class="mt-4" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                  <div class="col-md-6">
                    <input placeholder="Wajib nama lengkap" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>
                  <div class="col-md-6">
                    <input placeholder="Isi NISN yang Benar" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                      @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                  <div class="col-md-6">
                    <div class="custom-control custom-radio custom-control-inline">
                            <input id="customRadioInline1" type="radio" name="jk" value="L" class="custom-control-input">
                            <label for="customRadioInline1" class="custom-control-label">Laki - Laki</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input id="customRadioInline2" type="radio" name="jk" value="P" class="custom-control-input">
                            <label for="customRadioInline2" class="custom-control-label">Perempuan</label>
                          </div>
                      @error('jk')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Handphone') }}</label>
                  <div class="col-md-6">
                    <input placeholder="Contoh : 0852xxxx" id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
                      @error('no_hp')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
            <!-- <p>* Pastikan Nomor <strong>Handphone</strong> yang kamu masukan <strong>Benar</strong>. Password dan Username akan dikrim via SMS ke nomor tersebut</p> -->
              <button type="submit" class="btn btn-primary shadow px-5">Daftar</button>
              <p></p>
              <p>Sudah Daftar? <a href="{{route('login')}}" >Masuk Sini</a></p>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">{{env('NAMA_APLIKASI',null)}}</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{asset('js/front.js')}}"></script>
    @include('alert')
  </body>
</html>