@extends('perpustakaan.layout')

@section('content')
@if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
    <div class="container-fluid px-xl-1">
    `   <div class="row">
            <div class="col-12">
                <h1 align="center">Scan Kartu Peminjam</h1>
                <div id="kamera"></div>             
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script>
            $(document).ready(function(){
                $("#kamera").html("<div class='embed-responsive embed-responsive-4by3'><video id='rahman'></video></div>");
                let scanner = new Instascan.Scanner({ video: document.getElementById('rahman'),mirror: false });
                scanner.addListener('scan', function (content) {
                    var id = content;
                    
                        var url='{{url("/")}}/perpustakaan/scan_buku/'+id;
                            // console.log(url);
                            window.location.replace(url);
                            // window.open(url);
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 1) {
                        scanner.start(cameras[1]);
                    } else if(cameras.length > 0){
                        scanner.start(cameras[0]);
                    }else {
                    console.error('No cameras found.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
            });
</script>
@endpush
