@extends('admin.layout')

@section('content')
</br>
</br>

 <div class="row">
 <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Pribadi</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_foto',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <?php $ub=$data->pic; ?>
          <h1 align="center"><img src="{{ $ub == 'belum' ? asset('img/foto3x4.jpg') : url('/').Storage::url($data->pic)  }}" width="150px" alt=""></h1>
          <h1 align="center"></h1>
          <div class="form-group">
          <label><strong>Sesuaikan Foto Seperti Contoh * :</strong></label>       
            <input type="file" name="pic" class="form-control">
          </div>
          <div class="form-group"><label><strong>Tinggi Badan * :</strong></label><input class="form-control" type="number" name="tinggi_badan" required="" placeholder="Tinggi badan anda..." value="{{$data->tinggi_badan}}"></div>
          <div class="form-group"><label><strong>Berat Badan * :</strong></label><input class="form-control" type="number" name="berat_badan" required="" placeholder="Berat badan anda..." value="{{$data->berat_badan}}"></div>
          <div class="form-group"><label><strong>Lingkar Kepala * :</strong></label><input class="form-control" type="number" name="lingkar_kepala" required="" placeholder="Lingkar Kepala anda..." value="{{$data->lingkar_kepala}}"></div>
          <div class="form-group"><label><strong>Cita - Cita * :</strong></label><input class="form-control" type="text" name="cita_cita" required="" placeholder="Cita - cita anda..." value="{{$data->cita_cita}}"></div>
          <div class="form-group"><label><strong>Golongan Darah * :&nbsp;</strong></label>
            <?php $gd=$data->golongan_darah; ?>
                  <select class="form-control" name="golongan_darah">
                      <option disabled selected> Pilih Golongan Darah </option>
                      <option value="A" {{ $gd == "A" ? 'selected' : '' }}>A</option>
                      <option value="B" {{ $gd == "B" ? 'selected' : '' }}>B</option>
                      <option value="AB" {{ $gd == "AB" ? 'selected' : '' }}>AB</option>
                      <option value="O" {{ $gd == "O" ? 'selected' : '' }}>O</option>
                </select>
              </div>
          <div class="form-group"><label><strong>Keterangan Tempat Tinggal * :</strong></label><input class="form-control" type="text" name="keterangan_tempat_tinggal" required="" placeholder="keterangan tempat tinggal..." value="{{$data->keterangan_tempat_tinggal}}"></div>
          <div class="form-group"><label><strong>Anak Ke * :</strong></label><input class="form-control" type="number" name="anak_ke" required="" placeholder="Anda anak keberapa..." value="{{$data->anak_ke}}"></div>
          <div class="form-group"><label><strong>Jumlah Saudara Kandung * :</strong></label><input class="form-control" type="number" name="saudara_kandung" required="" placeholder="Jumlah saudara kandung.." value="{{$data->saudara_kandung}}"></div>
          <div class="form-group"><label><strong>Jumlah Saudara Tiri/Angkat * :</strong></label><input class="form-control" type="number" name="saudara_tiri" required="" placeholder="Jumlah saudara tiri/angkat..." value="{{$data->saudara_tiri}}"></div>
          <div class="form-group"><label><strong>Hobi * :</strong></label><input class="form-control" type="text" name="hobi" required="" placeholder="Hobi anda..." value="{{$data->hobi}}"></div>
          <div class="form-group"><label><strong>Riwayat Sakit * :</strong></label><input class="form-control" type="text" name="riwayat_sakit" required="" placeholder="Riwayat sakit..." value="{{$data->riwayat_sakit}}"></div>
          <div class="form-group"><label><strong>Buta Warna* :&nbsp;</strong></label>
          <?php $bw=$data->buta_warna; ?>
                <select class="form-control" name="buta_warna">
                    <optgroup label="This is a group">
                    <option value="IYA" {{ $bw == "IYA" ? 'selected' : '' }}>IYA</option>
                    <option value="TIDAK" {{ $bw == "TIDAK" ? 'selected' : '' }}>TIDAK</option>
                    </optgroup>
              </select>
            </div>
          <div class="form-group"><label><strong>Kelainan Fisik * :</strong></label><input class="form-control" type="text" name="kelainan_fisik" required="" placeholder="Kelainan fisik anda..." value="{{$data->kelainan_fisik}}"></div>
          
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Data Lainnya</h3>
        </div>
        <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_surat',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group"><label><strong>Nomor KIP (Bila ada) :</strong></label><input class="form-control" type="text" name="nomor_kip" placeholder="Nomor KIP jika ada..." value="{{$data->nomor_kip }}"></div>
            <div class="form-group"><label><strong>Nomor PKH (Bila ada) :</strong></label><input class="form-control" type="text" name="nomor_pkh" placeholder="Nomor PKH jika ada..." value="{{$data->nomor_pkh}}"></div>
            <div class="form-group"><label><strong>Nomor Surat Ket. Tidak Mampu (Bila ada):</strong></label><input class="form-control" type="text" name="nomor_sk" placeholder="Nomor surat tidak mampu.." value="{{$data->nomor_sk}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        </div>
      </div>
  </div>
 <!-- Basic Form-->

 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Ganti Password</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_password',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Password Baru * :&nbsp;</strong></label><input class="form-control" type="text" name="password" required="" placeholder="Masukan Password Baru..."></div>
            <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  <br>
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Diri Siswa</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_data_diri',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
                <div class="form-group"><label><strong>Nama Lengkap * :&nbsp;</strong></label><input class="form-control" type="text" name="nama_lengkap" required="" placeholder="Nama lengkap anda..." value="{{$data->nama_lengkap}}"></div>
                <?php $value=$data->jk; ?>
                <div class="form-group"><label><strong>Jenis Kelamin * :&nbsp;</strong></label>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="L" name="jk" {{ $value == "L" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-1">Laki Laki</label></div>
                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" value="P" name="jk" {{ $value == "P" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-1">Perempuan</label></div>
                </div>
                <div class="form-group"><label><strong>Nomor Kartu Keluarga * :&nbsp;</strong></label><input class="form-control" type="number" required="" name="nomor_kk" placeholder="Nomor KK anda..." value="{{$data->nomor_kk}}"></div>
                <div class="form-group"><label><strong>NIK * :&nbsp;</strong></label><input class="form-control" type="number" name="nik" required="" placeholder="Masukan NIK..." value="{{$data->nik}}"></div>
                <div class="form-group"><label><strong>Nomor Akte * :</strong></label><input class="form-control" type="text" name="nomor_akte" required="" placeholder="Nomor akte anda..." value="{{$data->nomor_akte}}"></div>
                <div class="form-group"><label><strong>Tempat Lahir * :&nbsp;</strong></label><input class="form-control" type="text" name="tempat_lahir" required="" placeholder="Tempat lahir anda..." value="{{$data->tempat_lahir}}"></div>
                <div class="form-group"><label><strong>Tanggal Lahir * :&nbsp;</strong></label><input class="form-control" type="date" required="" name="tanggal_lahir" value="{{$data->tanggal_lahir}}"></div>
                <div class="form-group"><label><strong>Alamat / Dusun * :&nbsp;</strong></label><input class="form-control" type="text" name="alamat" required="" placeholder="Alamat anda..." value="{{$data->alamat}}"></div>
                <div class="form-group"><label><strong>Desa * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="desa" placeholder="Masukan desa anda..." value="{{$data->desa}}"></div>
                <div class="form-group"><label><strong>Kecamatan * :&nbsp;</strong></label><input class="form-control" type="text" name="kecamatan" required="" placeholder="Masukan kecamatan..." value="{{$data->kecamatan}}"></div>
                <div class="form-group"><label><strong>Kabupaten * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="kabupaten" placeholder="Masukan kabupaten..." value="{{$data->kabupaten}}"></div>
                <div class="form-group"><label><strong>Provinsi * :&nbsp;</strong></label><input class="form-control" type="text" name="provinsi" required="" placeholder="Masukan provinsi..." value="{{$data->provinsi}}"></div>
                <div class="form-group"><label><strong>Kode Pos * :&nbsp;</strong></label><input class="form-control" type="number" required="" name="kode_pos" placeholder="Kode pos..." value="{{$data->kode_pos}}"></div>
                <div class="form-group"><label><strong>Nomor Handphone * :&nbsp;</strong></label><input class="form-control" type="number" name="no_hp" required="" placeholder="Nomor yang bisa dihubungi.." value="{{$data->no_hp}}"></div>
                <div class="form-group"><label><strong>Bahasa Sehari-hari * :&nbsp;</strong></label>
                <select class="form-control" name="bahasa">
                    <optgroup label="This is a group">
                    <option value="Bahasa Indonesia" selected="">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="Lainnya">Lainnya</option>
                    </optgroup>
                </select>
                </div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Sekolah Asal Siswa</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_sekolah_asal',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group"><label><strong>NISN * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="nisn" placeholder="NISN anda..." value="{{$data->nisn}}"></div>
            <div class="form-group"><label><strong>Nama Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="sekolah_asal" placeholder="Asal sekolah SMP/MTs/PAKET..." value="{{$data->sekolah_asal}}"></div>
            <div class="form-group"><label><strong>NPSN * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="npsn" placeholder="NPSN Sekolah asal..." value="{{$data->npsn}}"></div>
            <div class="form-group"><label><strong>Alamat Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="alamat_sekolah" required="" placeholder="Alamat sekolah asal.." value="{{$data->alamat_sekolah}}"></div>
            <div class="form-group"><label><strong>Desa&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="desa_sekolah" placeholder="Desa sekolah asal..." value="{{$data->desa_sekolah}}"></div>
            <div class="form-group"><label><strong>Kecamatan&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="kecamatan_sekolah" placeholder="Kecamatan sekolah asal..." value="{{$data->kecamatan_sekolah}}"></div>
            <div class="form-group"><label><strong>Kabupaten&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="kabupaten_sekolah" required="" placeholder="Kabupaten sekolah asal..." value="{{$data->kabupaten_sekolah}}"></div>
            <div class="form-group"><label><strong>Provinsi&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="text" name="provinsi_sekolah" required="" placeholder="Provinsi sekolah asal..." value="{{$data->provinsi_sekolah}}"></div>
            <div class="form-group"><label><strong>Kode Pos&nbsp;Sekolah Asal * :&nbsp;</strong></label><input class="form-control" type="number" name="kode_pos_sekolah" required="" placeholder="Kode pos sekolah asal..." value="{{$data->kode_pos_sekolah}}"></div>
            <div class="form-group"><label><strong>Berapa Tahun Bersekolah * :&nbsp;</strong></label><input class="form-control" type="text" required="" name="lama_sekolah" placeholder="Lamanya bersekolah..." value="{{$data->lama_sekolah}}"></div>
            <div class="form-group"><label><strong>Nomor Peserta Ujian Nasional * :&nbsp;</strong></label><input class="form-control" type="text" name="npun" required="" placeholder="Nomor peserta UN anda.." value="{{$data->npun}}"></div>
            <div class="form-group"><label><strong>Nomor Seri Ijazah SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="ijazah_sd" required="" placeholder="Nomor seri ijazah SD.." value="{{$data->ijazah_sd}}"></div>
            <div class="form-group"><label><strong>Nomor Seri SKHUN SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="skhun_sd" required="" placeholder="Nomor seri SKHUN SD.." value="{{$data->skhun_sd}}"></div>
            <div class="form-group"><label><strong>Nama Orang Tua Ijazah SD/Sederajat * :&nbsp;</strong></label><input class="form-control" type="text" name="orang_tua_sd" required="" placeholder="Nama orang tua sesuai ijazah SD.." value="{{$data->orang_tua_sd}}"></div>
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
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Lulusan</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_data_lulusan',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
            @csrf
                <?php $pi=$data->pic_lulus; ?>
            <h1><img src="{{ $pi == null ? asset('img/foto3x4.jpg') : url('/').Storage::url($data->pic_lulus)  }}" width="150px" alt=""></h1>
            <h1 align="center"></h1>
            <div class="form-group">
            <label><strong>Sesuaikan Foto Seperti Contoh * :</strong></label>       
                <input type="file" name="pic_lulus" class="form-control">
            </div>
            <div class="form-group">
            <label><strong>SKL :</strong></label>       
                <input type="file" name="skl" class="form-control">
            </div>
            <div class="form-group"><label><strong>Nomor Ijazah :&nbsp;</strong></label><input class="form-control" type="text" required="" name="no_ijazah" placeholder="no ijazah anda..." value="{{$data->no_ijazah}}"></div>
            <div class="form-group"><label><strong>Tanggal Lulusan Ijazah :&nbsp;</strong></label><input class="form-control" type="date" required="" name="tanggal_lulusan_ijazah" value="{{$data->tanggal_lulusan_ijazah}}"></div>
            <div class="form-group"><label><strong>Mutasi * :&nbsp;</strong></label>
                <?php $mu=$data->mutasi; ?>
                      <select class="form-control" name="mutasi">
                          <option disabled selected><strong>Pilih Jenis Mutasi</strong></option>
                          <option value="Masuk" {{ $mu == "Masuk" ? 'selected' : '' }}>Masuk</option>
                          <option value="Pindah" {{ $mu == "Pindah" ? 'selected' : '' }}>Pindah</option>
                          <option value="Lulus" {{ $mu == "Lulus" ? 'selected' : '' }}>Lulus</option>
                    </select>
                  </div>
            <div class="form-group"><label><strong>Keterangan Mutasi :&nbsp;</strong></label><input class="form-control" type="text" name="keterangan_mutasi" required="" placeholder="keterangan mutasi.." value="{{$data->keterangan_mutasi}}"></div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Ayah</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_ayah',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
  <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Ibu</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_ibu',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
  <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data wali</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_wali',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Pilih Jurusan</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('admin_update_pilihan_jurusan',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Pilih Jurusan :</strong></label>
                <div class="form-row">
                    <div class="col">
                        <div class="carousel slide" data-ride="carousel" id="carousel-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item"><img class="w-100 d-block" src="{{asset('img/tkj.jpg')}}" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="{{asset('img/apat.jpg')}}" alt="Slide Image"></div>
                                <div class="carousel-item active"><img class="w-100 d-block" src="{{asset('img/tbsm.jpg')}}" alt="Slide Image"></div>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                                    role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0"></li>
                                <li data-target="#carousel-1" data-slide-to="1"></li>
                                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                    <hr>
                    </div>
                </div>
                <div class="form-row">
                <?php $jurusan=$data->pilihan_jurusan; ?>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="pilihan_jurusan" required="" value="TKJ" {{ $jurusan == "TKJ" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-2"><strong>Teknik Komputer Jaringan</strong></label></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="pilihan_jurusan" value="APAT" {{ $jurusan == "APAT" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-3"><strong>Agribisnis Perikanan Air Tawar</strong></label></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="pilihan_jurusan" value="TBSM" {{ $jurusan == "TBSM" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-4"><strong>Teknik &amp; Bisnis Sepeda Motor</strong></label></div>
                    </div>
                </div>
            </div>
            <div class="form-group"><label><strong>Ukuran Baju * :&nbsp;</strong></label>
          <?php $ub=$data->ukuran_baju; ?>
                <select class="form-control" name="ukuran_baju">
                    <optgroup label="This is a group">
                    <option value="S" {{ $ub == "S" ? 'selected' : '' }}>S</option>
                    <option value="M" {{ $ub == "M" ? 'selected' : '' }}>M</option>
                    <option value="L" {{ $ub == "L" ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ $ub == "XL" ? 'selected' : '' }}>XL</option>
                    <option value="XXL" {{ $ub == "XXL" ? 'selected' : '' }}>XXL</option>
                    </optgroup>
              </select>
            </div>
            <div class="form-group"><label><strong>NIS :&nbsp;</strong></label><input class="form-control" type="text" name="nis" placeholder="Nis baru" value="{{$data->nis}}"></div>
            <div class="form-group"><label><strong>Tanggal Masuk :&nbsp;</strong></label><input class="form-control" type="date" name="tahun" value="{{$data->tahun}}"></div>
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