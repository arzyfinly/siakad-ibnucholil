@extends('siswa.layout')

@section('content')
</br>
</br>
 <!-- Basic Form-->
 <div class="row">
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Sekolah Asal Siswa</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_sekolah_asal',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
            @csrf
            <Label style="font-size: 18px"><strong>SEKOLAH DASAR</strong></Label>
            <div class="form-group"><label><strong>Nomor Seri Ijazah SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="ijazah_sd" required="" placeholder="Nomor seri ijazah SD.." value="{{$data->ijazah_sd}}"></div>
            <div class="form-group"><label><strong>Nomor Seri SKHUN SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="skhun_sd" required="" placeholder="Nomor seri SKHUN SD.." value="{{$data->skhun_sd}}"></div>
            <div class="form-group"><label><strong>Nama Orang Tua Ijazah SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="orang_tua_sd" required="" placeholder="Nama orang tua sesuai ijazah SD.." value="{{$data->orang_tua_sd}}"></div>
            <Label style="font-size: 18px"><strong>SEKOLAH MENENGAH PERTAMA</strong></Label>
            <div class="form-group"><label><strong>NISN * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="nisn" placeholder="NISN anda..." value="{{$data->nisn}}"></div>
            <div class="form-group"><label><strong>Nama Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="sekolah_asal" placeholder="Asal sekolah SMP/MTs/PAKET..." value="{{$data->sekolah_asal}}"></div>
            <div class="form-group"><label><strong>NPSN * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="npsn" placeholder="NPSN Sekolah asal..." value="{{$data->npsn}}"></div>
            <div class="form-group"><label><strong>Alamat Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="alamat_sekolah" required="" placeholder="Alamat sekolah asal.." value="{{$data->alamat_sekolah}}"></div>
            <div class="form-group"><label><strong>Desa&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="desa_sekolah" placeholder="Desa sekolah asal..." value="{{$data->desa_sekolah}}"></div>
            <div class="form-group"><label><strong>Kecamatan&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="kecamatan_sekolah" placeholder="Kecamatan sekolah asal..." value="{{$data->kecamatan_sekolah}}"></div>
            <div class="form-group"><label><strong>Kabupaten&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="kabupaten_sekolah" required="" placeholder="Kabupaten sekolah asal..." value="{{$data->kabupaten_sekolah}}"></div>
            <div class="form-group"><label><strong>Provinsi&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="provinsi_sekolah" required="" placeholder="Provinsi sekolah asal..." value="{{$data->provinsi_sekolah}}"></div>
            <div class="form-group"><label><strong>Kode Pos&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="number" name="kode_pos_sekolah" required="" placeholder="Kode pos sekolah asal..." value="{{$data->kode_pos_sekolah}}"></div>
            <div class="form-group"><label><strong>Berapa Tahun Bersekolah * :&nbsp;</strong></label><input class="form-control" type="number" required="" name="lama_sekolah" placeholder="Lamanya bersekolah..." value="{{$data->lama_sekolah}}"></div>
            <div class="form-group"><label><strong>Nomor Peserta Ujian Nasional * :&nbsp;</strong></label><input class="form-control" type="text" name="npun" required="" placeholder="Nomor peserta UN anda.." value="{{$data->npun}}"></div>
            <div class="form-group"><label><strong>Nomor Seri Ijazah SMP/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="ijazah_smp" required="" placeholder="Nomor seri ijazah SMP.." value="{{$data->ijazah_smp}}"></div>
            <div class="form-group"><label><strong>Nomor Seri SKHUN SMP/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="skhun_smp" required="" placeholder="Nomor seri SKHUN SMP.." value="{{$data->skhun_smp}}"></div>
            <div class="form-group"><label><strong>Nama Orang Tua Ijazah SMP/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="orang_tua_smp" required="" placeholder="Nama orang tua sesuai ijazah SMP.." value="{{$data->orang_tua_smp}}"></div>
          
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection