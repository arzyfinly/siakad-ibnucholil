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
<body onload="window.print()" style=" margin-left: 60px;  font-family: Verdana,Arial,Helvetica,Georgia; font-size: 16px;">
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
@if (isset($krs) && isset($filtered_mapels))
<div class="pagebreak"></div>
<br><br><br>
<table style="width: 100%">
    <tr>
        <td style="text-align: center">
            <span style="font-size: 14px; font-weight:700">LAPORAN PENILAIAN HASIL BELAJAR / LEGER</span>
        </td>
    </tr>
</table>
<br>
<span class="font-sub-judul">NAMA PESERTA DIDIK : {{ strtoupper($data->nama_lengkap) }}</span>
<br>

<table border="1" class="text-center" style="width: 100%">
    <tr>
        <td rowspan="3" colspan="4" style="width: 30%; vertical-align: middle; text-align: center; font-weight:700" >Mata Pelajaran</td>
        {{-- <td rowspan="3" style="width: 20%;" class="font-normal-leger">Nama Guru</td> --}}
        @foreach ($krs as $item)
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;" colspan="3">{{ $item->kelas->kelas }}</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;" colspan="3">{{$item->tahun}}</td>
        @endforeach
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" colspan="4" rowspan="2">RATA-RATA NILAI</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" rowspan="3">USP</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" rowspan="3">UKK</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" rowspan="3">USP+UKK/2 (30%)</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" rowspan="3">KELULUSAN (70%+30%)/2(30%)</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" rowspan="3">LULUS/TIDAK LULUS</td>
    </tr>
    <tr>
        @foreach ($krs as $item)
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700" colspan="6">{{ $item->semester }}</td>
        @endforeach
    </tr>
    <tr>
        @foreach ($krs as $item)
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px;  widht: 10%">KKM</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px; ">NP</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px; ">NK</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px; ">RPK</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px; ">NS</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 13px; ">PS</td>
        @endforeach
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;">P S1-S6</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;">K S1-S6</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;">S S1-S6</td>
        <td class="font-normal-leger text-center" style="text-align: center; font-weight:700; font-size: 12px;">R P+K(70%)</td>

    </tr>
    @php
        $total_r_p = [];
        $total_r_k = [];
        $total_r_s = [];
        $total_r_usp_ukk = [];
    @endphp
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">A. Muatan Nasional</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $munal = $mapel->where('kategori', 'Muatan Nasional');
    @endphp
    @foreach ($munal as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_munal_pengetahuan = collect($nilai_pengetahuan);
            $nilais_munal_keterampilan = collect($nilai_keterampilan);
            $nilais_munal_sikap = collect($nilai_sikap);
            $nilai_munal_pengetahuan = $nilais_munal_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_munal_keterampilan = $nilais_munal_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_munal_sikap = $nilais_munal_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_munal_pengetahuan['skor_akhir']))
                                                        {{ $nilai_munal_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_munal_keterampilan['skor_akhir']))
                                                        {{ $nilai_munal_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_munal_pengetahuan['skor_akhir']) && isset($nilai_munal_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_munal_pengetahuan['skor_akhir'] + $nilai_munal_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_munal_sikap['nilai']))
            {{ $nilai_munal_sikap['nilai'] }}  
            @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_munal_sikap['nilai']))
                    @if($nilai_munal_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_munal_sikap['nilai']>=$kkm && $nilai_munal_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_munal_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_munal_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_munal_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_munal_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_munal_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_munal_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_munal_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_munal_keterampilan['skor_akhir'];
                }
                if (isset($nilai_munal_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_munal_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
            @php
                $total_usp[] = $usp['nilai'];
            @endphp
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"></td>
            @endif
                <td class="font-normal-leger align-middle" style="text-align: center"></td>
            @if (isset($usp['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
            @else
                <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
                @endif
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    

    </tr>
        @endforeach
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">B. Muatan Kewilayahan</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $muke = $mapel->where('kategori', 'Muatan Kewilayahan');
    @endphp
    @foreach ($muke as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_muke_pengetahuan = collect($nilai_pengetahuan);
            $nilais_muke_keterampilan = collect($nilai_keterampilan);
            $nilais_muke_sikap = collect($nilai_sikap);
            $nilai_muke_pengetahuan = $nilais_muke_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_muke_keterampilan = $nilais_muke_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_muke_sikap = $nilais_muke_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_muke_pengetahuan['skor_akhir']))
                                                        {{ $nilai_muke_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_muke_keterampilan['skor_akhir']))
                                                        {{ $nilai_muke_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_muke_pengetahuan['skor_akhir']) && isset($nilai_muke_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_muke_pengetahuan['skor_akhir'] + $nilai_muke_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_muke_sikap['nilai']))
            {{ $nilai_muke_sikap['nilai'] }}  
            @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_muke_sikap['nilai']))
                    @if($nilai_muke_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_muke_sikap['nilai']>=$kkm && $nilai_muke_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_muke_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_muke_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_muke_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_muke_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_muke_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_muke_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_muke_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_muke_keterampilan['skor_akhir'];
                }
                if (isset($nilai_muke_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_muke_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
                @php
                        $total_usp[] = $usp['nilai'];
                @endphp
                    
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"> </td>
            @endif
                <td class="font-normal-leger align-middle" style="text-align: center"></td>
                @if (isset($usp['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
            @else
                <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
                @endif
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
    </tr>
    @endforeach
    
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">Jumlah A dan B</td>
    </tr>
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">C. Muatan Peminatan Kejuruan</td>
    </tr>
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">C1. Dasar Bidang Keahlian</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $dbk = $mapel->where('kategori', 'Dasar Bidang Keahlian');
    @endphp
    @foreach ($dbk as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_dbk_pengetahuan = collect($nilai_pengetahuan);
            $nilais_dbk_keterampilan = collect($nilai_keterampilan);
            $nilais_dbk_sikap = collect($nilai_sikap);
            $nilai_dbk_pengetahuan = $nilais_dbk_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_dbk_keterampilan = $nilais_dbk_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_dbk_sikap = $nilais_dbk_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dbk_pengetahuan['skor_akhir']))
                                                        {{ $nilai_dbk_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dbk_keterampilan['skor_akhir']))
                                                        {{ $nilai_dbk_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dbk_pengetahuan['skor_akhir']) && isset($nilai_dbk_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_dbk_pengetahuan['skor_akhir'] + $nilai_dbk_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dbk_sikap['nilai']))
            {{ $nilai_dbk_sikap['nilai'] }}  
            @endif</td>
            <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_dbk_sikap['nilai']))
                    @if($nilai_dbk_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_dbk_sikap['nilai']>=$kkm && $nilai_dbk_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_dbk_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_dbk_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_dbk_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_dbk_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_dbk_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_dbk_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_dbk_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_dbk_keterampilan['skor_akhir'];
                }
                if (isset($nilai_dbk_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_dbk_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
                @php
                        $total_usp[] = $usp['nilai'];
                    @endphp
                    
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"> </td>
            @endif
                <td class="font-normal-leger align-middle" style="text-align: center"></td>
                @if (isset($usp['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
            @else
                <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
                @endif
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
    </tr>
    @endforeach
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">C2. Dasar Program Keahlian</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $dpk = $mapel->where('kategori', 'Dasar Program Keahlian');
    @endphp
    @foreach ($dpk as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_dpk_pengetahuan = collect($nilai_pengetahuan);
            $nilais_dpk_keterampilan = collect($nilai_keterampilan);
            $nilais_dpk_sikap = collect($nilai_sikap);
            $nilai_dpk_pengetahuan = $nilais_dpk_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_dpk_keterampilan = $nilais_dpk_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_dpk_sikap = $nilais_dpk_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dpk_pengetahuan['skor_akhir']))
                                                        {{ $nilai_dpk_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dpk_keterampilan['skor_akhir']))
                                                        {{ $nilai_dpk_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dpk_pengetahuan['skor_akhir']) && isset($nilai_dpk_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_dpk_pengetahuan['skor_akhir'] + $nilai_dpk_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_dpk_sikap['nilai']))
            {{ $nilai_dpk_sikap['nilai'] }}  
            @endif</td>
            <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_dpk_sikap['nilai']))
                    @if($nilai_dpk_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_dpk_sikap['nilai']>=$kkm && $nilai_dpk_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_dpk_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_dpk_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_dpk_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_dpk_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_dpk_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_dpk_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_dpk_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_dpk_keterampilan['skor_akhir'];
                }
                if (isset($nilai_dpk_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_dpk_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
                @php
                        $total_usp[] = $usp['nilai'];
                    @endphp
                    
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"> </td>
            @endif
            {{-- UKK --}}
            @php
            if (isset($all_ukk)) {
                $ukk = collect($all_ukk);
                $dpk_ukk = $ukk->where('nama_mapel', $item['nama_mapel'])->first();
            }
            @endphp
            @if (isset($dpk_ukk))
                @php
                        $total_ukk[] = $dpk_ukk['nilai'];
                @endphp
            <td class="font-normal-leger align-middle" style="text-align: center">{{ $dpk_ukk['nilai'] }}</td>
            @else
            <td class="font-normal-leger align-middle" style="text-align: center"></td>
            @endif
            @if (isset($usp['nilai']) && isset($dpk_ukk['nilai']))
            @php
                $total_r_usp_ukk[] = ($usp['nilai']+$dpk_ukk['nilai'])/2;
            @endphp
            <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai']+$dpk_ukk['nilai'])/2 }}</td>
            @elseif (isset($usp['nilai']))
            @php
                $total_r_usp_ukk[] = ($usp['nilai'])/2;
            @endphp
            <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
            @elseif (isset($dpk_ukk['nilai']))
            @php
                $total_r_usp_ukk[] = ($dpk_ukk['nilai'])/2;
            @endphp
            <td class="font-normal-leger align-middle" style="text-align: center">{{ $dpk_ukk['nilai']/2 }}</td>
            @else
            <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
            @endif

            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
    </tr>
    @endforeach
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">C3. Kompetensi Keahlian</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $kk = $mapel->where('kategori', 'Kompetensi Keahlian');
    @endphp
    @foreach ($kk as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_kk_pengetahuan = collect($nilai_pengetahuan);
            $nilais_kk_keterampilan = collect($nilai_keterampilan);
            $nilais_kk_sikap = collect($nilai_sikap);
            $nilai_kk_pengetahuan = $nilais_kk_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_kk_keterampilan = $nilais_kk_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_kk_sikap = $nilais_kk_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_kk_pengetahuan['skor_akhir']))
                                                        {{ $nilai_kk_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_kk_keterampilan['skor_akhir']))
                                                        {{ $nilai_kk_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_kk_pengetahuan['skor_akhir']) && isset($nilai_kk_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_kk_pengetahuan['skor_akhir'] + $nilai_kk_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_kk_sikap['nilai']))
            {{ $nilai_kk_sikap['nilai'] }}  
            @endif</td>
            <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_kk_sikap['nilai']))
                    @if($nilai_kk_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_kk_sikap['nilai']>=$kkm && $nilai_kk_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_kk_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_kk_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_kk_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_kk_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_kk_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_kk_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_kk_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_kk_keterampilan['skor_akhir'];
                }
                if (isset($nilai_kk_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_kk_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
                @php
                        $total_usp[] = $usp['nilai'];
                    @endphp
                    
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"> </td>
            @endif
            {{-- UKK --}}
            @php
            if (isset($all_ukk)) {
                $ukk = collect($all_ukk);
                $kk_ukk = $ukk->where('nama_mapel', $item['nama_mapel'])->first();
            }
            @endphp
            @if (isset($kk_ukk))
                @php
                        $total_ukk[] = $kk_ukk['nilai'];
                @endphp
            <td class="font-normal-leger align-middle" style="text-align: center">{{ $kk_ukk['nilai'] }}</td>
            @else
            <td class="font-normal-leger align-middle" style="text-align: center"></td>
            @endif
                @if (isset($usp['nilai']) && isset($kk_ukk['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai']+$kk_ukk['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai']+$kk_ukk['nilai'])/2 }}</td>
                @elseif (isset($usp['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
                @elseif (isset($kk_ukk['nilai']))
                @php
                    $total_r_usp_ukk[] = ($kk_ukk['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $kk_ukk['nilai']/2 }}</td>
                @else
                <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
                @endif

            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
    </tr>
    @endforeach
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">Jumlah C(C1,C2, dan C3)</td>
    </tr>
    <tr>
        <td class="font-normal-leger align-middle" colspan="49" style="font-weight:700">Muatan Lokal</td>
    </tr>
    @php
        $mapel = collect($filtered_mapels);
        $mulok = $mapel->where('kategori', 'MULOK');
    @endphp
    @foreach ($mulok as $item)
    <tr> 
        <td class="font-normal-leger align-middle" colspan="4">{{ $item['nama_mapel'] }}</td>
        @foreach ($krs as $new)    
        @php
            $nilais_mulok_pengetahuan = collect($nilai_pengetahuan);
            $nilais_mulok_keterampilan = collect($nilai_keterampilan);
            $nilais_mulok_sikap = collect($nilai_sikap);
            $nilai_mulok_pengetahuan = $nilais_mulok_pengetahuan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_mulok_keterampilan = $nilais_mulok_keterampilan->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->where('semester', $new->semester)->first();
            $nilai_mulok_sikap = $nilais_mulok_sikap->where('nama_mapel', $item['nama_mapel'])->where('tahun', $new->tahun)->first();
        @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ $item['ket'] }}</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_mulok_pengetahuan['skor_akhir']))
                                                        {{ $nilai_mulok_pengetahuan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_mulok_keterampilan['skor_akhir']))
                                                        {{ $nilai_mulok_keterampilan['skor_akhir'] }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_mulok_pengetahuan['skor_akhir']) && isset($nilai_mulok_keterampilan['skor_akhir']))
                                                        {{ round(($nilai_mulok_pengetahuan['skor_akhir'] + $nilai_mulok_keterampilan['skor_akhir'])/2,1) }}  
                                                        @endif</td>
        <td class="font-normal-leger align-middle" style="text-align: center"> @if(isset($nilai_mulok_sikap['nilai']))
            {{ $nilai_mulok_sikap['nilai'] }}  
            @endif</td>
            <td class="font-normal-leger align-middle" style="text-align: center">
                @php
                $kkm = 60;
                    $panjang=number_format(((100-$kkm)/3),0);
                @endphp
                @if(isset($nilai_mulok_sikap['nilai']))
                    @if($nilai_mulok_sikap['nilai']<=$kkm)
                    D
                    @elseif($nilai_mulok_sikap['nilai']>=$kkm && $nilai_mulok_sikap['nilai']<=($kkm+($panjang*1)))
                    C
                    @elseif($nilai_mulok_sikap['nilai']>=($kkm+($panjang*1)) && $nilai_mulok_sikap['nilai']<=($kkm+($panjang*2)))
                    B
                    @elseif($nilai_mulok_sikap['nilai']>=($kkm+($panjang*2)) && $nilai_mulok_sikap['nilai']<=100)
                    A
                    @endif
                @endif
        </td>
            @php
                if (isset($nilai_mulok_pengetahuan['skor_akhir'])) {
                    $r_pengetahuan[] = $nilai_mulok_pengetahuan['skor_akhir'];
                }
                if (isset($nilai_mulok_keterampilan['skor_akhir'])) {
                    $r_keterampilan[]    = $nilai_mulok_keterampilan['skor_akhir'];
                }
                if (isset($nilai_mulok_sikap['nilai'])) {
                    $r_sikap[]    = $nilai_mulok_sikap['nilai'];
                }
            @endphp
            @endforeach
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_pengetahuan))
                
            @php
                $t_p = array_sum($r_pengetahuan);
                $j_p = count($r_pengetahuan);
                if ($j_p) {
                    $r_p = $t_p/$j_p;
                    $total_r_p[] = $r_p;
                }
                @endphp
            {{ round($r_p,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_keterampilan))
                
            @php
                $t_k = array_sum($r_keterampilan);
                $j_k = count($r_keterampilan);
                if ($j_k) {
                    $r_k = $t_k/$j_k;
                    $total_r_k[] = $r_k;
                }
                @endphp
            {{ round($r_k,1) }}
            @else
                
            @endif
        </td>
        <td class="font-normal-leger align-middle" style="text-align: center">
            @if (isset($r_sikap))
                
            @php
                $t_s = array_sum($r_sikap);
                $j_s = count($r_sikap);
                if ($j_s) {
                    $r_s = $t_s/$j_s;
                    $total_r_s[] = $r_s;
                }
                @endphp
            {{ round($r_s,1) }}
            @else
                
            @endif
        </td>
        @if (isset($r_p) && isset($r_k))
            
        @php
            $total_r_p_k[] = round(($r_p+$r_k)/2,1);
            @endphp
        <td class="font-normal-leger align-middle" style="text-align: center">{{ round(($r_p+$r_k)/2,1) }}</td>
        @else
        <td class="font-normal-leger align-middle" style="text-align: center"></td>
            
        @endif
        @php
            if (isset($all_usp)) {
            $us = collect($all_usp);

            $usp = $us->where('nama_mapel', $item['nama_mapel'])->first();
        }

        @endphp
            @if (isset($usp['nilai']))
                <td class="font-normal-leger align-middle" style="text-align: center">{{ $usp['nilai'] }}</td>
                @php
                    $total_usp[] = $usp['nilai'];
                @endphp
            @else
                <td class="font-normal-leger align-middle" style="text-align: center"> </td>
            @endif
                <td class="font-normal-leger align-middle" style="text-align: center"></td>
            @if (isset($usp['nilai']))
                @php
                    $total_r_usp_ukk[] = ($usp['nilai'])/2;
                @endphp
                <td class="font-normal-leger align-middle" style="text-align: center">{{ ($usp['nilai'])/2 }}</td>
            @else
                <td class="font-normal-leger align-middle" style="text-align: center">{{ '0,00' }}</td>    
            @endif
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
            <td class="font-normal-leger align-middle" style="text-align: center"></td>    
    </tr>
    @endforeach
    @php
        $col1 = 0;
        $col2 = 0;
    @endphp
    @if ($krs_count == 6)
    @php
        $col1 = 40;
        $col2 = 44;
    @endphp
    @elseif ($krs_count == 5)
    @php
        $col1 = 34;
        $col2 = 38;
    @endphp
    @elseif ($krs_count == 4)
    @php
        $col1 = 28;
        $col2 = 32;
    @endphp
    @elseif ($krs_count == 3)
    @php
        $col1 = 22;
        $col2 = 26;
    @endphp
    @elseif ($krs_count == 2)
    @php
        $col1 = 16;
        $col2 = 20;
    @endphp
    @elseif ($krs_count == 1)
    @php
        $col1 = 10;
        $col2 = 14;
    @endphp
    @endif
    <tr>
        <td class="font-normal-leger align-middle" style="font-weight:700" colspan="{{ $col2 }}">Total</td>
        <td class="font-normal-leger align-middle"style="text-align: center; font-weight:700">USP</td>
        <td class="font-normal-leger align-middle"style="text-align: center; font-weight:700">UKK</td>
        <td class="font-normal-leger align-middle"style="text-align: center; font-weight:700">R USP UKK (30%)</td>
        <td class="font-normal-leger align-middle"style="text-align: center; font-weight:700">TOTAL (70%)+(30%)</td>
        <td class="font-normal-leger align-middle"style="text-align: center;"></td>
    </tr>
    <tr>
        <td class="font-normal-leger align-middle" style="font-weight:700" colspan="{{ $col1 }}">TOTAL KESELURUHAN NILAI</td>
        @if (isset($total_usp))
            
        @php
            $cusp = count($total_usp);
            $tusp = array_sum($total_usp);
            
            $rusp = $tusp/$cusp;
            
            @endphp
        @else
            
        @endif

        @if (isset($total_ukk))
            
        @php
            $cukk = count($total_ukk);
            $tukk = array_sum($total_ukk);
            
            $rukk = $tukk/$cukk;
            
            @endphp
        @else
            
        @endif
        <td class="font-normal-leger align-middle"style="text-align: center">{{ round(array_sum($total_r_p),1) }}</td>
        <td class="font-normal-leger align-middle"style="text-align: center">{{ round(array_sum($total_r_k),1) }}</td>
        <td class="font-normal-leger align-middle"style="text-align: center">{{ round(array_sum($total_r_s),1) }}</td>
        @php
            $crpk = count($total_r_p_k);
            $trpk = array_sum($total_r_p_k);

            $rrpk = $trpk/$crpk; 
        @endphp
        <td class="font-normal-leger align-middle"style="text-align: center">{{ round($trpk,1) }}</td>
        @if (isset($rusp))
        <td class="font-normal-leger align-middle"style="text-align: center">{{ round($rusp,1) }}</td>
        @else
        <td class="font-normal-leger align-middle"style="text-align: center"></td>
        @endif
        @if (isset($rukk))
        <td class="font-normal-leger align-middle"style="text-align: center">{{ $rukk }}</td>
        @else
        <td class="font-normal-leger align-middle"style="text-align: center"></td>
        @endif
        @if (isset($rusp) && isset($rukk))
        @php
            $rtruk = ($rusp + $rukk)/2;
        @endphp
            <td class="font-normal-leger align-middle"style="text-align: center">{{ round(($rtruk),1) }}</td>
        @else
            <td class="font-normal-leger align-middle"style="text-align: center"></td>
        @endif
        @if (isset($rrpk) && isset($rtruk) )
            @php
                $total_70_30 = ((70/100)*round($rrpk,1))+((30/100)*round($rtruk,1));
                if($total_70_30 >= 70){
                    $kelulusan = "LULUS";
                }else{
                    $kelulusan = "TIDAK LULUS";
                }
            @endphp
            <td class="font-normal-leger align-middle"style="text-align: center">{{ $total_70_30 }}</td>
        @else
            <td class="font-normal-leger align-middle"style="text-align: center"></td>
        @endif
        @if (isset($kelulusan))
        <td class="font-normal-leger align-middle"style="text-align: center">{{ $kelulusan }}</td>
        @else
        <td class="font-normal-leger align-middle"style="text-align: center"></td>
        @endif
    </tr>
</table>
<br>


<div class="pagebreak"></div>

<strong><label>KEGIATAN DI DUNIA USAHA DAN DUNIA KERJA</label></strong>
<table style="width: 75%" border="1">
    <tr>
        <td style="width: 1%">NO</td>
        <td style="width: 15%">TAHUN MAGANG</td>
        <td style="width: 8%"><center>NILAI</center></td>
        <td style="width: 25%"><center>MITRA/NAMA DUNIA USAHA ATAU DUNIA INDUSTRI</center></td>
        <td style="width: 25%"><center>LOKASI</center></td>
        <td style="width: 1%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td style="width: 9%"><center>LAMA(BULAN)</center></td>
        <td style="width: 15%"><center>KETERANGAN</center></td>
        <td style="width: 1%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td style="width: 6%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td style="width: 6%"><center>&nbsp;&nbsp;&nbsp;AKSI&nbsp;&nbsp;&nbsp;</center></td>
    </tr>
    @if (isset($prakerins))
        @foreach ($prakerins as $item)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item['tahun'] }}</td>
        <td style="text-align: center">{{ $item['nilai'] }}</td>
        <td style="text-align: center">{{ $item['mitra'] }}</td>
        <td>{{ $item['lokasi'] }}</td>
        <td></td>
        <td style="text-align: center">{{ $item['lama'] }}</td>
        <td style="text-align: center">{{ $item['ket'] }}</td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
        </tr>
        @endforeach
    @else
        
    <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    @endif
</table>
<br>
<strong><label>KEGIATAN EKSTRAKURIKULER</label></strong>
<table style="width: 50%" border="1">
    <tr>
        <td style="width: 1%">NO</td>
        <td style="width: 15%">TAHUN EKSTRAKURIKULER</td>
        <td style="width: 8%">NILAI</td>
        <td style="width: 25%"><center>KETERANGAN</center></td>
        <td style="width: 25%"><center>AKSI</center></td>
    </tr>
    @if (isset($eskul))
    @foreach ($eskul as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item['tahun']." - ".$item['kegiatan'] }}</td>
        <td>{{ $item['nilai'] }}</td>
        <td>{{ $item['ket'] }}</td>
        <td>&nbsp;</td>
    </tr>
    @endforeach
    @else
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    @endif
</table>
<br>
<strong><label>KEGIATAN PRESTASI</label></strong>
<table style="width: 50%" border="1">
    <tr>
        <td style="width: 1%">NO</td>
        <td style="width: 15%">TAHUN</td>
        <td style="width: 8%">PERINGKAT</td>
        <td style="width: 25%"><center>KETERANGAN</center></td>
        <td style="width: 25%"><center>AKSI</center></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
@endif
<footer></footer>
</body>
</html>