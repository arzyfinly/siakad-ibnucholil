@extends('guru.layout')

@section('content')
<div class="col-lg-12">
<br>
    <div class="card">
      <div class="card-body">
      <div class="row">
          <div class="col col-md-12">
            <table>
              <tr>
                <td><strong>Mata Pelajaran</strong></td>
                <td> : </td>
                <td>{{$data->nama_mapel}}</td>
              </tr>
              <tr>
                <td><strong>Kelas</strong></td>
                <td> : </td>
                <td>{{$kelas->kelas}}</td>
              </tr>
              <tr>
                <td><strong>Tahun Ajaran</strong></td>
                <td> : </td>
                <td>{{$data->tahun}}</td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah Ujian</button>
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah Ujian </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('ujian.input_ujian')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Jenis Ujian *</label>
                                <input type="hidden" name="mapel_id" value="{{$id}}" class="form-control" required>
                                <select class="form-control" name="jenis" required>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                                <option value="USP">USP</option>
                                <option value="UKK">UKK</option>
                                <option value="UH1">UH1</option>
                                <option value="UH2">UH2</option>
                                <option value="UH3">UH3</option>
                                <option value="UH4">UH4</option>
                                <option value="UH5">UH5</option>
                                <option value="UH6">UH6</option>
                              </select>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Ujian *</label>
                                <input type="date" name="waktu" class="form-control" placeholder=".menit" required>
                              </div>
                              <div class="form-group">
                                <label>Durasi dalam menit*</label>
                                <input type="number" name="durasi" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Status *</label>
                                <select class="form-control" name="status" required>
                                <option value="AKTIF">Aktif</option>
                                <option value="NONAKTIF">Nonaktif</option>
                              </select>
                              </div>
                              <div class="form-group">       
                                <input type="submit" value="Tambahkan" class="btn btn-primary">
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
                    <h6 class="text-uppercase mb-0">Data Ujian</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Kode Ujian</th>
                          <th class="text-center">Mapel</th>
                          <th class="text-center">Waktu</th>
                          <th class="text-center">Durasi</th>
                          <th class="text-center">Ujian</th>
                          <th class="text-center">Staus</th>
                          <th class="text-center">Soal</th>
                          <th class="text-center">Nilai</th>
                          <th class="text-center">Upload Nilai</th>
                          <th class="text-center">Tools</th>
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
        ajax: "{{route('ujian.json_ujian',$id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'kode', name: 'kode' },
            { data: 'mapel', name: 'mapel' },
            { data: 'waktu', name: 'waktu' },
            { data: 'durasi', name: 'durasi' },
            { data: 'jenis', name: 'jenis' },
            { data: 'status', name: 'status' },
            { data: 'soal', name: 'soal' },
            { data: 'nilai', name: 'nilai' },
            { data: 'upload_nilai', name: 'upload_nilai' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
});
</script>
<script>
$(document).ready(function(){
  jQuery.ajax ({
    url: "{{route('json_guru')}}",
    dataType: "json",
    success: function(response) {
      console.log(response.data);
      var content = response.data;
      for (let i = 0; i < content.length; i++) {
          $("#guru").append('<option value="'+content[i].id+'">'+content[i].nama_lengkap+'</option>');
      }
    
      }
    });
});
</script>
@endpush