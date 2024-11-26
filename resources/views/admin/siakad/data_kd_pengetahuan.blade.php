@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah KD</button>
        <a href="{{route('export_kd_mapel',$mapel_id)}}" target="_blank" class="btn btn-primary">Export Template</a>
        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-primary">Import KD</button>
        <!-- Modal-->
              <div id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Import KD Pengetahuan</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Silahkan tambhakan .</p>
                              <form action="{{route('import_kd_mapel')}}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                  <label>Silahkan import</label>
                                  <input type="text" name="mapel_id" value="{{$mapel_id}}" class="form-control" required hidden>
                                  <input type="text" name="kriteria" value="PENGETAHUAN" class="form-control" required hidden>
                                  <input type="file" name="file" class="form-control" required>
                                </div>
                                
                                <div class="form-group">       
                                  <input type="submit" value="Import" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end of modal -->
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Kompetensi Dasar </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('input_kd_mapel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="mapel_id" value="{{$mapel_id}}" class="form-control" hidden required>
                              </div>
                              <div class="form-group">
                                <label>No KD *</label>
                                <input type="text" name="no_kd" class="form-control" required placeholder="Ex. 1.3.1xxxx">
                              </div>
                              <div class="form-group">
                                <label>KD *</label>
                                <input type="text" name="kd" class="form-control" required placeholder="Kompetensi dasar">
                              </div>
                              <div class="form-group">
                                <label>Kriteria *</label>
                                <select class="form-control" name="kriteria" id="kriteria" required>
                                  <option value="PENGETAHUAN">PENGETAHUAN</option>
                                  <option value="KETERAMPILAN">KETERAMPILAN</option>
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
                    <h6 class="text-uppercase mb-0">Data KD Pengetahuan {{$mapel->nama_mapel}}</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">No. KD</th>
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
        ajax: "{{route('json_kd_pengetahuan',$mapel_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'no_kd', name: 'no_kd' },
            { data: 'kd', name: 'kd' },
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
              var url = "{{ route('hapus_kd_mapel', ":id") }}";
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