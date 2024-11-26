@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Ibu</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_ibu',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Nama Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_ibu" required="" placeholder="Nama lengkap ibu..." value="{{$data->nama_ibu}}"></div>
            <div class="form-group"><label><strong>NIK Ibu * :&nbsp;</strong></label><input class="form-control" type="number" name="nik_ibu" required="" placeholder="NIK ibu..." value="{{$data->nik_ibu}}"></div>
            <div class="form-group"><label><strong>Nomor Hp Ibu * :&nbsp;</strong></label><input class="form-control" type="number" name="nomor_ibu" placeholder="Nomor handphone ibu..." value="{{$data->nomor_ibu}}"></div>
            <div class="form-group"><label><strong>Tempat Lahir Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir_ibu" required="" placeholder="Tempat lahir ibu..." value="{{$data->tempat_lahir_ibu}}"></div>
            <div class="form-group"><label><strong>Tanggal Lahir Ibu * :&nbsp;</strong></label><input class="form-control" type="date" required="" name="tanggal_lahir_ibu" value="{{$data->tanggal_lahir_ibu}}"></div>
            <div class="form-group"><label><strong>Pekerjaan Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="pekerjaan_ibu" required="" placeholder="Pekerjaan ibu..." value="{{$data->pekerjaan_ibu}}"></div>
            <div class="form-group"><label><strong>Pendidikan Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="pendidikan_ibu" required="" placeholder="Pendidikan ibu..." value="{{$data->pendidikan_ibu}}"></div>
            <div class="form-group"><label><strong>Penghasilan Ibu * :&nbsp;</strong></label><input class="form-control" type="number" name="penghasilan_ibu" required="" placeholder="Penghasilan ibu perbulan..." value="{{$data->penghasilan_ibu}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection