@extends('admin.layout')

@section('content')
</br>
</br>

 <div class="row">

 <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Guru</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('tambah_guru')}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
               <div class="form-group"><label><strong>Nama Lengkap * :&nbsp;</strong>
                </label><input class="form-control" type="text" name="nama_lengkap" required="" placeholder="Nama lengkap anda..." ></div>
                
                <div class="form-group"><label><strong>Jenis Kelamin * :&nbsp;</strong></label>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="L" name="jk" ><label class="form-check-label" for="formCheck-1">Laki Laki</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="P" name="jk" ><label class="form-check-label" for="formCheck-1">Perempuan</label></div>
                </div>
                <div class="form-group"><label><strong>Nomor Kartu Keluarga * :&nbsp;</strong></label><input class="form-control" type="number" name="kk" required="" placeholder="Masukan nomor kk..." ></div>
                <div class="form-group"><label><strong>NIK * :&nbsp;</strong></label><input class="form-control" type="number" name="nik" required="" placeholder="Masukan NIK..." ></div>
                <div class="form-group"><label><strong>Tempat Lahir * :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir" required="" placeholder="Tempat lahir anda..." ></div>
                <div class="form-group"><label><strong>Tanggal Lahir * :&nbsp;</strong></label><input class="form-control" type="date" required="" name="tanggal_lahir" ></div>
                <div class="form-group"><label><strong>Agama * :&nbsp;</strong></label><input class="form-control" type="text" name="agama" required="" ></div>
                <div class="form-group"><label><strong>Alamat / Jalan *:&nbsp;</strong></label><input class="form-control" type="text" name="alamat" required=""  ></div>
                <div class="form-group"><label><strong>Desa / Kelurahan *:&nbsp;</strong></label><input class="form-control" type="text" name="desa" required=""  ></div>
                <div class="form-group"><label><strong>Kecamatan *:&nbsp;</strong></label><input class="form-control" type="text" name="kecamatan" required=""  ></div>
                <div class="form-group"><label><strong>Kabupaten *:&nbsp;</strong></label><input class="form-control" type="text" name="kabupaten" required=""  ></div>
                <div class="form-group"><label><strong>Provinsi *:&nbsp;</strong></label><input class="form-control" type="text" name="provinsi" required=""  ></div>
                <div class="form-group"><label><strong>Kode Pos *:&nbsp;</strong></label><input class="form-control" type="text" name="kode_pos" required="" ></div>
                <div class="form-group"><label><strong>Telephone *:&nbsp;</strong></label><input class="form-control" type="text" name="no_hp" required=""  ></div>
                <div class="form-group"><label><strong>E-Mail *:&nbsp;</strong></label><input class="form-control" type="text" name="email" required=""  ></div>
                
        
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
       
                <div class="form-group"><label><strong>Nama Sekolah SD * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_sd" required="" ></div>
                <div class="form-group"><label><strong>Tahun Masuk SD * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_sd" required="" ></div>
                <div class="form-group"><label><strong>Tahun Lulus SD * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_sd" required="" ></div>
                <div class="form-group"><label><strong>Nama Sekolah smp * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_smp" required=""></div>
                <div class="form-group"><label><strong>Tahun Masuk smp * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_smp" required=""></div>
                <div class="form-group"><label><strong>Tahun Lulus smp * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_smp" required=""></div>
                <div class="form-group"><label><strong>Nama Sekolah sma * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_sma" required=""></div>
                <div class="form-group"><label><strong>Tahun Masuk sma * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_sma" required=""></div>
                <div class="form-group"><label><strong>Tahun Lulus sma * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_sma" required=""></div>
                <div class="form-group"><label><strong>Nama Sekolah s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_s1" required=""></div>
                <div class="form-group"><label><strong>Tahun Masuk s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_s1" required=""></div>
                <div class="form-group"><label><strong>Tahun Lulus s1 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_s1" required=""></div>
                <div class="form-group"><label><strong>Nama Sekolah s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_s2" required=""></div>
                <div class="form-group"><label><strong>Tahun Masuk s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_masuk_s2" required="" ></div>
                <div class="form-group"><label><strong>Tahun Lulus s2 * :&nbsp;</strong></label><input class="form-control" type="text" name="tahun_lulus_s2" required="" ></div>
          
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
      
                <div class="form-group"><label><strong>Nama Ibu * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_ibu" required=""></div>
                <div class="form-group"><label><strong>Status Perkawinan * :&nbsp;</strong></label><input class="form-control" type="text" name="sp" required=""></div>
                <div class="form-group"><label><strong>Nama Suami / Istri * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_pasangan" required=""></div>
                <div class="form-group"><label><strong>Jumlah Anak * :&nbsp;</strong></label><input class="form-control" type="text" name="jumlah_anak" required="" ></div>
                <div class="form-group"><label><strong>Nama Bank * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_bank" required="" ></div>
                <div class="form-group"><label><strong>Nomor Rekening * :&nbsp;</strong></label><input class="form-control" type="text" name="no_rek" required="" ></div>
                <div class="form-group"><label><strong>Atas Nama * :&nbsp;</strong></label><input class="form-control" type="text" name="an" required="" ></div>
            
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
        
                <div class="form-group"><label><strong>NUPTK * :&nbsp;</strong></label><input class="form-control" type="text" name="nuptk" required="" ></div>
                <div class="form-group"><label><strong>NIP * :&nbsp;</strong></label><input class="form-control" type="text" name="nip" required="" ></div>
                <div class="form-group"><label><strong>Status Kepegawaian * :&nbsp;</strong></label><input class="form-control" type="text" name="sk" required="" ></div>
                <div class="form-group"><label><strong>Jenis PTK * :&nbsp;</strong></label><input class="form-control" type="text" name="jenis_ptk" required="" ></div>
                <div class="form-group"><label><strong>Lembaga Pengankatan * :&nbsp;</strong></label><input class="form-control" type="text" name="lembaga_pengangkatan" required=""></div>
                <div class="form-group"><label><strong>Sumber Gaji * :&nbsp;</strong></label><input class="form-control" type="text" name="sumber_gaji" required=""></div>
                <div class="form-group"><label><strong>Tugas Tambahan * :&nbsp;</strong></label><input class="form-control" type="text" name="tugas_tambahan" required=""></div>
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