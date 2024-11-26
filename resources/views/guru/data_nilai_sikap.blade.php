@extends('guru.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
      <div class="row">
          <div class="col col-md-12">
            <table>
              <tr>
                <td><strong>Kelas</strong></td>
                <td> : </td>
                <td>{{$data->kelas->kelas}}</td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td> : </td>
                <td>{{$data->kelas->ket}}</td>
              </tr>
              <tr>
                <td><strong>Mapel</strong></td>
                <td> : </td>
                <td>{{$data->nama_mapel}}</td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Import Nilai</button>
        <a href="{{route('guru.export_sikap',$mapel_id)}}" target="_blank" class="btn btn-primary">Export Template</a>
        <a href="{{route('guru.cetak_nilai_sikap',$mapel_id)}}" target="_blank" class="btn btn-primary">Cetak Nilai</a>
      </div>
    </div>
  </div>
  <!-- Modal-->
  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Import Sikap</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Silahkan tambhakan .</p>
                            <form action="{{route('guru.import_sikap')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Silahkan import</label>
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
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pilih Siswa Untuk mapel {{$data->nama_mapel}}</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Input Nilai</th>
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
      "lengthMenu": [[30, 45, 50, -1], [30, 45, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "{{route('guru.json_nilai_sikap',$mapel_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nis', name: 'nis' },
            { data: 'nama', name: 'nama' },
            { data: 'nilai', name: 'nilai' },
        ],
    });
});
</script>
<script>
//digunakan untuk option paket ajax
$(document).ready(function() {
  jQuery.ajax ({
  url: "#",
  dataType: "json",
  success: function(response) {
    console.log(response.data);
    var content = response.data;
  for (k in content) {
  $("#paket").append('<option value="'+content[k].id+'">'+content[k].nama_paket+'</option>');
       }
     }
   });
});
</script>
@endpush