@extends('perpustakaan.layout')

@section('content')
</br>
</br>

 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pilih Buku</h6>
                  </div>
                  <div class="card-body">  
                 
                  <form action="{{route('perpustakaan.cetak_idbuku')}}" method="post">
                  @csrf
                  
                  
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">Kirim</button>
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
      "lengthMenu": [[30, 45, 50, -1], [30, 45, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "{{route('perpustakaan.json_pilih_cetak_idbuku')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'pilih', name: 'pilih' },
            { data: 'no_klasifikasi', name: 'no_klasifikasi' },
            { data: 'judul', name: 'judul' },
            { data: 'tahun_terbit', name: 'tahun_terbit' },
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