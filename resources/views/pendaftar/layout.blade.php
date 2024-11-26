<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('NAMA_APLIKASI',null)}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
   @include('pendaftar.css')
  </head>
  <body>
    @include('pendaftar.navbar')
    <div class="d-flex align-items-stretch">
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
        @yield('content')
        </div>
        @include('pendaftar.footer')
      </div>
    </div>
    @include('pendaftar.js')
    @include('alert')
    @stack('scripts')
  </body>
</html>