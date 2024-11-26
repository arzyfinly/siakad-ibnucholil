@extends('guru.layout')

@section('content')
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Kelas</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Jurusan</th>
                          <th class="text-center">Wali Kelas</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Keterangan</th>
                          <th class="text-center">Siswa</th>
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
        ajax: "{{route('guru.json_kelas')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'jurusan', name: 'jurusan' },
            { data: 'wali', name: 'wali' },
            { data: 'kelas', name: 'kelas' },
            { data: 'ket', name: 'ket' },
            {data: 'siswa', name: 'siswa', orderable: false, searchable: false},
        ],
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
@endpush