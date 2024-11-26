@extends('sarpras.layout')

@section('content')
</br>
</br>
<center>
@php($camera=0)
<div id="not"></div>
    
    <video autoplay="true" id="preview" ></video>
    <script type="text/javascript" language="javascript" class="init">
     
var data;
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: true });
      scanner.addListener('scan', function (content) {
        data = content;
        //alert(data);
        //var audio = new Audio('Bleep.mp3');
        //audio.play();
    $(document).ready(function() {
       $("#qr").val(data);
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // Update record
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
        url: "{{route('sarpras.cek_barang')}}",
        method: 'POST',
        data: {_token: CSRF_TOKEN,qr: data},
        dataType : "json",
        success: function(response) {
            console.log(response);
            var content = response;
            var a="{{url('/')}}{{ Storage::url('/') }}";
            var urlasli=a+response.pic;
            console.log(urlasli);

            Swal.fire({
                title: response.nama_barang,
                text: 'Kode : '+response.kode_barang+' kondisi barang saat ini '+response.status,
                
                });
        }
      });
		});
        
      });

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[{{$camera}}]);

        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      
    </script>
@endsection