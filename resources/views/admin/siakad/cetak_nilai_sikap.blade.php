<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Pengetahuan</title>
    <style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding-left: 2px;
            }
    </style>
     <style type="text/css" media="print">
        @page { 
            size: A3 landscape;
            margin: 1%;
         }
    </style>
</head>
<body style="font-size:12px;">  

<table  border="0" align="center">
    <tr>
        <td rowspan="6"><img src="{{asset('img/logo.png')}}" alt="" width="120"></td>
    </tr>
    <tr>
        <td > <strong> PEMERINTAH KABUPATEN {{env('KABUPATEN',null)}}</strong></td>
        <td align="right" width="450"> <strong> DAFTAR NILAI SIKAP SISWA</strong></td>
        
    </tr>
    <tr>
        <td><strong>DINAS PENDIDIKAN</strong></td>
        <td align="right"> <strong> Tahun Pelajaran {{$mapel->tahun}}</strong></td>
        

    </tr>
    <tr>
        <td><strong>SEKOLAH MENENGAH KEJURUAN SWASTA</strong></td>
        <td align="right"> <strong> SEMESTER {{$mapel->semester}}</strong></td>
    </tr>
    <tr>
        <td><strong>{{env('NAMA_SEKOLAH',null)}}</strong></td>
        <td align="right"> <strong>{{$mapel->nama_mapel}}</strong></td>
    </tr>
    <tr>
        <td>{{env('ALAMAT',null)}}</td>
        <td align="right"> 
            <table> 
                <tr>
                    <td width="100"><strong>KKM : {{$mapel->ket}} </strong></td>
                    <td><strong> {{$kelas->kelas}} </strong></td>
                </tr>
            </table>
        </td>
        
    </tr>

    <tr>
        <td colspan="3"><hr style="border: 2px solid black;"></td>
       
    </tr>
</table>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="30" >No</th>
                <th width="150">NIS</th>
                <th width="200">NAMA SISWA</th>
                <th width="50" >L/P</th>
                <th width="50">Nilai</th>
                <th width="50">Prdikat</th>
                <th width="350" >Deskripsi</th>
                <th width="50" >Alpha</th>
                <th width="50" >Izin</th>
                <th width="50" >Sakit</th>
            </tr>
        </thead>
        <tbody>
        @php($a=1)
        @foreach($data as $datas)
            <tr align="center">
                <td>{{$a}}</td>
                <td>{{$datas->siswa->nis}}</td>
                <td align="left">{{$datas->siswa->nama_lengkap}}</td>
                <td>{{$datas->siswa->jk}}</td>
                <td>
                @php($nilai=$datas->sikap)
                {{$nilai}}
                </td>
                <td>
                @if($nilai >= 85)
                A
                @elseif($nilai < 85 && $nilai >= 70)
                B
                @elseif($nilai < 70 && $nilai >= 55)
                C
                @else
                D
                @endif
                </td>
                <td>{!!$datas->deskripsi!!}</td>
                <td>{{$datas->alpha}}</td>
                <td>{{$datas->izin}}</td>
                <td>{{$datas->sakit}}</td>
            </tr>
            @php($a++)
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table align="center">
        <tr>
            <td width="100" ></td>
            <td>Mengetahui :</td>
            <td width="500"></td>
            <td>{{env('TTD',null)}}, ............/............./..............</td>
        </tr>
        <tr>
            <td width="100" ></td>
            <td>Kepala Sekolah {{env('NAMA_SEKOLAH',null)}}</td>
            <td></td>
            <td>Guru Mata Pelajaran</td>
        </tr>
        <tr>
            <td width="100" ></td>
            <td><br><br><br><br><strong>{{env('KEPALA',null)}}</strong></td>
            <td></td>
            <td><br><br><br><br><strong>{{$mapel->guru->nama_lengkap}}</strong></td>
        </tr>
        <tr>
            <td width="100" ></td>
            <td>NIP.</td>
            <td></td>
            <td>NIP.</td>
        </tr>
    </table>

</body>
</html>
<script>window.print()</script>