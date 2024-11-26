@extends('sarpras.layout')

@section('content')
 <div class="container-fluid px-xl-5">
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Barang</button>
        <button type="button" data-toggle="modal" data-target="#pilih_ruangan" class="btn btn-primary">Cetak Laporan</button>
        {{-- <a href="{{route('sarpras.cetak_all_unit')}}" target="_blank" class="btn btn-primary">Cetak Laporan</a> --}}
        {{-- <a href="{{route('sarpras.cetak_per_inputan')}}" target="_blank" class="btn btn-primary">Cetak Laporan</a> --}}

        <div id="pilih_ruangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Sarana dan Prasarana</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                  
            <select id="ruangan" class="form-control mb-3">
                <option disabled selected value="">-- Pilih Salah Satu --</option>
                @foreach ($ruangan as $item)
                <option value="{{ $item->id}}">{{ $item->nama_ruang }}</option>
                @endforeach
            </select>
            <a id="cetak_bos"  target="_blank" class="btn btn-primary">Cetak Laporan</a>
                    </div>
                </div>
            </div>
        </div>


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
                            <form action="{{route('sarpras.input_barang')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Inventari Barang *</label>
                                <select class="form-control" name="inventaris_barang" id="jurusan" required> 
                                <option value="UMUM">UMUM</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Nomor Barang *</label>
                                <input type="text" name="nomor_barang" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Letak Barang *</label>
                                <select class="form-control" name="letak" id="letak" required> 
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Nama Barang *</label>
                                <input type="text" name="nama_barang" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Merek *</label>
                                <input type="text" name="merek" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Perolehan</label>
                                <input type="date" name="tahun" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Anggaran Dari *</label>
                                <input type="text" name="anggaran" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>nominal *</label>
                                <input type="number" name="nominal" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jumlah *</label>
                                <input type="number" name="jumlah" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Spesifikasi *</label>
                                <input type="text" name="spesifikasi" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Fungsi *</label>
                                <input type="text" name="fungsi" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Foto *</label>
                                <input type="file" name="pic" class="form-control" required>
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
                    <h6 class="text-uppercase mb-0">Data Sarpras</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Inventaris Barang</th>
                          <th class="text-center">Nomor Barang</th>
                          <th class="text-center">Letak Barang</th>
                          <th class="text-center">Nama Barang</th>
                          <th class="text-center">Merek Barang</th>
                          <th class="text-center">Tanggal Perolehan</th>
                          <th class="text-center">Anggaran Dari</th>
                          <th class="text-center">Nominal</th>
                          <th class="text-center">Jumlah</th>
                          <th class="text-center">Spesifikasi</th>
                          <th class="text-center">Fungsi</th>
                          <th class="text-center">Perawatan</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">QR</th>
                          <th class="text-center">Cetak QR</th>
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
        ajax: "{{route('sarpras.json_barang')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'inventaris_barang', name: 'inventaris_barang' },
            { data: 'nomor_barang', name: 'nomor_barang' },
            { data: 'letak', name: 'letak' },
            { data: 'nama_barang', name: 'nama_barang' },
            { data: 'merek', name: 'merek' },
            { data: 'tahun', name: 'tahun' },
            { data: 'anggaran', name: 'anggaran' },
            { data: 'nominal', name: 'nominal' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'spesifikasi', name: 'spesifikasi' },
            { data: 'fungsi', name: 'fungsi' },
            { data: 'perawatan', name: 'perawatan', orderable: false, searchable: false},
            { data: 'gambar', name: 'gambar', orderable: false, searchable: false},
            { data: 'qrcode', name: 'qrcode', orderable: false, searchable: false },
            { data: 'cetak', name: 'cetak', orderable: false, searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
<script>
//digunakan untuk option paket ajax
$(document).ready(function() {
  jQuery.ajax ({
  url: "{{route('sarpras.json_jurusan')}}",
  dataType: "json",
  success: function(response) {
    console.log(response.data);
    var content = response.data;
  for (k in content) {
  $("#jurusan").append('<option value="'+content[k].jurusan+'">'+content[k].jurusan+'</option>');
       }
     }
   });
});
</script>
<script>
//digunakan untuk option paket ajax
$(document).ready(function() {
  jQuery.ajax ({
  url: "{{route('sarpras.json_ruang')}}",
  dataType: "json",
  success: function(response) {
    console.log(response.data);
    var content = response.data;
  for (k in content) {
  $("#letak").append('<option value="'+content[k].id+'">'+content[k].nama_ruang+'</option>');
       }
     }
   });
});
</script>
<script>
//digunakan untuk option paket ajax
$("#ruangan").change(function() {
    var ruangan = $("#ruangan").val();
    var url = '{{ route("sarpras.cetak_per_inputan", ":ruangan") }}';
    url = url.replace(':ruangan', ruangan);
  $("#cetak_bos").attr("href",url);
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
              var url = "{{ route('hapus_barang', ":id") }}";
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