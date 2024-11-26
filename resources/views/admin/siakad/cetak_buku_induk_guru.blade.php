<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Induk Guru SMKS Ibnu Cholil</title>
    <style>
    @media print {
  footer {page-break-after: always;}
}
    </style>
</head>
<body style=" margin-left: 113px;  font-family: Verdana,Arial,Helvetica,Georgia; font-size: 14px;">
    @foreach($data as $datas)
    </br>
    </br>
    </br>
    </br>
        <H3 align="center">LEMBAR BUKU INDUK GURU</H3>
        <p align="center">Nomor Induk : {{$datas->nip}}</p>

<table align="top">
    <tr>
        <td width="44%" valign="top">
            <table>
                <tr>
                    <td><p><b>A. KETERANGAN TENTANG GURU </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="190">Nama Lengkap</td>
                    <td>:</td>
                    <td>{{$datas->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{$datas->jk}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td>:</td>
                    <td>{{$datas->kk}}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{$datas->nik}}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{$datas->tempat_lahir}}, {{$datas->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{$datas->agama}}</td>
                </tr>
                <tr>
                    <td>Alamat / Jalan</td>
                    <td>:</td>
                    <td>{{$datas->alamat}}</td>
                </tr>
                <tr>
                    <td>Desa / Kelurahan</td>
                    <td>:</td>
                    <td>{{$datas->desa}}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>{{$datas->kecamatan}}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>{{$datas->kabupaten}}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>{{$datas->provinsi}}</td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td>{{$datas->kode_pos}}</td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>:</td>
                    <td>{{$datas->no_hp}}</td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td>{{$datas->email}}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>B. KETERANGAN PENDIDIKAN </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td width="195">Nama Sekolah SD </td>
                    <td>:</td>
                    <td>{{$datas->nama_sd}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Masuk SD </td>
                    <td>:</td>
                    <td>{{$datas->tahun_masuk_sd}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Lulus SD </td>
                    <td>:</td>
                    <td>{{$datas->tahun_lulus_sd}}</td>
                </tr>
                <tr>
                    <td width="195">Nama Sekolah SMP </td>
                    <td>:</td>
                    <td>{{$datas->nama_smp}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Masuk SMP </td>
                    <td>:</td>
                    <td>{{$datas->tahun_masuk_smp}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Lulus SMP </td>
                    <td>:</td>
                    <td>{{$datas->tahun_lulus_smp}}</td>
                </tr>
                <tr>
                    <td width="195">Nama Sekolah SMA </td>
                    <td>:</td>
                    <td>{{$datas->nama_sma}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Masuk SMA </td>
                    <td>:</td>
                    <td>{{$datas->tahun_masuk_sma}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Lulus SMA </td>
                    <td>:</td>
                    <td>{{$datas->tahun_lulus_sma}}</td>
                </tr>
                <tr>
                    <td width="195">Nama S-1 </td>
                    <td>:</td>
                    <td>{{$datas->nama_s1}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Masuk S-1 </td>
                    <td>:</td>
                    <td>{{$datas->tahun_masuk_s1}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Lulus S-1 </td>
                    <td>:</td>
                    <td>{{$datas->tahun_lulus_s1}}</td>
                </tr>
                <tr>
                    <td width="195">Nama S-2 </td>
                    <td>:</td>
                    <td>{{$datas->nama_s2}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Masuk S-2 </td>
                    <td>:</td>
                    <td>{{$datas->tahun_masuk_s2}}</td>
                </tr>
                <tr>
                    <td width="195">Tahun Lulus S-2 </td>
                    <td>:</td>
                    <td>{{$datas->tahun_lulus_s2}}</td>
                </tr>
            </table>
            
        </td>

        <td width="44%" valign="top">
        <table>
                <tr>
                    <td><p><b>C. DATA LAIN </b></p></td>
                </tr>
            </table>
            <table>
                
                <tr>
                    <td width="190">Nama Ibu</td>
                    <td>:</td>
                    <td>{{$datas->nama_ibu}}</td>
                </tr> 
                <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td>{{$datas->sp}}</td>
                </tr>
                <tr>
                    <td>Nama Suami / Istri</td>
                    <td>:</td>
                    <td>{{$datas->nama_pasangan}}</td>
                </tr> 
                <tr>
                    <td>Jumlah Anak</td>
                    <td>:</td>
                    <td>{{$datas->jumlah_anak}}</td>
                </tr> 
                <tr>
                    <td>BANK</td>
                    <td>:</td>
                    <td>{{$datas->nama_bank}}</td>
                </tr> 
                <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td>{{$datas->no_rek}}</td>
                </tr> 
                <tr>
                    <td>Atas Nama</td>
                    <td>:</td>
                    <td>{{$datas->an}}</td>
                </tr> 
                <tr>
                    <td></td>
                    <td>:</td>
                    <td></td>
                </tr> 
            </table>
        <table>
                <tr>
                    <td><p><b>D. KETERANGAN PEGAWAI </b></p></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>NUPTK</td>
                    <td>:</td>
                    <td>{{$datas->nuptk}}</td>
                </tr>
                <tr>
                    <td width="190">NIP</td>
                    <td>:</td>
                    <td>{{$datas->nip}}</td>
                </tr> 
                <tr>
                    <td>Status Kepegawaian</td>
                    <td>:</td>
                    <td>{{$datas->sk}}</td>
                </tr>
                <tr>
                    <td>Jenis PTK</td>
                    <td>:</td>
                    <td>{{$datas->jenis_ptk}}</td>
                </tr> 
                <tr>
                    <td>Lembaga Pengangkatan</td>
                    <td>:</td>
                    <td>{{$datas->lembaga_pengangkatan}}</td>
                </tr> 
                <tr>
                    <td>Sumber Gaji</td>
                    <td>:</td>
                    <td>{{$datas->sumber_gaji}}</td>
                </tr> 
                <tr>
                    <td>Tugas Tambahan</td>
                    <td>:</td>
                    <td>{{$datas->tugas_tambahan}}</td>
                </tr>
                <tr>
                    <td valign="top">SK </td>
                    <td valign="top">:</td>
                        <td>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br>.....................................................
                    <br><br></td>
                </tr> 
                
            </table>
            
        </td>
        <td width="10%" valign="top">
            <table>
                <tr>
                    <td align="center"><p><b>Foto Guru</b></p></td>
                </tr>
                <tr>
                <?php $ub=$datas->pic; ?>
                    <td align="center"><img src="{{ $ub == 'belum' ? asset('img/bg3x4.jpg') : url('/').Storage::url($datas->pic)  }}" width="113px" height="151px" alt=""></td>
                </tr>
            </table>
           
        </td>
    </tr>
</table>
<footer></footer>
    @endforeach
</body>
</html>