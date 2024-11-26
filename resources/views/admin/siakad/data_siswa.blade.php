@extends('admin.layout')

@section('content')
</br>
</br>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Import Siswa</button>
        <button type="button" data-toggle="modal" data-target="#export" class="btn btn-success">Download Siswa</button>
        <a href="{{route('buku_besar')}}" class="btn btn-success" target="_blank">Cetak Semua Buku Induk</a>
        <a href="{{route('siswa.cetak_all_idcard')}}" class="btn btn-success" target="_blank">Cetak All Id Card</a>
        <button type="button" data-toggle="modal" data-target="#bukuinduktahunan" class="btn btn-success">Cetak Buku Induk Pertahun</button>
        <button type="submit" form="s_cetak_idcard" class="btn btn-success text-white">Cetak Id Card Pilihan</button>
        <form method="post" target="_blank" id="s_cetak_idcard" action="{{ route('cetak_pilihan_idcard') }}">
          @csrf
          <input type="text" hidden id="cetak_pilihan" name="data">
        </form>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Import Siswa</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('import_siswa')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Silahkan import</label>
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
        <div id="bukuinduktahunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Cetak Berdasarkan Tahun</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('buku_besar_tahunan')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Silahkan Tanggal Masuk</label>
                                <input type="date" name="tahun" class="form-control" required>
                              </div>
                              
                              <div class="form-group">       
                                <input type="submit" value="Export" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of modal -->
                    <div id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Export  Siswa</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Export Siswa.</p>
                            <form action="{{route('export_siswa')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Silahkan Masukan Tahun</label>
                                <input type="date" name="tahun" class="form-control" required>
                              </div>
                              
                              <div class="form-group">       
                                <input type="submit" value="Export" class="btn btn-primary">
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
                    <h6 class="text-uppercase mb-0">Data Siswa SMKS IBNU CHOLIL</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Pilih</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">NISN</th>
                          <th class="text-center">Tahun Masuk</th>
                          <th class="text-center">Nama Lengkap</th>
                          <th class="text-center">Jenis Kelamin</th>
                          <th class="text-center">Jurusan</th>
                          <th class="text-center">SKL</th>
                          <th class="text-center">ID Card</th>
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
    table = $('#users-table').DataTable({
      "lengthMenu": [[30, 45, 50, -1], [30, 45, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "{{route('json_siswa')}}",
        columns: [
            { data: 'DT_RowIndex', class: 'text-center', name: 'DT_RowIndex'},
            { data: 'select', class: 'text-center', name: 'select', orderable: false, searchable: false },
            { data: 'nis', name: 'nis' },
            { data: 'nisn', name: 'nisn' },
            { data: 'tahun', class: 'text-center', name: 'tahun' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'jk', class: 'text-center', name: 'jk' },
            { data: 'pilihan_jurusan', name: 'pilihan_jurusan' },
            { data: 'cetak_skl', class: 'text-center', name: 'cetak_skl' },
            { data: 'cetak_idcard', class: 'text-center', name: 'cetak_idcard' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    
    let id_selected = new Array();
     // Event listener to handle checkbox selection
     $('#users-table tbody').on('change', 'input.form-control', function() {
        var selectedRow = table.row($(this).closest('tr')).data();
        var selectedId = selectedRow.id; // Assuming your data structure has an 'id' property
        
        var select_find = id_selected.find((element) => element === selectedId);
        var index = id_selected.indexOf(select_find);
        // Do something with the selected ID
        if(select_find == undefined){
            id_selected.push(selectedId);
        } else {
            id_selected.splice(index, 1);
        }
        $('#cetak_pilihan').val(id_selected);
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
            var url = "{{ route('hapus_user', ":id") }}";
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