@extends('guru.layout')

@section('content')
</br>
</br>
 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Pilih Siswa Untuk mapel {{$data->nama_mapel}}</h6>
                  </div>
                  <div class="card-body">  
                 
                  <form action="{{route('guru.input_nilai_pengetahuan')}}" method="post">
                  @csrf
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                  </div>
                  <div class="form-group">
                  <input type="text" name="kelas_id" value="{{$kelas_id}}" hidden>
                  <input type="text" name="mapel_id" value="{{$mapel_id}}" hidden>
                  </div>
                  <div class="form-group">
                  <div class="table-responsive">  
                    <table class="table table-striped table-sm card-text" id="users-table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center"><input type="checkbox" id="selectall"/> Pilih Semua</th>
                          <th class="text-center">NIS</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Tahun Diterima</th>
                        </tr>
                      </thead>
                    </table>
                    </div>
                    </div>
                  </form>                      
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
        ajax: "{{route('guru.json_siswa_pengetahuan',$mapel_id)}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'pilih', name: 'pilih' , orderable: false, searchable: false},
            { data: 'nis', name: 'nis' },
            { data: 'nama', name: 'nama' },
            { data: 'tahun', name: 'tahun' },
        ],
    });
});
</script>
<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            oTable = $('#datatable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $("#selectall").click(function () {
                var checkAll = $("#selectall").prop('checked');
                    if (checkAll) {
                        $(".case").prop("checked", true);
                    } else {
                        $(".case").prop("checked", false);
                    }
                });

            $(".case").click(function(){
                if($(".case").length == $(".case:checked").length) {
                    $("#selectall").prop("checked", true);
                } else {
                    $("#selectall").prop("checked", false);
                }

            });
        } );




    </script>
@endpush