@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data wali</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_wali',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><label><strong>Nama Wali :&nbsp;</strong></label><input class="form-control" type="text" name="nama_wali" placeholder="Nama wali" value="{{$data->nama_wali}}"></div>
            <div class="form-group"><label><strong>NIK Wali :&nbsp;</strong></label><input class="form-control" type="number" name="nik_wali" placeholder="NIK Wali" value="{{$data->nik_wali}}"></div>
            <div class="form-group"><label><strong>Nomor Hp Wali :&nbsp;</strong></label><input class="form-control" type="number" name="nomor_wali" placeholder="Nomor handphone wali.." value="{{$data->nomor_wali}}"></div>
            <div class="form-group"><label><strong>Tempat Lahir Wali :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir_wali" placeholder="Tempat lahir wali" value="{{$data->tempat_lahir_wali}}"></div>
            <div class="form-group"><label><strong>Tanggal Lahir Wali :&nbsp;</strong></label><input class="form-control" type="date" name="tanggal_lahir_wali" value="{{$data->tanggal_lahir_wali}}"></div>
            <div class="form-group"><label><strong>Pekerjaan Wali :&nbsp;</strong></label><input class="form-control" type="text" name="pekerjaan_wali" placeholder="Pekerjaan wali..." value="{{$data->pekerjaan_wali}}"></div>
            <div class="form-group"><label><strong>Pendidikan Wali :&nbsp;</strong></label><input class="form-control" type="text" name="pendidikan_wali" placeholder="Pendidikan wali..." value="{{$data->pendidikan_wali}}"></div>
            <div class="form-group"><label><strong>Penghasilan Wali :&nbsp;</strong></label><input class="form-control" type="text" name="penghasilan_wali" placeholder="Penghasilan wali..." value="{{$data->penghasilan_wali}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection