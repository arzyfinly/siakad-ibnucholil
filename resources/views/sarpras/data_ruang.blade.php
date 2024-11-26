@extends('sarpras.layout')

@section('content')
 <div class="container-fluid px-xl-5">
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Ruang</button>
                <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Sarana dan Prasarana</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('sarpras.input_ruang')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Nama Ruang *</label>
                                <input type="text" name="nama_ruang" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Kode Ruang *</label>
                                <input type="text" name="kode_ruang" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Panjang *</label>
                                <input type="text" name="panjang" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Lebar *</label>
                                <input type="text" name="lebar" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Nominal *</label>
                                <input type="text" name="nominal" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Foto Gedung *</label>
                                <input type="file" name="foto_gedung" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Keterangan *</label>
                                <input type="text" name="keterangan" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Perolehan *</label>
                                <input type="text" name="perolehan" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Tahun *</label>
                                <input type="text" name="tahun" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Milik *</label>
                                <input type="text" name="milik" class="form-control" required>
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
                <h6 class="text-uppercase mb-0">Data Sarpras Ruang</h6>
            </div>
            <div class="card-body">  
                <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Ruang</th>
                                <th class="text-center">Kode Ruang</th>
                                <th class="text-center">Panjang</th>
                                <th class="text-center">Lebar</th>
                                <th class="text-center">Luas</th>
                                <th class="text-center">Nominal</th>
                                <th class="text-center">Foto Gedung</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Perolehan</th>
                                <th class="text-center">Tahun Perolehan</th>
                                <th class="text-center">Milik</th>
                                <th class="text-center">Aksi</th>
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
        ajax: "{{route('sarpras.json_ruang')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_ruang', name: 'nama_ruang' },
            { data: 'kode_ruang', name: 'kode_ruang' },
            { data: 'panjang', name: 'panjang' },
            { data: 'lebar', name: 'lebar' },
            { data: 'luas', name: 'luas' },
            { data: 'nominal', name: 'nominal' },
            { data: 'foto_gedung', name: 'foto_gedung' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'perolehan', name: 'perolehan' },
            { data: 'tahun', name: 'tahun' },
            { data: 'milik', name: 'milik' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
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
              var url = "{{ route('hapus_ruang', ":id") }}";
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