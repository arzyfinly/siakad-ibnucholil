@extends('admin.layout')

@section('content')
 <div class="container-fluid px-xl-5">
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Yang Telah Diverifikasi</h6>
                  </div>
                  <div class="card-body">  
                  <div class="container table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">NISN</th>
                          <th class="text-center">Nama Lengkap</th>
                          <th class="text-center">Jumlah Transfer</th>
                          <th class="text-center">Bukti Transfer</th>
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
        ajax: "{{route('json_verified')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nisn', name: 'nisn' },
            { data: 'nama', name: 'nama' },
            { data: 'jumlah_tf', name: 'jumlah_tf' },
            { data: 'pic', name: 'pic' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
@endpush