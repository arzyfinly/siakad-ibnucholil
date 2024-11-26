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
        <p>Silahkan tambahkan .</p>
        <form action="{{route('perpustakaan.input_peminjam')}}" method="post" enctype="multipart/form-data">
        @csrf
          
          <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <select class="form-control" name="buku_id" id="buku" required></select>
                </div>
          <div class="form-group">
            <label>Peminjam *</label>
            <select class="form-control" name="user_id" id="user" required></select>
          </div>
          <div class="form-group">
            <label>Tanggal peminjam*</label>
            <input type="date" name="tanggal_pinjam" placeholder="Tanggal Pinjam Buku" class="form-control" required>
          </div>
          
          <div class="form-group">       
            <input type="submit" value="Tambah" class="btn btn-primary">
          </div>
        </form>       
      </div>
    </div>
  </div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data peminjam</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">NISN</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">Buku</th>
                          <th class="text-center">Tanggal Pinjam</th>
                          <th class="text-center">Tanggal Kembali</th>
                          <th class="text-center">Denda</th>
                          <th class="text-center">Status</th>
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
        ajax: "{{route('perpustakaan.json_peminjam')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'siswa', name: 'siswa' },
            { data: 'nisn', name: 'nisn' },
            { data: 'pic', name: 'pic' },            
            { data: 'buku', name: 'buku' },
            { data: 'tgl_pinjam', name: 'tgl_pinjam' },
            { data: 'tgl_kembali', name: 'tgl_kembali' },
            { data: 'denda', name: 'denda' },
            { data: 'kembali', name: 'kembali' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
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
<script type="text/javascript">
  $('#buku').select2({
    placeholder: 'buku',
    ajax: {
      url: '{{route("api.buku")}}',
      dataType: 'json',
      delay: 250,
      data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.judul,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });

</script>
<script type="text/javascript">
  $('#user').select2({
    placeholder: 'Nama Peminjam',
    ajax: {
      url: '{{route("api.alluser")}}',
      dataType: 'json',
      delay: 250,
      data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.name+' - '+item.username,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
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
              var url = "{{ route('perpustakaan.delete_peminjam', ":id") }}";
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
