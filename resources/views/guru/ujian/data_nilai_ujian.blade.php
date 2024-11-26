@extends('guru.layout')

@section('content')
</br>
</br>
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
      <table>
              <tr>
                <td><strong>Mata Pelajaran</strong></td>
                <td> : </td>
                <td>{{$mapel->nama_mapel}}</td>
              </tr>
              <tr>
                <td><strong>Kelas</strong></td>
                <td> : </td>
                <td>{{$kelas->kelas}}</td>
              </tr>
              <tr>
                <td><strong>Tahun Ajaran</strong></td>
                <td> : </td>
                <td>{{$mapel->tahun}}</td>
              </tr>
            </table>
        <a href="{{route('ujian.cetak_nilai_ujian',$id)}}" class="btn btn-primary">Cetak Nilai</a>
      </div>
    </div>
  </div>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Data Nilai</h6>
                  </div>
                  <div class="card-body">  
                  <div class=" table-responsive">                        
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Nama Siswa</th>
                          <th class="text-center">Nilai</th>
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
        ajax: "{{route('ujian.json_nilai_ujian',$id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'siswa', name: 'siswa' },
            { data: 'nilai', name: 'nilai' },
        ],
    });
});
</script>
@endpush