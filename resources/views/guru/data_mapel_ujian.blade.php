@extends('guru.layout')

@section('content')
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Mapel</h6>
                  </div>
                  <div class="card-body">  
        <table align="left" cellpadding="3" cellspacing="0" border="0" style=" margin: 0 auto 2em auto;">
          <tbody>
              <tr id="filter_col4" data-column="4">
                  <td>SEMESTER</td>
                  <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
              </tr>
              <tr id="filter_col7" data-column="7">
                  <td>KELAS</td>
                  <td align="center"><input type="text" class="column_filter" id="col7_filter"></td>
              </tr>
          </tbody>
      </table>
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">Semester</th>
                          <th class="text-center">Tahun Ajaran</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Ujian</th>
                          <th class="text-center">Soal</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">Semester</th>
                          <th class="text-center">Tahun Ajaran</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Ujian</th>
                          <th class="text-center">Soal</th>
                        </tr>
                      </tfoot>
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
        ajax: "{{route('guru.json_mapel_ujian',[$tahun,$semester])}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_mapel', name: 'nama_mapel' },
            { data: 'semester', name: 'semester' },
            { data: 'tahun', name: 'tahun' },
            { data: 'kelas', name: 'kelas' },
            { data: 'ujian_count', name: 'ujian_count' },
            { data: 'ujian', name: 'ujian', orderable: false, searchable: false},
        ],
    });
});
</script>
<script>
function filterGlobal () {
    $('#users-table').DataTable().search(
        $('#global_filter').val(),
        $('#global_regex').prop('checked'),
        $('#global_smart').prop('checked')
    ).draw();
}
 
function filterColumn ( i ) {
    $('#users-table').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
}
 
$(document).ready(function() {
    $('#users-table').DataTable();
 
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    } );
} );
</script>
@endpush