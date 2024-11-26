@extends('guru.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah KD</button>
        <a href="{{route('guru.export_kd_mapel', $mapel_id)}}" target="_blank" class="btn btn-primary">Export Template</a>
        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-primary">Import KD</button>
        <!-- Modal-->
              <div id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Import KD Keterampilan</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Silahkan tambhakan .</p>
                              <form action="{{route('guru.import_kd_mapel')}}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                  <label>Silahkan import</label>
                                  <input type="text" name="mapel_id" value="{{$mapel_id}}" class="form-control" required hidden>
                                  <input type="text" name="kriteria" value="KETERAMPILAN" class="form-control" required hidden>
                                  <input type="file" name="file" class="form-control" required>
                                </div>
                                
                                <div class="form-group">       
                                  <input type="submit" value="Import" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end of modal -->
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Kompetensi Dasar </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('guru.input_kd_mapel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="mapel_id" value="{{$mapel_id}}" class="form-control" hidden required>
                              </div>
                              <div class="form-group">
                                <label>No KD *</label>
                                <input type="text" name="no_kd" class="form-control" required placeholder="Ex. 1.3.1xxxx">
                              </div>
                              <div class="form-group">
                                <label>KD *</label>
                                <input type="text" name="kd" class="form-control" required placeholder="Kompetensi dasar">
                              </div>
                              <div class="form-group">
                                <label>Kriteria *</label>
                                <select class="form-control" name="kriteria" id="kriteria" required>
                                  <option value="KETERAMPILAN">KETERAMPILAN</option>
                                  <option value="PENGETAHUAN">PENGETAHUAN</option>
                                </select>
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
                    <h6 class="text-uppercase mb-0">Data KD Keterampilan {{$mapel->nama_mapel}}</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">No. KD</th>
                          <th class="text-center">KD</th>
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
        ajax: "{{route('guru.json_kd_keterampilan',$mapel_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'mapel_id', name: 'mapel_id' },
            { data: 'no_kd', name: 'no_kd' },
            { data: 'kd', name: 'kd' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>

@endpush