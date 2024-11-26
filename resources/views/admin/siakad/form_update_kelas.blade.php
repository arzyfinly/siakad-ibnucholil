@extends('admin.layout')

@section('content')
</br>
</br>

 <div class="row">

 <!-- Basic Form-->

 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Update Kelas</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_kelas',$kelas->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Nama Kelas *</label>
                <input type="text" name="kelas" class="form-control" required value="{{$kelas->kelas}}">
              </div>
              <div class="form-group">
                <label>Ket *</label>
                <select class="form-control" name="ket" id="tahun" required> 
                </select>
              </div>
              <div class="form-group">
                  <label>Wali Kelas *</label>
                  <select class="form-control" name="guru_id" id="guru" required> 
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
$(document).ready(function(){
  var guru = {{$kelas->guru_id}};
  jQuery.ajax ({
    url: "{{route('json_guru')}}",
    dataType: "json",
    success: function(response) {
      console.log(response.data);
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
<script>
$(document).ready(function(){
  jQuery.ajax ({
    url: "{{route('json_tahun_ajaran',$kelas->jurusan_id)}}",
    dataType: "json",
    success: function(response) {
      console.log(response.data);
      var content = response.data;
      for (let i = 0; i < content.length; i++) {
          if (guru==content[i].id) {
          $("#tahun").append('<option value="'+content[i].tahun+'" selected>'+content[i].tahun+'</option>');
          }else{
          $("#tahun").append('<option value="'+content[i].tahun+'">'+content[i].tahun+'</option>');
          }
      }
    
      }
    });
});
</script>
@endpush