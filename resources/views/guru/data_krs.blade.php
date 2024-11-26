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
                <td>{{$data->kelas}}</td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td> : </td>
                <td>{{$data->ket}}</td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <a href="{{route('guru.pilih_siswa',$kelas_id)}}" target="_blank" class="btn btn-primary">Pilih siswa</a>
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cetak Per Halaman
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{route('cetak_sampul_all',$kelas_id)}}" target="_blank">Cetak Sampul</a>
                <a class="dropdown-item" href="{{route('cetak_data_sekolah_all',$kelas_id)}}" target="_blank">Cetak Data Sekolah</a>
                <a class="dropdown-item" href="{{route('cetak_petunjuk_all',$kelas_id)}}" target="_blank">Cetak Petunjuk</a>
                <a class="dropdown-item" href="{{route('cetak_data_diri_all',$kelas_id)}}" target="_blank">Cetak Data SIswa</a>
                <a class="dropdown-item" href="{{route('cetak_raport_all',[$kelas_id,$semester])}}" target="_blank">Cetak Pencapaian</a>
                <a class="dropdown-item" href="{{route('cetak_deskripsi_all',$kelas_id)}}" target="_blank">Cetak Deskripsi</a>
          </div>
      </div>
    </div>
</div>
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data KRS</h6>
                  </div>
                  <div class="card-body">  
                  <div class="table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Kelas</th>
                          <th class="text-center">Semester</th>
                          <th class="text-center">Tahun</th>
                          <th class="text-center">Deskripsi</th>
                          <th class="text-center">Cetak</th>
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
        ajax: "{{route('guru.json_krs',[$kelas_id, $semester])}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nis', name: 'nis' },
            { data: 'nama', name: 'nama' },
            { data: 'kelas', name: 'kelas' },
            { data: 'semester', name: 'semester' },
            { data: 'tahun', name: 'tahun' },
            {data: 'deskripsi', name: 'deskripsi', orderable: false, searchable: false},
            {data: 'cetak', name: 'cetak', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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