@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Kelas</button>
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
                            <form action="{{route('input_kelas')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Nama Kelas *</label>
                                <input type="text" name="kelas" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Ket *</label>
                                <input type="text" name="ket" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jurusan *</label>
                                <select class="form-control" name="jurusan_id" id="jurusan">
                              </select>
                              </div>
                              <div class="form-group">
                                  <label>Wali Kelas *</label>
                                  <select class="form-control" name="guru_id" id="guru" required> 
                                </select>
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Tambahkan" class="btn btn-primary">
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
                          <th class="text-center">Jurusan</th>
                          <th class="text-center">Wali Kelas</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Keterangan</th>
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
        ajax: "{{route('json_kelas')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'jurusan', name: 'jurusan' },
            { data: 'wali', name: 'wali' },
            { data: 'kelas', name: 'kelas' },
            { data: 'ket', name: 'ket' },
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
</script>
<script>
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
              var url = "{{ route('hapus_kelas', ":id") }}";
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