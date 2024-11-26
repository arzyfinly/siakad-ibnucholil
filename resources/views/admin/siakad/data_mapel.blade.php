@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Mapel</button>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Kelas </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('input_mapel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Urutan *</label>
                                <input type="number" name="urut" class="form-control" placeholder="Urut Raport" required>
                              </div>
                              <div class="form-group">
                                <label>Nama Mapel *</label>
                                <input type="text" name="nama_mapel" class="form-control" placeholder="Mata pelajaran.." required>
                              </div>
                              <div class="form-group">
                                <label>KKM *</label>
                                <input type="text" name="ket" class="form-control" required placeholder="Keterangan..">
                              </div>
                              <div class="form-group">
                                  <label>Jurusan *</label>
                                  <select class="form-control" name="jurusan_id" id="jurusan" required>
                                  <option>Pilih Jurusan</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label>kelas *</label>
                                  <select class="form-control" name="kelas_id" id="kelas" required> 
                                  <option>Pilih Kelas</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label>Guru Mapel *</label>
                                  <select class="form-control" name="guru_id" id="guru" required> 
                                  <option>Pilih Guru</option>
                                </select>
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Tambah" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of modal -->
      </div>
    </div>
  </div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Kelas</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">KKM</th>
                          <th class="text-center">Jurusan</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Guru</th>
                          <th class="text-center">KD</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      
                    </table>
                    </div>
                  </div>
                </div>
              </div> 
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
      "lengthMenu": [[30, 45, 50, -1], [30, 45, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "{{route('json_mapel')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_mapel', name: 'nama_mapel' },
            { data: 'ket', name: 'ket' },
            { data: 'jurusan', name: 'jurusan' },
            { data: 'kelas', name: 'kelas' },
            { data: 'guru', name: 'guru' },
            {data: 'kd', name: 'kd', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
<script>
//digunakan untuk option jurusan

$(document).ready(function() {
  jQuery.ajax ({
  url: "{{route('json_jurusan')}}",
  dataType: "json",
  success: function(response) {
    console.log(response.data);
    var content = response.data;
  for (k in content) {
  $("#jurusan").append('<option value="'+content[k].id+'">'+content[k].jurusan+'</option>');
       }
     }
   });
});
$(document).ready(function(){
    $("#jurusan").change(function(){
      $("#kelas").html('');
        var selectJurusan = $(this).children("option:selected").val();
        jQuery.ajax ({
          url: "{{route('json_kelas')}}",
          dataType: "json",
          success: function(response) {
            console.log(response.data);
            var content = response.data;
            for (let i = 0; i < content.length; i++) {
              if (content[i].jurusan_id==selectJurusan) {
                $("#kelas").append('<option value="'+content[i].id+'">'+content[i].kelas+'</option>');
              }
            }
          
            }
          });
    });
});
$(document).ready(function(){
  
        jQuery.ajax ({
          url: "{{route('json_guru')}}",
          dataType: "json",
          success: function(response) {
            console.log(response.data);
            var content = response.data;
            for (let i = 0; i < content.length; i++) {
                $("#guru").append('<option value="'+content[i].id+'">'+content[i].nama_lengkap+'</option>');
            }
          
            }
          });
});
</script>
@endpush