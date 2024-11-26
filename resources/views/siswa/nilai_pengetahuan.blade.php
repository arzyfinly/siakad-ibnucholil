@extends('siswa.layout')

@section('content')
 <div class="container-fluid px-xl-5">
</br>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Nilai</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                        <th class="text-center">#</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">Tugas1</th>
                          <th class="text-center">Tugas2</th>
                          <th class="text-center">Tugas3</th>
                          <th class="text-center">Tugas4</th>
                          <th class="text-center">Tugas5</th>
                          <th class="text-center">Tugas6</th>
                          <th class="text-center">UH1</th>
                          <th class="text-center">UH2</th>
                          <th class="text-center">UH3</th>
                          <th class="text-center">UH4</th>
                          <th class="text-center">UH5</th>
                          <th class="text-center">UH6</th>
                          <th class="text-center">UTS</th>
                          <th class="text-center">UAS</th>
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
        ajax: "{{route('siswa_json_nilai_pengetahuan')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'kelas', name: 'kelas' },
            { data: 'mapel', name: 'mapel' },
            { data: 'tugas1', name: 'tugas1' },
            { data: 'tugas2', name: 'tugas2' },
            { data: 'tugas3', name: 'tugas3' },
            { data: 'tugas4', name: 'tugas4' },
            { data: 'tugas5', name: 'tugas5' },
            { data: 'tugas6', name: 'tugas6' },
            { data: 'uh1', name: 'uh1' },
            { data: 'uh2', name: 'uh2' },
            { data: 'uh3', name: 'uh3' },
            { data: 'uh4', name: 'uh4' },
            { data: 'uh5', name: 'uh5' },
            { data: 'uh6', name: 'uh6' },
            { data: 'uts', name: 'uts' },
            { data: 'uas', name: 'uas' },
        ],
    });
});
</script>
@endpush