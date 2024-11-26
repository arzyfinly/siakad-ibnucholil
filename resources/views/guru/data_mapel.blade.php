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
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">KKM</th>
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Semester</th>
                          <th class="text-center">Tahun Ajaran</th>
                          <th class="text-center">Jurusan</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Guru</th>
                          <th class="text-center">KD</th>
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
        ajax: "{{route('guru.json_mapel',[$tahun,$semester])}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_mapel', name: 'nama_mapel' },
            { data: 'ket', name: 'ket' },
            { data: 'kategori', name: 'kategori' },
            { data: 'semester', name: 'semester' },
            { data: 'tahun', name: 'tahun' },
            { data: 'jurusan', name: 'jurusan' },
            { data: 'kelas', name: 'kelas' },
            { data: 'guru', name: 'guru' },
            { data: 'kd', name: 'kd', orderable: false, searchable: false},
            { data: 'nilai', name: 'nilai', orderable: false, searchable: false},
        ],
    });
});
</script>
@endpush