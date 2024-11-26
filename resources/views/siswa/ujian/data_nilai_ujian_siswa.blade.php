@extends('siswa.layout')

@section('content')
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Nilai Ujian</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mata Pelajaran</th>
                          <th class="text-center">Ujian</th>
                          <th class="text-center">Nilai</th>
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
        ajax: "{{route('ujian.json_nilai_ujian_siswa')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'mapel', name: 'mapel' },
            { data: 'ujian', name: 'ujian' },
            { data: 'nilai', name: 'nilai' },
        ],
    });
});
</script>
@endpush