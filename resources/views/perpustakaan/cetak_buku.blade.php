<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <title>Cetak Buku {{$start}} - {{$end}}</title>
    <style>
        @media print {
            .pagebreak { page-break-before: always; } /* page-break-after works, as well */
        }
        .box{
            float: left;
            width:150px;
            height:300px;
            border-style: solid;
            border-width: 1px;
        }
        body {
  font-family: Arial, Helvetica, sans-serif;
}
    </style>
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
  <body>
    <table  border="0" align="center">
        <tr>
            <td rowspan="6"><img src="{{asset('img/logo.png')}}" alt="" width="120"></td>
        </tr>
        <tr>
            <td > <strong> PEMERINTAH KABUPATEN {{env('KABUPATEN',null)}}</strong></td>
        </tr>
        <tr>
            <td><strong>DINAS PENDIDIKAN</strong></td>
        </tr>
        <tr>
            <td><strong>SEKOLAH MENENGAH KEJURUAN SWASTA</strong></td>
        </tr>
        <tr>
            <td><strong>{{env('NAMA_SEKOLAH',null)}}</strong></td>
        </tr>
        <tr>
            <td>{{env('ALAMAT',null)}}</td>
        </tr>
        <tr>
            <td colspan="3"><hr style="border: 2px solid black;"></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><strong>Data Buku Mulai Tanggal {{tanggal_indo($start)}} Sampai {{tanggal_indo($end)}} </strong></td>
        </tr>
    </table>
    <table  border="1">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th width="100">Tanggal Terima</th>
            <th>No. Klasifikasi</th>
            <th>Pengarang</th>
            <th>Perolehan</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Jumlah Buku</th>
        </thead>
        <tbody>
            @php($no=1)
            @foreach($data as $datas)
            <tr>
                <td align="center">{{$no}}</td>
                <td>{{$datas->judul}}</td>
                <td align="center">{{$datas->tanggal_terima}}</td>
                <td align="center">{{$datas->no_klasifikasi}}</td>
                <td>{{$datas->pengarang}}</td>
                <td>{{$datas->perolehan}}</td>
                <td>{{$datas->penerbit}}</td>
                <td align="center">{{$datas->tahun_terbit}}</td>
                <td align="center">{{$datas->jumlah_halaman}}</td>
                <td align="center">{{$datas->jumlah_buku}}</td>
            </tr>
            @php($no++)
            @endforeach
        </tbody>
    </table>
  </body>
</html>