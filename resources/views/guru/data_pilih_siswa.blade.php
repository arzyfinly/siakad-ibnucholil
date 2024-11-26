@extends('guru.layout')

@section('content')
</br>
</br>

 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pilih Siswa Untuk Kelas {{$data->kelas}}</h6>
                  </div>
                  <div class="card-body">  
                 
                  <form action="{{route('guru.input_krs')}}" method="post">
                  @csrf
                  <div class="form-group">
                                <label>Semester *</label>
                                <select class="form-control" name="semester" id="semester" required>
                                  <option value="GANJIL">GANJIL</option>
                                  <option value="GENAP">GENAP</option>
                                </select>
                              </div>
                  <div class="form-group">
                 <input type="date" name="tahun" id=""  class="form-control" required>
                  </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                  </div>
                  <div class="form-group">
                  <input type="text" name="kelas_id" value="{{$kelas_id}}" hidden>
                  </div>
                  <div class="form-group">
                  <div class="table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Pilih</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Tahun Diterima</th>
                        </tr>
                      </thead>
                    </table>
                    </div>
                    </div>
                  </form>                      
                    
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
        ajax: "{{route('guru.json_pilih_siswa')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'pilih', name: 'pilih' },
            { data: 'nis', name: 'nis' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'tahun', name: 'tahun' },
        ],
    });
});
</script>
<script>
//digunakan untuk option paket ajax
$(document).ready(function() {
  jQuery.ajax ({
  url: "#",
  dataType: "json",
  success: function(response) {
    console.log(response.data);
    var content = response.data;
  for (k in content) {
  $("#paket").append('<option value="'+content[k].id+'">'+content[k].nama_paket+'</option>');
       }
     }
   });
});
</script>
@endpush