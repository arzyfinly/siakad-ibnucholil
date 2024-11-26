@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah eskul</button>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah eskul </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('guru.input_eskul')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>KRS ID *</label>
                                <input type="text" name="krs_id" class="form-control" value="{{$krs_id}}" required>
                              </div>
                              <div class="form-group">
                                <label>Tahun *</label>
                                <input type="text" name="tahun" class="form-control" required placeholder="Tahun..">
                              </div>
                              <div class="form-group">
                                <label>Nilai *</label>
                                <input type="number" name="nilai" class="form-control" required placeholder="Nilai Eskul..">
                              </div>
                              <div class="form-group">
                                <label>Ektrakurikuler *</label>
                                <input type="text" name="kegiatan" class="form-control" required placeholder="eskul untuk siswa">
                              </div>
                              <div class="form-group">
                                <label>Keterangan *</label>
                                <input type="text" name="ket" class="form-control" required placeholder="Jika tidak ada isi dengan strip">
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Tambah" class="btn btn-primary">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of modal -->
      </div>
    </div>
  </div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Extrakurikuler</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Tahun</th>
                          <th class="text-center">Nilai</th>
                          <th class="text-center">Extrakurikuler</th>
                          <th class="text-center">Ket</th>
                          <th class="text-center">Aksi</th>
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
        ajax: "{{route('guru.json_eskul',$krs_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'tahun', name: 'tahun' },
            { data: 'nilai', name: 'nilai' },
            { data: 'kegiatan', name: 'kegiatan' },
            { data: 'ket', name: 'ket' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
@endpush