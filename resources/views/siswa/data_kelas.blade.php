@extends('siswa.layout')

@section('content')
 <div class="container-fluid px-xl-5">
</br>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Kelas</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Mapel</th>
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
        ajax: "{{route('siswa.json_kelas')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'kelas', name: 'kelas' },
            {data: 'mapel', name: 'mapel', orderable: false, searchable: false},
        ],
    });
});
</script>

@endpush