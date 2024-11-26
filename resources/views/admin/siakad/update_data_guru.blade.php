@extends('admin.layout')

@section('content')
</br>
</br>

 <div class="row">

 <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Tentang Guru</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_tentang_guru',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
               <div class="form-group"><label><strong>Nama Lengkap * :&nbsp;</strong>
                </label><input class="form-control" type="text" name="nama_lengkap" required="" placeholder="Nama lengkap anda..." value="{{$data->nama_lengkap}}"></div>
                <?php $value=$data->jk; ?>
                <div class="form-group"><label><strong>Jenis Kelamin * :&nbsp;</strong></label>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="L" name="jk" {{ $value == "L" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-1">Laki Laki</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="P" name="jk" {{ $value == "P" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-1">Perempuan</label></div>
                </div>
                <div class="form-group"><label><strong>Nomor Kartu Keluarga * :&nbsp;</strong></label><input class="form-control" type="number" name="kk" required="" placeholder="Masukan nomor kk..." value="{{$data->kk}}"></div>
                <div class="form-group"><label><strong>NIK * :&nbsp;</strong></label><input class="form-control" type="number" name="nik" required="" placeholder="Masukan NIK..." value="{{$data->nik}}"></div>
                <div class="form-group"><label><strong>Tempat Lahir * :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir" required="" placeholder="Tempat lahir anda..." value="{{$data->tempat_lahir}}"></div>
                <div class="form-group"><label><strong>Tanggal Lahir * :&nbsp;</strong></label><input class="form-control" type="date" required="" name="tanggal_lahir" value="{{$data->tanggal_lahir}}"></div>
                <div class="form-group"><label><strong>Agama * :&nbsp;</strong></label><input class="form-control" type="text" name="agama" required="" value="{{$data->agama}}"></div>
                <div class="form-group"><label><strong>Alamat / Jalan *:&nbsp;</strong></label><input class="form-control" type="text" name="alamat" required=""  value="{{$data->alamat}}"></div>
                <div class="form-group"><label><strong>Desa / Kelurahan *:&nbsp;</strong></label><input class="form-control" type="text" name="desa" required=""  value="{{$data->desa}}"></div>
                <div class="form-group"><label><strong>Kecamatan *:&nbsp;</strong></label><input class="form-control" type="text" name="kecamatan" required=""  value="{{$data->kecamatan}}"></div>
                <div class="form-group"><label><strong>Kabupaten *:&nbsp;</strong></label><input class="form-control" type="text" name="kabupaten" required=""  value="{{$data->kabupaten}}"></div>
                <div class="form-group"><label><strong>Provinsi *:&nbsp;</strong></label><input class="form-control" type="text" name="provinsi" required=""  value="{{$data->provinsi}}"></div>
                <div class="form-group"><label><strong>Kode Pos *:&nbsp;</strong></label><input class="form-control" type="text" name="kode_pos" required=""  value="{{$data->kode_pos}}"></div>
                <div class="form-group"><label><strong>Telephone *:&nbsp;</strong></label><input class="form-control" type="text" name="no_hp" required=""  value="{{$data->no_hp}}"></div>
                <div class="form-group"><label><strong>E-Mail *:&nbsp;</strong></label><input class="form-control" type="text" name="email" required=""  value="{{$data->email}}"></div>
                
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- batas bawah -->
  <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Pendidikan Guru</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_pendidikan_guru',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
                <div class="form-group"><label><strong>Nama Sekolah SD * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_sd" required="" " value="{{$data->nama_sd}}"></div>
                <div class="form-group"><label><strong>Tahun Masuk SD * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_sd" required="" " value="{{$data->tahun_masuk_sd}}"></div>
                <div class="form-group"><label><strong>Tahun Lulus SD * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_sd" required="" " value="{{$data->tahun_lulus_sd}}"></div>
                <div class="form-group"><label><strong>Nama Sekolah smp * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_smp" required="" " value="{{$data->nama_smp}}"></div>
                <div class="form-group"><label><strong>Tahun Masuk smp * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_smp" required="" " value="{{$data->tahun_masuk_smp}}"></div>
                <div class="form-group"><label><strong>Tahun Lulus smp * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_smp" required="" " value="{{$data->tahun_lulus_smp}}"></div>
                <div class="form-group"><label><strong>Nama Sekolah sma * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_sma" required="" " value="{{$data->nama_sma}}"></div>
                <div class="form-group"><label><strong>Tahun Masuk sma * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_sma" required="" " value="{{$data->tahun_masuk_sma}}"></div>
                <div class="form-group"><label><strong>Tahun Lulus sma * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_sma" required="" " value="{{$data->tahun_lulus_sma}}"></div>
                <div class="form-group"><label><strong>Nama Sekolah s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_s1" required="" " value="{{$data->nama_s1}}"></div>
                <div class="form-group"><label><strong>Tahun Masuk s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_s1" required="" " value="{{$data->tahun_masuk_s1}}"></div>
                <div class="form-group"><label><strong>Tahun Lulus s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_s1" required="" " value="{{$data->tahun_lulus_s1}}"></div>
                <div class="form-group"><label><strong>Nama Sekolah s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_s2" required="" " value="{{$data->nama_s2}}"></div>
                <div class="form-group"><label><strong>Tahun Masuk s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_s2" required="" " value="{{$data->tahun_masuk_s2}}"></div>
                <div class="form-group"><label><strong>Tahun Lulus s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_s2" required="" " value="{{$data->tahun_lulus_s2}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- batas bawah -->
  <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Pendidikan Guru</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_lain_guru',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
                <div class="form-group"><label><strong>Nama Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_ibu" required="" " value="{{$data->nama_ibu}}"></div>
                <div class="form-group"><label><strong>Status Perkawinan * :&nbsp;</strong></label><input class="form-control" type="text" name="sp" required="" " value="{{$data->sp}}"></div>
                <div class="form-group"><label><strong>Nama Suami / Istri * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_pasangan" required="" " value="{{$data->nama_pasangan}}"></div>
                <div class="form-group"><label><strong>Jumlah Anak * :&nbsp;</strong></label><input class="form-control" type="text" name="jumlah_anak" required="" " value="{{$data->jumlah_anak}}"></div>
                <div class="form-group"><label><strong>Nama Bank * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_bank" required="" " value="{{$data->nama_bank}}"></div>
                <div class="form-group"><label><strong>Nomor Rekening * :&nbsp;</strong></label><input class="form-control" type="text" name="no_rek" required="" " value="{{$data->no_rek}}"></div>
                <div class="form-group"><label><strong>Atas Nama * :&nbsp;</strong></label><input class="form-control" type="text" name="an" required="" " value="{{$data->an}}"></div>
            <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- batas bawah -->
  <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Keterangan Pegawai</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_pegawai_guru',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
                <div class="form-group"><label><strong>NUPTK * :&nbsp;</strong></label><input class="form-control" type="text" name="nuptk" required="" " value="{{$data->nuptk}}"></div>
                <div class="form-group"><label><strong>NIP * :&nbsp;</strong></label><input class="form-control" type="text" name="nip" required="" " value="{{$data->nip}}"></div>
                <div class="form-group"><label><strong>Status Kepegawaian * :&nbsp;</strong></label><input class="form-control" type="text" name="sk" required="" " value="{{$data->sk}}"></div>
                <div class="form-group"><label><strong>Jenis PTK * :&nbsp;</strong></label><input class="form-control" type="text" name="jenis_ptk" required="" " value="{{$data->jenis_ptk}}"></div>
                <div class="form-group"><label><strong>Lembaga Pengankatan * :&nbsp;</strong></label><input class="form-control" type="text" name="lembaga_pengangkatan" required="" " value="{{$data->lembaga_pengangkatan}}"></div>
                <div class="form-group"><label><strong>Sumber Gaji * :&nbsp;</strong></label><input class="form-control" type="text" name="sumber_gaji" required="" " value="{{$data->sumber_gaji}}"></div>
                <div class="form-group"><label><strong>Tugas Tambahan * :&nbsp;</strong></label><input class="form-control" type="text" name="tugas_tambahan" required="" " value="{{$data->tugas_tambahan}}"></div>
            <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- batas bawah -->
   <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Ganti Password</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_password_guru',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
                <div class="form-group"><label><strong>Password * :&nbsp;</strong></label><input class="form-control" type="text" name="password" value="{{$data->user->status}}"></div>
            <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- batas bawah -->
  </div>
@endsection