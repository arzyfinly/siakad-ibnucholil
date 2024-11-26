@extends('siswa.layout')

@section('content')
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Ujian</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">Waktu</th>
                          <th class="text-center">Ujian</th>
                          <th class="text-center">Staus</th>
                          <th class="text-center">Soal</th>
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
        ajax: "{{route('ujian.json_ujian_siswa',$id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'mapel', name: 'mapel' },
            { data: 'waktu', name: 'waktu' },
            { data: 'jenis', name: 'jenis' },
            { data: 'status', name: 'status' },
            { data: 'soal', name: 'soal' },
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