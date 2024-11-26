<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
    <style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding-left: 3px;
            padding-top: 20px;
            }
    </style>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    <style>
    @media print {
                    footer {page-break-after: always;}
                }
    </style>
</head>
<body>
@foreach($data as $data)
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
    <table border="0" align="center" width="600px">
        <tr>
            <td width="250px">Nama Sekolah</td>
            <td>:</td>
            <td>{{env('NAMA_SEKOLAH',null)}}</td>
        </tr>
        <tr>
            <td>NPSN / NSS</td>
            <td>:</td>
            <td>{{env('NISS',null)}}</td>
        </tr>
        <tr>
            <td>Alamat Sekolah</td>
            <td>:</td>
            <td>{{env('ALAMAT',null)}}</td>
        </tr>
        <tr>
            <td>Kelurahan / Desa</td>
            <td>:</td>
            <td>{{env('KELURAHAN',null)}}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{env('KECAMATAN',null)}}</td>
        </tr>
        <tr>
            <td>Kabupaten / Kota</td>
            <td>:</td>
            <td>{{env('KABUPATEN',null)}}</td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{env('PROVINSI',null)}}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{env('WEBSITE',null)}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{env('EMAIL',null)}}</td>
        </tr>
        
    </table>
    <footer></footer>
    @endforeach
</body>
</html>
<script>window.print()</script>