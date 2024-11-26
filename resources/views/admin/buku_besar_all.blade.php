<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Induk SMKS Ibnu Cholil</title>
    <style>
        table {
        border-collapse: collapse;
        }
@media print {
    .pagebreak { page-break-before: always;} /* page-break-after works, as well */
}
    </style>
    <style type="text/css" media="print">
        @page { size: A2 landscape; }
    </style>
</head>
<body style=" margin-left: 60px;  font-family: Verdana,Arial,Helvetica,Georgia; font-size: 16px;">
@foreach ($datas as $data)
    

    </br>
    </br>
        <H3 align="center">LEMBAR BUKU INDUK PESERTA DIDIK</H3>
        <p align="center">Nomor Induk : 
            @if(isset($data->nis))
            {{$data->nis}}</p>
            @endif

<table>
    <tr>
        <td width="44%" valign="top">
            <table>
                <tr>
                    <td><p><b>A. KETERANGAN TENTANG PESERTA DIDIK </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nama Lengkap</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nama_lengkap))
                        {{$data->nama_lengkap}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->jk))
                        {{$data->jk}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_kk))
                        {{$data->nomor_kk}}</td>
                        @endif
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nik))
                        {{$data->nik}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Akte</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_akte))
                        {{$data->nomor_akte}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tempat_lahir))
                        {{$data->tempat_lahir}}, 
                        @endif
                        @if(isset($data->tanggal_lahir))
                        {{$data->tanggal_lahir}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Alamat / Dusun</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->alamat))
                        {{$data->alamat}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Desan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->desa))
                        {{$data->desa}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kecamatan))
                        {{$data->kecamatan}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kabupaten))
                        {{$data->kabupaten}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->provinsi))
                        {{$data->provinsi}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kode_pos))
                        {{$data->kode_pos}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->no_hp))
                        {{$data->no_hp}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Bahasa Sehari-hari</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->bahasa))
                        {{$data->bahasa}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tinggi_badan))
                        {{$data->tinggi_badan}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->berat_badan))
                        {{$data->berat_badan}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Lingkar Kepala</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->lingkar_kepala))
                        {{$data->lingkar_kepala}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Cita - Cita</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->cita_cita))
                        {{$data->cita_cita}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->golongan_darah))
                        {{$data->golongan_darah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Keterangan Tempat Tinggal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->keterangan_tempat_tinggal))
                        {{$data->keterangan_tempat_tinggal}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->anak_ke))
                        {{$data->anak_ke}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Saudara Kandung</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->saudara_kandung))
                        {{$data->saudara_kandung}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Saudara Tiri/Angkat</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->saudara_tiri))
                        {{$data->saudara_tiri}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->hobi))
                        {{$data->hobi}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Riwayat Sakit</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->riwayat_sakit))
                        {{$data->riwayat_sakit}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Buta Warna</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->buta_warna))
                        {{$data->buta_warna}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kelainan Fisik</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kelainan_fisik))
                        {{$data->kelainan_fisik}}</td>
                        @endif
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>B. KETERANGAN PENDIDIKAN </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><p style="font-size: 14px;"><b>B1. Pendidikan Sekolah Dasar </b></p></td>
                </tr>
                <tr>
                    <td>Ijazah SD</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->ijazah_sd))
                        {{$data->ijazah_sd}}</td>
                        @endif
                </tr>
                <tr>
                    <td>SKHUN SD</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->skhun_sd))
                        {{$data->skhun_sd}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nama Orang Tua Ijazah SD</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->orang_tua_sd))
                        {{$data->orang_tua_sd}}</td>
                        @endif
                </tr>
                <tr>
                    <td><p style="font-size: 14px;"><b>B2. Pendidikan Sekolah Menengah Pertama </b></p></td>
                </tr>
                <tr>
                    <td width="195">Nama Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->sekolah_asal))
                        {{$data->sekolah_asal}}</td>
                        @endif
                </tr>
                <tr>
                    <td>NPSN</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->npsn))
                        {{$data->npsn}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Alamat Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->alamat_sekolah))
                        {{$data->alamat_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Desa Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->desa_sekolah))
                        {{$data->desa_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kecamatan Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kecamatan_sekolah))
                        {{$data->kecamatan_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kabupaten Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kabupaten_sekolah))
                        {{$data->kabupaten_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Provinsi Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->provinsi_sekolah))
                        {{$data->provinsi_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Kode Pos Sekolah Asal</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->kode_pos_sekolah))
                        {{$data->kode_pos_sekolah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Peserta UN</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->npun))
                        {{$data->npun}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Ijazah SMP</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->ijazah_smp))
                        {{$data->ijazah_smp}}</td>
                        @endif
                </tr>
                <tr>
                    <td>SKHUN SMP</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->skhun_smp))
                        {{$data->skhun_smp}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nama Orang Tua Ijazah SMP</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->orang_tua_smp))
                        {{$data->orang_tua_smp}}</td>
                        @endif
                </tr>
            </table>
            
        </td>
        <td width="44%" valign="top">
        <table>
                <tr>
                    <td><p><b>C. KETERANGAN DITERIMA DI JURUSAN </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nisn))
                        {{$data->nisn}}</td>
                        @endif
                </tr>
                <tr>
                    <td width="190">NIS</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nis))
                        {{$data->nis}}</td>
                        @endif
                </tr> 
                <tr>
                    <td>Diterima Dijurusan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pilihan_jurusan))
                        {{$data->pilihan_jurusan}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tanggal Masuk</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tahun))
                        {{$data->tahun}}</td>
                        @endif
                </tr> 
            </table>
        <table>
                <tr>
                    <td><p><b>D. KETERANGAN TENTANG AYAH KANDUNG </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nama Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nama_ayah))
                        {{$data->nama_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>NIK Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nik_ayah))
                        {{$data->nik_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Handphone Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_ayah))
                        {{$data->nomor_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tempat_lahir_ayah))
                        {{$data->tempat_lahir_ayah}}, 
                        @endif
                        @if(isset($data->tanggal_lahir_ayah))
                        {{$data->tanggal_lahir_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pendidikan Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pendidikan_ayah))
                        {{$data->pendidikan_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pekerjaan_ayah))
                        {{$data->pekerjaan_ayah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Penghasilan Ayah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->penghasilan_ayah))
                        {{$data->penghasilan_ayah}}</td>
                        @endif
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>E. KETERANGAN TENTANG IBU KANDUNG </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nama Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nama_ibu))
                        {{$data->nama_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>NIK Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nik_ibu))
                        {{$data->nik_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Handphone Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_ibu))
                        {{$data->nomor_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tempat_lahir_ibu))
                        {{$data->tempat_lahir_ibu}}, 
                        @endif
                        @if(isset($data->tanggal_lahir_ibu))
                        {{$data->tanggal_lahir_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pendidikan Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pendidikan_ibu))
                        {{$data->pendidikan_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pekerjaan_ibu))
                        {{$data->pekerjaan_ibu}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Penghasilan Ibu</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->penghasilan_ibu))
                        {{$data->penghasilan_ibu}}</td>
                        @endif
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>F. KETERANGAN TENTANG WALI </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nama Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nama_wali))
                        {{$data->nama_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>NIK Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nik_wali))
                        {{$data->nik_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Nomor Handphone Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_wali))
                        {{$data->nomor_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tempat_lahir_wali))
                        {{$data->tempat_lahir_wali}}, 
                        @endif
                        @if(isset($data->tanggal_lahir_wali))
                        {{$data->tanggal_lahir_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pendidikan Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pendidikan_wali))
                        {{$data->pendidikan_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Pekerjaan Wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->pekerjaan_wali))
                        {{$data->pekerjaan_wali}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Penghasilan wali</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->penghasilan_wali))
                        {{$data->penghasilan_wali}}</td>
                        @endif
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>G. KETERANGAN BEASISWA </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">KIP</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_kip))
                        {{$data->nomor_kip}}</td>
                        @endif
                </tr>
                <tr>
                    <td>PKH</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_pkh))
                        {{$data->nomor_pkh}}</td>
                        @endif
                </tr>
                <tr>
                    <td>SKTM</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->nomor_sktm))
                        {{$data->nomor_sktm}}</td>
                        @endif
                </tr>
              
            </table>
            <table>
                <tr>
                    <td><p><b>H. DATA KELULUSAN </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nomor Ijazah</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->no_ijazah))
                        {{$data->no_ijazah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Tanggal Lulusan</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->tanggal_lulusan_ijazah))
                        {{$data->tanggal_lulusan_ijazah}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Mutasi</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->mutasi))
                        {{$data->mutasi}}</td>
                        @endif
                </tr>
                <tr>
                    <td>Keterangan Mutasi</td>
                    <td>:</td>
                    <td>
                        @if(isset($data->keterangan_mutasi))
                        {{$data->keterangan_mutasi}}</td>
                        @endif
                </tr>
              
            </table>
        </td>
        <td width="20%">
            <table>
                <tr>
                    <td align="center"><p><b>Waktu Diterima <br> SMKS IBNU CHOLIL</b></p></td>
                </tr>
                <tr>
                    @if(isset($data->pic))
                        <?php $ub=$data->pic; ?>
                    @else    
                        <?php $ub='belum' ?>
                    @endif
                    <td align="center"><img src="{{ $ub == 'belum' ? asset('img/bg3x4.jpg') : url('/').Storage::url($data->pic)  }}" width="113px" height="151px" alt=""></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td align="center"></td>
                </tr>
                <tr>
                    <td align="center"></br></br></br></br></br></br></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td align="center"><p><b>Waktu Lulus <br> SMKS IBNU CHOLIL</b></p></td>
                </tr>
                <tr>
                    @if(isset($data->pic_lulus))
                        <?php $ul=$data->pic_lulus; ?>
                    @else    
                        <?php $ul='belum' ?>
                    @endif
                    <td align="center"><img src="{{ $ul == null || $ul == 'belum' ? asset('img/bg3x4.jpg') : url('/').Storage::url($data->pic_lulus)  }}" width="113px" height="151px" alt=""></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endforeach
<footer></footer>
</body>
</html>