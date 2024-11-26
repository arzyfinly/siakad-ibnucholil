@extends('admin.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah prakerin</button>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah prakerin </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('guru.input_prakerin')}}" method="post" enctype="multipart/form-data">
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
                                <input type="number" name="nilai" class="form-control" required placeholder="Nilai Prakerin">
                              </div>
                              <div class="form-group">
                                <label>Mitra *</label>
                                <input type="text" name="mitra" class="form-control" required placeholder="Mitra Prakerin">
                              </div>
                              <div class="form-group">
                                <label>Lokasi Prakerin *</label>
                                <input type="text" name="lokasi" class="form-control" required placeholder="Lokai Prakerin">
                              </div>
                              <div class="form-group">
                                <label>Lama Prakerin (Bulan) *</label>
                                <input type="text" name="lama" class="form-control" required placeholder="Lama Prakerin">
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
                    <h6 class="text-uppercase mb-0">Data Prakerin</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Tahun</th>
                          <th class="text-center">Nilai</th>
                          <th class="text-center">Mitra</th>
                          <th class="text-center">Lokasi</th>
                          <th class="text-center">Lama (Bulan)</th>
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
        ajax: "{{route('guru.json_prakerin',$krs_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'tahun', name: 'tahun' },
            { data: 'nilai', name: 'nilai' },
            { data: 'mitra', name: 'mitra' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'lama', name: 'lama' },
            { data: 'ket', name: 'ket' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
@endpush