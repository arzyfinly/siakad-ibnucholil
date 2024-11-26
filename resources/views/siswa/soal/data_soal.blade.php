@extends('guru.layout')

@section('content')
<br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
      <div class="row">
          <div class="col col-md-12">
            <table>
              <tr>
                <td><strong>Ujian</strong></td>
                <td> : </td>
                <td>{{$data->jenis}}</td>
              </tr>
              <tr>
                <td><strong>Waktu Ujian</strong></td>
                <td> : </td>
                <td>{{$data->waktu}}</td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Tambah SoaL</button>
        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-success">Import Soal</button>
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
                            <form action="{{route('soal.input_soal')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Soal*</label>
                                <input type="hidden" name="mapel_id" value="{{$data->mapel_id}}" class="form-control" required>
                                <input type="hidden" name="ujian_id" value="{{$data->id}}" class="form-control" required>
                              <textarea name="soal_text" id="" cols="30" rows="10" class="form-control" required></textarea>
                              </div>
                              <div class="form-group">
                                <label>Jawaban A*</label>
                                <input type="text" name="text_a" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jawaban B*</label>
                                <input type="text" name="text_b" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jawaban C*</label>
                                <input type="text" name="text_c" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jawaban D*</label>
                                <input type="text" name="text_d" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Jawaban E*</label>
                                <input type="text" name="text_e" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Kunci Jawaban *</label>
                                <select class="form-control" name="kunci" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
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
        <!-- Modal-->
        <div id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Import Soal </h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('soal.import_soal')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Pilih File Soal Excel*</label>
                                <input type="hidden" name="mapel_id" value="{{$data->mapel_id}}" class="form-control" required>
                                <input type="hidden" name="ujian_id" value="{{$data->id}}" class="form-control" required>
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
      </div>
    </div>
</div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Kelas</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">SOAL</th>
                          <th class="text-center">A</th>
                          <th class="text-center">B</th>
                          <th class="text-center">C</th>
                          <th class="text-center">D</th>
                          <th class="text-center">E</th>
                          <th class="text-center">KUNCI</th>
                          <th class="text-center">TOOLS</th>
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
        ajax: "{{route('soal.json_soal',$id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'soal_text', name: 'soal_text' },
            { data: 'text_a', name: 'text_a' },
            { data: 'text_b', name: 'text_b' },
            { data: 'text_c', name: 'text_c' },
            { data: 'text_d', name: 'text_d' },
            { data: 'text_e', name: 'text_e' },
            { data: 'kunci', name: 'kunci' },
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