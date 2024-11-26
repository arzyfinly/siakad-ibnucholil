<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampul Raport</title>
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
        @page { size: portrait; }
    </style>
</head>
<body>
    <h1 align="center"><img src="{{asset('img/tut.png')}}" alt="" width="150"></h1>
    <h1 align="center">LAPORAN</h1>
    <br>
    <h2 align="center">PENCAPAIAN KOMPETENSI PESERTA DIDIK</h2>
    <h2 align="center">SEKOLAH MENENGAH KEJURUAN</h2>
    <h2 align="center">{{env('NAMA_SEKOLAH',null)}}</h2>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h4 align="center">Nama Peserta Didik</h4>
    <h2 align="center"><u>{{$data->nama_lengkap}}</u></h2>
    <h3 align="center">{{$data->nis}} / {{$data->nisn}}</h3>
    <br>
    <br>
    <h2 align="center">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h2>
    <h2 align="center">REPUBLIK INDONESIA</h2>
    <h2 align="center">{{substr($data->tahun,0,4)}}</h2>
</body>
</html>
<script>window.print()</script>