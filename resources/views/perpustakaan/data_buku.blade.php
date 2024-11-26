@extends('perpustakaan.layout')

@section('content')
@if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
</br>
</br>
<div class="container-fluid px-xl-5">
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Data Buku</button>
        <button type="button" data-toggle="modal" data-target="#buku" class="btn btn-success">Cetak  Buku</button>
        <a href="{{route('perpustakaan.pilih_cetak_idbuku')}}" class="btn btn-warning">Cetak Label</a>
        <a href="{{route('perpustakaan.cetak_all_idbuku')}}" class="btn btn-info">Cetak All Label</a>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Data Buku</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambahkan .</p>
                            <form action="{{route('perpustakaan.input_buku')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Tanggal Terima *</label>
                                <input type="date" name="tanggal_terima" class="form-control" required>
                              </div>
                             
                              <div class="form-group">
                                <label>No.Klasifikasi *</label>
                                <input type="text" name="no_klasifikasi" placeholder="No Klasifikasi Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Pengarang *</label>
                                <input type="text" name="pengarang" placeholder="Pengarang Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Judul *</label>
                                <input type="text" name="judul" placeholder="Judul Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Perolehan *</label>
                                <input type="text" name="perolehan" placeholder="Perolehan Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Penerbit *</label>
                                <input type="text" name="penerbit" placeholder="Penerbit Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Tahun Terbit *</label>
                                <input type="number" name="tahun_terbit" placeholder="Tahun Terbit Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Harga *</label>
                                <input type="number" name="harga" placeholder="Harga Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jumlah Halaman *</label>
                                <input type="number" name="jumlah_halaman" placeholder="Jumlah Halaman Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jumlah Buku *</label>
                                <input type="number" name="jumlah_buku" placeholder="Jumlah Stok Buku" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Deskripsi *</label>
                                <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Gambar *</label>
                                <input type="file" name="pic" class="form-control" required>
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Tambah" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- end of modal -->
                    <!-- Modal-->
                    <div id="buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Cetak Buku</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('perpustakaan.cetak_buku')}}" method="get">
                            @csrf
                              <div class="form-group">
                                <label>Tanggal Awal *</label>
                                <input type="date" name="start" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Akhir *</label>
                                <input type="date" name="end" class="form-control" required>
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Cetak" class="btn btn-primary">
                              </div>
                            </form>
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
                    <h6 class="text-uppercase mb-0">Data Buku</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center"><strong>#</strong></th>
                          <th class="text-center"><strong>Gambar</strong></th>
                          <th class="text-center"><strong>Judul</strong></th>
                          <th class="text-center"><strong>Tanggal Terima</strong></th>
                          <th class="text-center"><strong>No Induk</strong></th>
                          <th class="text-center"><strong>No Klasifikasi</strong></th>
                          <th class="text-center"><strong>Pengarang</strong></th>
                          <th class="text-center"><strong>Perolehan</strong></th>
                          <th class="text-center"><strong>Penerbit</strong></th>
                          <th class="text-center"><strong>Tahun Terbit</strong></th>
                          <th class="text-center"><strong>Harga</strong></th>
                          <th class="text-center"><strong>Jumlah Halaman</strong></th>
                          <th class="text-center"><strong>Jumlah Buku</strong></th>
                          <th class="text-center"><strong>Aksi</strong></th>
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
        ajax: "{{route('perpustakaan.json_buku')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'pic', name: 'pic'},
            { data: 'judul', name: 'judul' },
            { data: 'tanggal_terima', name: 'tanggal_terima' },
            { data: 'id', name: 'id' },
            { data: 'no_klasifikasi', name: 'no_klasifikasi' },
            { data: 'pengarang', name: 'pengarang' },
            { data: 'perolehan', name: 'perolehan' },
            { data: 'penerbit', name: 'penerbit' },
            { data: 'tahun_terbit', name: 'tahun_terbit' },
            { data: 'harga', name: 'harga' },
            { data: 'jumlah_halaman', name: 'jumlah_halaman' },
            { data: 'jumlah_buku', name: 'jumlah_buku' },
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
              var url = "{{ route('perpustakaan.delete_buku', ":id") }}";
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
