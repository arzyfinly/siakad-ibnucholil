@extends('siswa.layout')

@section('content')
</br>
</br>
<div class="row">
  <div class="col-lg-12 mb-5">
      <div class="card">
        <div class="card-header">
          <h3 class="h6 text-uppercase mb-0">ATURAN PPDB  !</h3>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-lg-12 mb-5">
        <p> <strong style="background-color: red;"> 1. Persiapkan Berkas-Berkas: </strong></p>
        <ul>
          <li> Kartu Keluarga,</li> 
          <li> Akte Kelahiran,</li> 
          <li> Ijazah SD,</li> 
          <li> Surat Keterangan Lulus SMP/MTs/Paket</li>
          <li> Siapkan Foto 3 x 4 Backgroud / Latar belakang <strong>Merah</strong></li>
        </ul>
          <p><strong>2. Mohon di isi dengan Huruf Kapital</strong></p>
          <p><strong>3. Tanda bintang (*) wajib terisi</strong></p>
          <p><strong>4. Setelah mengisi berkas lengkap,dimohon berkas untuk segera di setor kepada panitia </strong></h3>
          <p><strong>5. Apabila  kurang faham mohon hubungi Admin Via : </strong></p>
          <ul>
                <li>Telephone : <strong><a href="tel://082330121039">0823-3012-1039</a></strong></li>
                <li>WhatsApp  : <strong><a href="https://api.whatsapp.com/send?phone=6281931031030">0819-3103-1030</a> & <a href="https://api.whatsapp.com/send?phone=6282301349994">0823-0134-9994</a></strong></li>
                <li>Datang ke <strong><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6533766563402!2d112.74205837997879!3d-7.049954799999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805bc1dbcffe5%3A0x67c569c7f49cb06a!2sSMKS%20IBNU%20CHOLIL!5e0!3m2!1sid!2sid!4v1585747272893!5m2!1sid!2sid" target="_blank" >Pondok Pesantren Ibnu Cholil Bangkalan.</a></strong></li>
                </ul>
          * Wajib
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>

 <div class="row">
 <!-- Basic Form-->
 <div class="col-lg-6 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Data Pribadi</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_foto',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
          <div class="form-group"><label><strong>Anak Ke * :</strong></label><input class="form-control" type="number" name="anak_ke" required="" placeholder="Anda anak keberapa..." value="{{$data->anak_ke}}"></div>
          <div class="form-group"><label><strong>Jumlah Saudara Kandung * :</strong></label><input class="form-control" type="number" name="saudara_kandung" required="" placeholder="Jumlah saudara kandung.." value="{{$data->saudara_kandung}}"></div>
          <div class="form-group"><label><strong>Jumlah Saudara Tiri/Angkat * :</strong></label><input class="form-control" type="number" name="saudara_tiri" required="" placeholder="Jumlah saudara tiri/angkat..." value="{{$data->saudara_tiri}}"></div>
          <div class="form-group"><label><strong>Hobi * :</strong></label><input class="form-control" type="text" name="hobi" required="" placeholder="Hobi anda..." value="{{$data->hobi}}"></div>
          <div class="form-group"><label><strong>Riwayat Sakit * :</strong></label><input class="form-control" type="text" name="riwayat_sakit" required="" placeholder="Riwayat sakit..." value="{{$data->riwayat_sakit}}"></div>
          <div class="form-group"><label><strong>Buta Warna* :&nbsp;</strong></label>
          <?php $bw=$data->buta_warna; ?>
                <select class="form-control" name="buta_warna">
                    <optgroup label="This is a group">
                    <option value=IYA" {{ $bw == "IYA" ? 'selected' : '' }}>IYA</option>
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
        <form id="loginForm" action="{{route('update_surat',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
        <h3 class="h6 text-uppercase mb-0">Data Diri Siswa</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_data_diri',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
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
  </div>
@endsection