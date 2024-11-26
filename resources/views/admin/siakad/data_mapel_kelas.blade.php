@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
      <div class="row">
          <div class="col col-md-12">
            <table>
              <tr>
                <td><strong>Kelas</strong></td>
                <td> : </td>
                <td>{{$kelas->kelas}}</td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td> : </td>
                <td>{{$kelas->ket}}</td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Mapel</button>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah mapel </h4>
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
                                <input type="number" name="ket" class="form-control" required placeholder="Keterangan..">
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
                                <label>Semester *</label>
                                <select class="form-control" name="semester" id="semester" required>
                                  <option value="GANJIL">GANJIL</option>
                                  <option value="GENAP">GENAP</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Tahun Ajaran *</label>
                                <input type="text" name="tahun" class="form-control" required placeholder="Ex. 2019-2020">
                              </div>
                              <div class="form-group">
                                <input hidden type="text" name="jurusan_id" value="{{$kelas->jurusan_id}}" class="form-control" required placeholder="Keterangan..">
                                
                              </div>
                              <div class="form-group">
                                <input hidden type="text" name="kelas_id" value="{{$kelas->id}}" class="form-control" required placeholder="Keterangan..">
                                 
                              </div>
                              <div class="form-group">
                                  <label>Guru Mapel *</label>
                                  <select class="form-control" name="guru_id" id="guru" required> 
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
                    <h6 class="text-uppercase mb-0">Data Mapel</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">KKM</th>
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Semester</th>
                          <th class="text-center">Guru</th>
                          <th class="text-center">KD</th>
                          <th class="text-center">Nilai</th>
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
        processing: true,
        serverSide: true,
        ajax: "{{route('json_mapel_kelas',['id'=>$id,'semester'=>$semester])}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_mapel', name: 'nama_mapel' },
            { data: 'ket', name: 'ket' },
            { data: 'kategori', name: 'kategori' },
            { data: 'semester', name: 'semester' },
            { data: 'guru', name: 'guru' },
            { data: 'kd', name: 'kd', orderable: false, searchable: false},
            { data: 'nilai', name: 'nilai', orderable: false, searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false},
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
<script>
    function confirmDelete(itemId) {
      Swal.fire({
          title: 'Are you sure?',
          text: 'You won\'t be able to revert this!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              // User clicked the "Yes, delete it!" button
              // Perform the deletion, for example, send an AJAX request to delete the item
              var id = itemId;
              var url = "{{ route('hapus_mapel', ":id") }}";
              url = url.replace(':id', id);
  
              $.ajax({
                  url: url, // Replace with your actual delete route
                  method: 'get',
                  success: function(response) {
                      // Handle success, e.g., refresh the page or update the UI
                      // Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
                      Swal.fire({
                          title: 'Deleted!',
                          text: 'Your item has been deleted.',
                          icon: 'success',
                          timer: 2000, // Optional: Set a timer for the success message
                          showConfirmButton: false,
                          timerProgressBar: true,
                          willClose: () => {
                            window.location.reload();
                          }
                      });
                  },
                  error: function(error) {
                      // Handle error, e.g., show an error message
                      Swal.fire('Error!', 'An error occurred while deleting the item.', 'error');
                  }
              });
          }
      });
      }
  </script>
@endpush