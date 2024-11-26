@extends('admin.layout')

@section('content')
</br>
</br>
 <div class="row">

 <!-- Basic Form-->

 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Update Mapel</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_mapel',$mapel->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Urutan *</label>
                <input type="number" value="{{$mapel->urut}}" name="urut" class="form-control" placeholder="Urutan Raport" required>
              </div>
              <div class="form-group">
              <label>Nama Mapel *</label>
                <input type="text" value="{{$mapel->nama_mapel}}" name="nama_mapel" class="form-control" placeholder="Mata pelajaran.." required>
              </div>
              <div class="form-group">
                <label>Ket *</label>
                <input type="text" value="{{$mapel->ket}}" name="ket" class="form-control" required placeholder="Keterangan..">
              </div>
              <div class="form-group">
                                <label>Kategori *</label>
                                <select class="form-control" name="kategori" id="kategori" required>
                                  <option value="Muatan Nasional">Muatan Nasional</option>
                                  <option value="Muatan Kewilayahan">Muatan Kewilayahan</option>
                                  <option value="Dasar Bidang Keahlian">C1. Dasar Bidang Keahlian</option>
                                  <option value="Dasar Program Keahlian">C2. Dasar Program Keahlian</option>
                                  <option value="Kompetensi Keahlian">C3. Kompetensi Keahlian</option>
                                  <option value="MULOK">MULOK</option>
                                </select>
                              </div>
              <div class="form-group">
                  <label>Guru Mapel *</label>
                  <select class="form-control" name="guru_id" id="guru" required> 
                  <option>Pilih Guru</option>
                </select>
              </div>
              
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- batas bawah -->
  </div>
@endsection
@push('scripts')

<script>
//digunakan untuk option jurusan

$(document).ready(function() {
  jQuery.ajax ({
  url: "{{route('json_jurusan')}}",
  dataType: "json",
  success: function(response) {
    var jur = "{{$mapel->jurusan_id}}";
    console.log(jur);
    var content = response.data;
        for (let i = 0; i < content.length; i++) {
            if (jur==content[i].id) {
                $("#jurusan").append('<option value="'+content[i].id+'" selected>'+content[i].jurusan+'</option>');  
            }else{
                $("#jurusan").append('<option value="'+content[i].id+'">'+content[i].jurusan+'</option>');  
            }
        }
     }
   });
});

$(document).ready(function(){
  
        jQuery.ajax ({
          url: "{{route('json_guru')}}",
          dataType: "json",
          success: function(response) {
            console.log(response.data);
            var guru = "{{$mapel->guru_id}}";
            console.log(guru);

            var content = response.data;
            for (let i = 0; i < content.length; i++) {
                
                if (guru==content[i].id) {
                $("#guru").append('<option value="'+content[i].id+'" selected>'+content[i].nama_lengkap+'</option>');
                    
                }else{
                $("#guru").append('<option value="'+content[i].id+'">'+content[i].nama_lengkap+'</option>');
                }
            }
          
            }
          });
});
</script>
@endpush