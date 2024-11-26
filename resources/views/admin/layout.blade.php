<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('NAMA_APLIKASI',null)}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">

   @include('admin.css')
  </head>
  <body>
  @if(Auth::User()->role_id==1)
    @include('admin.navbar')
    @else
      @include('guru.navbar')
      @endif
    <div class="d-flex align-items-stretch">
    @if(Auth::User()->role_id==1)
      @include('admin.sidebar')
      @else
      @include('guru.sidebar')
      @endif
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
        @yield('content')
        </div>
        @include('admin.footer')
      </div>
    </div>
    @include('admin.js')
    @include('alert')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
  </body>
</html>