<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SELAMAT MENGERJAKAN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="_token" content="{{ csrf_token() }}" />

   @include('siswa.css')
  </head>
  <body>
    @include('siswa.navbarsoal')
    <div class="d-flex align-items-stretch">
      
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
        @yield('content')
        </div>
        @include('siswa.footer')
      </div>
    </div>
    @include('siswa.js')
    @stack('scripts')
    @include('alert')
  </body>
</html>