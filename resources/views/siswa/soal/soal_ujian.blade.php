@extends('siswa.layout_soal')

@section('content')
<div class="row">
        <div class="col-lg-6" style="margin-top: 5px;">
            <div class="card">
            <div class="card-body">
                <h4>{{$ujian->mapel->nama_mapel}}</h4>
                <h5>Ujian : {{$ujian->jenis}}</h5>
                <span><b>WAKTU Mulai :{{$waktu_mulai}}</b>  | </span>
                <span> | <b>WAKTU selesai : {{$waktu_berakhir}}</b> </span>
            </div>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top: 5px;">
            <div class="card">
            <div class="card-body">
            <span><b>WAKTU INDONESIA </b></span>
                <h3>WAKTU : <b id="waktu"></b></h3>
            </div>
            </div>
        </div>
    </div>
<form>
<div class="row">
@php($b=1)
@foreach($soal_ganda as $datas)
    <div class="col-md-12" style="padding-top:10px; padding-bottom:10px;">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>{{$b}}.</b> {!!$datas->soal_text!!}</p>
                @if ($datas->soal_gambar != null)
                    <img src="{{ url('/').Storage::url($datas->soal_gambar) }}" style="max-width: 700px; max-height: 350px" alt="Preview Gambar">
                @endif
                
                    <div class="form-group">
                        <div class="form-check"><input type="radio" data-id="{{$datas->id}}" name="jawaban{{$b}}" value="A" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">{{$datas->text_a}}</label></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check"><input type="radio" data-id="{{$datas->id}}" name="jawaban{{$b}}" value="B" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">{{$datas->text_b}}</label></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check"><input type="radio" data-id="{{$datas->id}}" name="jawaban{{$b}}" value="C" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">{{$datas->text_c}}</label></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check"><input type="radio" data-id="{{$datas->id}}" name="jawaban{{$b}}" value="D" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">{{$datas->text_d}}</label></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check"><input type="radio" data-id="{{$datas->id}}" name="jawaban{{$b}}" value="E" class="form-check-input" id="formCheck-1" /><label class="form-check-label" for="formCheck-1">{{$datas->text_e}}</label></div>
                    </div>
                
            </div>
        </div>
    </div>
    @php($b++)
@endforeach
<button type="button" data-toggle="modal" data-target="#selesai" class="btn btn-block btn-success btn-lg">Selesai</button>
                        <!-- Modal-->
                        <div id="selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="exampleModalLabel" class="modal-title">Yakin Selesai?</h4>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    *Jika yakin telah mengerjakan sesuai kemampuan klik <span class="badge badge-warning text-white">Selesai!</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-xs btn-danger"><b>Belum Selesai</b></button>
                                    <a href="{{route('soal.selesai_ujian',[$ujian_id,$siswa_id,$waktu_mulai])}}"class="btn btn-xs btn-warning"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Selesai!</b></a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- end of modal -->
<br>
</div>
</form>
@endsection
@push('scripts')
<script>
//input data jawaban peserta
$(document).ready(function() {
   var jenis_ujian='{{$ujian->jenis}}';
   var krs_id='{{$krs_id}}';
   var mapel_id='{{$mapel_id}}';
   var kelas_id='{{$kelas_id}}';
   var ujian_id='{{$ujian_id}}';
   var siswa_id='{{$siswa_id->id}}';
   var lenk ='{{$b}}';
    for (let i = 1; i < lenk; i++) {
        $('input[name="jawaban'+i+'"]').on('change', function(){
        var soal_id=$(this).data('id');
        var jawaban = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // Update record
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                url: "{{route('jawaban.input_jawaban')}}",
                method: 'POST',
                data: {_token: CSRF_TOKEN,ujian:ujian_id,siswa:siswa_id,soal:soal_id,jawaban:jawaban,mapel:mapel_id,kelas:kelas_id,krs:krs_id,jenis_ujian:jenis_ujian},
                success: function(response) {
                    console.log(response);

                    if (response=="Jawaban Terkirim") {
                        console.log("Sukses!");
                    }else if (response=="Jawaban diganti") {
                        console.log("diganti!");
                    }else{
                        console.log("Gagal!");
                    }
                }
            });
           
        });
    }
  
});
</script>
<script>
        var url = "{{route('ujian.data_nilai_ujian_siswa')}}";
        // Mengatur waktu akhir perhitungan mundur
        //var countDownDate = new Date("Dec 5, 2020 15:37:25").getTime();
        var countDownDate = new Date("{{$waktu_berakhir}}").getTime();

        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {

        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();
        //console.log(Date());
        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;
            
        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Keluarkan hasil dalam elemen dengan id = "demo"
        //document.getElementById("waktu").innerHTML = days + "Hari " + hours + "Jam " + minutes + "Menit " + seconds + "Detik ";
        document.getElementById("waktu").innerHTML = hours + " Jam : " +minutes + " Menit : " + seconds + " Detik ";
            
        // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            clearInterval(x);
            //document.getElementById("demo").innerHTML = "EXPIRED";
            swal({
                        title: "Good job!",
                        text: "Sesi Selesai Silahkan Lanjutkan",
                        icon: "success",
                        })
                        .then((value) => {
                            window.location.href = url
                        });
        }
        }, 1000);
</script>
@endpush