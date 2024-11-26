<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Deskripsi</title>
    <style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding-left: 5px;
            }
    </style>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    <?php
    function tanggal_indo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    ?>
</head>
<body style="font-size:12px;">
<h1 align="center">CATATAN AKHIR SEMESTER</h1>
<table  border="0"  width="1000px" align="center">
@php($kelas="")
@php($alamat="Jl. Halmim Perdana Kusuma No. 09")
@php($jurusan="")
@php($nama="")
@php($nis="")
@php($nisn="")
@php($tahun="")
@foreach($data as $datas)
        @php($kelas=$datas->kelas->kelas)
        @php($nama=$datas->siswa->nama_lengkap)
        @php($nis=$datas->siswa->nis)
        @php($nisn=$datas->siswa->nisn)
        @php($tahun=$datas->tahun)
        @php($jurusan=$datas->kelas->jurusan->jurusan)
@endforeach
    <tr>
        <td>Nama Sekolah</td>
        <td >:</td>
        <td width="500px">{{env('NAMA_SEKOLAH',null)}}</td>
        <td>Kelas</td>
        <td >:</td>
        <td width="200px">{{$kelas}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td >:</td>
        <td width="500px">{{env('ALAMAT',null)}}</td>
        <td>Prog. Keahlian</td>
        <td >:</td>
        <td width="200px">{{$jurusan}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td >:</td>
        <td width="500px">{{$nama}}</td>
        <td>Semester</td>
        <td >:</td>
        <td width="200px">{{$semester}}</td>
    </tr>
    <tr>
        <td>NIS / NISN</td>
        <td >:</td>
        <td width="500px">{{$nis}} / {{$nisn}}</td>
        <td>Tahun Ajaran</td>
        <td >:</td>
        <td width="200px">{{$tahun}}</td>
    </tr>
</table>
<table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>1. Kegiatan Belajar di Dunia Usaha/Industri dan Instansi Relevan:</h3>
            <br>
        </td>
    </tr>
</table>
    <table border="1" width="1000" align="center">
    <thead>
        <th>No</th>
        <th>Mitra DU / DI</th>
        <th>Lokasi</th>
        <th width="50">Lamanya (Bulan)</th>
        <th>Nilai</th>
        <th>Predikat</th>
        <th>Keterangan</th>
    </thead>
    @php($no=1)
    @foreach($data as $datas)
        @foreach($datas->prakerin as $prakerin)
        <tr>
            <td align="center">{{$no}}.</td>
            <td>{{$prakerin->mitra}}</td>
            <td>{{$prakerin->lokasi}}</td>
            <td align="center">{{$prakerin->lama}}</td>
            <td align="center">{{$prakerin->nilai}}</td>
            <td align="center">@php($nilai=$prakerin->nilai)
                @if($nilai<=50)
                D
                @elseif($nilai>=51&&$nilai<=70)
                C
                @elseif($nilai>=71&&$nilai<=90)
                B
                @elseif($nilai>=91&&$nilai<=100)
                A
                @endif</td>
            <td>{{$prakerin->ket}}</td>
        </tr>
            @php($no++)
        @endforeach
    @endforeach
        <tr>
            <td align="center">{{$no}}.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>2. Pengembangan Diri dan Kepribadian</h3>
            <br>
        </td>
    </tr>
</table>
    <table border="1" width="1000" align="center">
    <thead>
        <th>No</th>
        <th>Kegiatan Ekstrakurikuler</th>
        <th>Nilai</th>
        <th>Predikat</th>
        <th>Keterangan</th>
    </thead>
    @php($no=1)
    @foreach($data as $datas)
        @foreach($datas->eskul as $eskul)
        <tr>
            <td align="center">{{$no}}.</td>
            <td>{{$eskul->kegiatan}}</td>
            <td align="center">{{$eskul->nilai}}</td>
            <td align="center">@php($nilai=$eskul->nilai)
                @if($nilai<=50)
                D
                @elseif($nilai>=51&&$nilai<=70)
                C
                @elseif($nilai>=71&&$nilai<=90)
                B
                @elseif($nilai>=91&&$nilai<=100)
                A
                @endif</td>
            <td>{{$eskul->ket}}</td>
        </tr>
            @php($no++)
        @endforeach
    @endforeach
        <tr>
            <td align="center">{{$no}}.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
<table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>3. Prestasi</h3>
            <br>
        </td>
    </tr>
</table>
    <table border="1" width="1000" align="center">
    <thead>
        <th>No</th>
        <th>Jenis Prestasi</th>
        <th>Keterangan</th>
    </thead>
    @php($no=1)
    @foreach($data as $datas)
        @foreach($datas->prestasi as $prestasi)
        <tr>
            <td align="center">{{$no}}.</td>
            <td>{{$prestasi->jenis_prestasi}}</td>
            <td>{{$prestasi->ket}}</td>
        </tr>
            @php($no++)
        @endforeach
    @endforeach
        <tr>
            <td align="center">{{$no}}.</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>4. Ketidakhadiran</h3>
            <br>
        </td>
    </tr>
    </table>
    <table border="1" width="1000" align="center">
    <thead>
        <th>No</th>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Tanpa Keterangan</th>
    </thead>
    @php($no=1)
    @php($sakit=0)
    @php($izin=0)
    @php($alpha=0)
    @foreach($absen as $absens)
        @foreach($absens->nilai_sikap as $ab)
        @php($sakit+=$ab->sakit)
        @php($izin+=$ab->izin)
        @php($alpha+=$ab->alpha)
        @endforeach
    @endforeach
        <tr>
            <td align="center">{{$no}}.</td>
            <td align="center">{{$sakit}} Mapel</td>
            <td align="center">{{$izin}} Mapel</td>
            <td align="center">{{$alpha}} Mapel</td>
        </tr>
       
    </table>
    <table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>5. Catatan untuk perhatian orang tua/wali</h3>
            <br>
        </td>
    </tr>
    </table>
    <table border="1" width="1000" align="center">
        <tr>
            <td height="100"> 
            @foreach($data1 as $datas)
                @foreach($datas->kelas->mapel as $kelompok)
                    @if($kelompok->nama_mapel=="PENDIDIKAN AGAMA DAN BUDI PEKERTI" || $kelompok->nama_mapel=="PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN")
                    @else
                    @foreach($kelompok->nilai_sikap as $sikap)
                        @if($sikap->deskripsi!="")
                        {!!$sikap->deskripsi!!},
                        @endif
                        @endforeach 
                    @endif

                @endforeach
            @endforeach
        </td>
        </tr>
           

    </table>
    <table border="0" width="1000" align="center">
    <tr>
        <td>
            <h3>6. Tanggapan Orang Tua/Wali</h3>
            <br>
        </td>
    </tr>
    </table>
    <table border="1" width="1000" align="center">
        <tr>
            <td height="100"></td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" width="1000" align="center">
        <tr align="center">
            <td width="300">Mengetahui</td>
            <td width="400"></td>
            <td width="300">{{env('TTD',null)}}, {{tanggal_indo($date)}}</td>
        </tr>
        <tr align="center">
            <td width="300">Orang Tua / Wali</td>
            <td width="400"></td>
            <td width="300">Wali Kelas</td>
        </tr>
        <tr align="center">
            <td width="300"><br><br><br><br><br><br><br></td>
            <td width="400"></td>
            <td width="300"></td>
        </tr>
        <tr align="center">
            <td width="300"><b><u>{{$siswa->nama_ayah}}</u></b></td>
            <td width="400"></td>
            <td width="300">
            @foreach($data as $datas)
                   <b><u>{{$datas->kelas->guru->nama_lengkap}}</u></b>
            @endforeach
            </td>
        </tr>
        <tr align="center">
            <td width="300"></td>
            <td width="400">Kepala Sekolah</td>
            <td width="300"></td>
        </tr>
        <tr align="center">
            <td width="300"></td>
            <td width="400"><br><br><br><br><br><br><br></td>
            <td width="300"></td>
        </tr>
        <tr align="center">
            <td width="300"></td>
            <td width="400"><b><u>{{env('KEPALA',null)}}</u></b></td>
            <td width="300"></td>
        </tr>
    </table>
</body>
</html>
<script>window.print()</script>