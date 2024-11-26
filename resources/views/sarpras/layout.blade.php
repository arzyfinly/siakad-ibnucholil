<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('NAMA_APLIKASI',null)}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <script src="{{ asset('js/instascan.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="_token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   @include('sarpras.css')
  </head>
  <body>
    @include('sarpras.navbar')
    <div class="d-flex align-items-stretch">
      @include('sarpras.sidebar')
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
        @yield('content')
        </div>
        @include('sarpras.footer')
      </div>
    </div>
    @include('sarpras.js')
    @include('alert')
    @stack('scripts')
  </body>
</html>