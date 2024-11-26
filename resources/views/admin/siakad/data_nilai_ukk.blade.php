@extends('admin.layout')

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
        <div class="col col-md-12">
        {{-- <a href="{{route('export_nilai_ukk',$mapel_id,$krs_id)}}" target="_blank" class="btn btn-primary">Cetak Nilai</a> --}}
        <a href="{{ route('export_nilai_ukk',['kelas_id' => $kelas_id, 'mapel_id' => $mapel_id]) }}" target="_blank" class="btn btn-primary">Cetak Nilai</a>
        </div>
        <br>
      </div>
    </div>
  </div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Kelola nilai UKK untuk mapel {{$data->nama_mapel}}</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Nilai</th>
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
        ajax: "{{route('json_nilai_ukk',$mapel_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nis', name: 'nis' },
            { data: 'nama', name: 'nama' },
            { data: 'angka', name: 'angka' },
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