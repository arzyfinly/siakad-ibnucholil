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
                          <th class="text-center">praktik1</th>
                          <th class="text-center">praktik2</th>
                          <th class="text-center">praktik3</th>
                          <th class="text-center">praktik4</th>
                          <th class="text-center">praktik5</th>
                          <th class="text-center">praktik6</th>
                          <th class="text-center">Portofolio1</th>
                          <th class="text-center">Portofolio2</th>
                          <th class="text-center">Portofolio3</th>
                          <th class="text-center">Portofolio4</th>
                          <th class="text-center">Portofolio5</th>
                          <th class="text-center">Portofolio6</th>
                          <th class="text-center">proyek1</th>
                          <th class="text-center">proyek2</th>
                          <th class="text-center">proyek3</th>
                          <th class="text-center">proyek4</th>
                          <th class="text-center">proyek5</th>
                          <th class="text-center">proyek6</th>
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
        ajax: "{{route('siswa_json_nilai_keterampilan')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'kelas', name: 'kelas' },
            { data: 'mapel', name: 'mapel' },
            { data: 'praktik1', name: 'praktik1' },
            { data: 'praktik2', name: 'praktik2' },
            { data: 'praktik3', name: 'praktik3' },
            { data: 'praktik4', name: 'praktik4' },
            { data: 'praktik5', name: 'praktik5' },
            { data: 'praktik6', name: 'praktik6' },
            { data: 'portofolio1', name: 'portofolio1' },
            { data: 'portofolio2', name: 'portofolio2' },
            { data: 'portofolio3', name: 'portofolio3' },
            { data: 'portofolio4', name: 'portofolio4' },
            { data: 'portofolio5', name: 'portofolio5' },
            { data: 'portofolio6', name: 'portofolio6' },
            { data: 'proyek1', name: 'proyek1' },
            { data: 'proyek2', name: 'proyek2' },
            { data: 'proyek3', name: 'proyek3' },
            { data: 'proyek4', name: 'proyek4' },
            { data: 'proyek5', name: 'proyek5' },
            { data: 'proyek6', name: 'proyek6' },
        ],
    });
});
</script>

@endpush