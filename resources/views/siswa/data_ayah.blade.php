@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
  <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Ayah</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_ayah',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Nama Ayah * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="nama_ayah" placeholder="Nama lengkap ayah..." value="{{$data->nama_ayah}}"></div>
            <div class="form-group"><label><strong>NIK Ayah * :&nbsp;</strong></label><input class="form-control" type="number" name="nik_ayah" required="" placeholder="NIK ayah..." value="{{$data->nik_ayah}}"></div>
            <div class="form-group"><label><strong>Nomor Hp Ayah * :&nbsp;</strong></label><input class="form-control" type="number" required="" name="nomor_ayah" placeholder="Nomor handphone ayah..." value="{{$data->nomor_ayah}}"></div>
            <div class="form-group"><label><strong>Tempat Lahir Ayah * :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir_ayah" required="" placeholder="Tempat lahir ayah..." value="{{$data->tempat_lahir_ayah}}"></div>
            <div class="form-group"><label><strong>Tanggal Lahir Ayah * :&nbsp;</strong></label><input class="form-control" type="date" name="tanggal_lahir_ayah" required="" value="{{$data->tanggal_lahir_ayah}}"></div>
            <div class="form-group"><label><strong>Pekerjaan Ayah * :&nbsp;</strong></label><input class="form-control" type="text" name="pekerjaan_ayah" required="" placeholder="Pekerjaan ayah..." value="{{$data->pekerjaan_ayah}}"></div>
            <div class="form-group"><label><strong>Pendidikan Ayah * :&nbsp;</strong></label><input class="form-control" type="text" name="pendidikan_ayah" required="" placeholder="Pendidikan ayah..." value="{{$data->pendidikan_ayah}}"></div>
            <div class="form-group"><label><strong>Penghasilan Ayah * :&nbsp;</strong></label><input class="form-control" type="number" name="penghasilan_ayah" required="" placeholder="Penghasilan ayah per bulan..." value="{{$data->penghasilan_ayah}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection