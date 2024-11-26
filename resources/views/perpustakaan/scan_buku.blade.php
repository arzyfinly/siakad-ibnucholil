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
<div class="container-fluid px-xl-5">
    <div class="row">
            <div class="col-12">
                <h1 align="center">Scan Buku</h1>
                <div id="kamera"></div>             
            </div>
        </div>

 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data peminjam</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">No. Klasifikasi</th>
                          <th class="text-center">Buku</th>
                        </tr>
                      </thead>
                    </table>
                    </div>
                  </div>
                </div>
              </div> 
</div>
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('perpustakaan.json_peminjam_user',$user_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'pic', name: 'pic' },            
            { data: 'no_klasifikasi', name: 'no_klasifikasi' },
            { data: 'buku', name: 'buku' },
        ],
    });
});
</script>
<script>
            $(document).ready(function(){
                $("#kamera").html("<div class='embed-responsive embed-responsive-4by3'><video id='rahman'></video></div>");
                let scanner = new Instascan.Scanner({ video: document.getElementById('rahman'),mirror: false });
                scanner.addListener('scan', function (content) {
                    var id = content;
                    
                        var url='{{url("/")}}/perpustakaan/input_peminjam_user/{{$user_id}}/'+id;
                            window.location.replace(url);
                            // console.log(url);
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
