<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi Siswa</title>
    <style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding-left: 3px;
            padding-top: 8px;
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
    <h2 align="center" >DATA PRIBADI SISWA</h2>
    <table border="0" align="center" width="600px">
        <tr>
            <td width="20">1.</td>
            <td width="300">Nama Peserta Didik (Lengkap)</td>
            <td>:</td>
            <td>{{$data->siswa->nama_lengkap}}</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Nomor Induk Siswa Nasional</td>
            <td>:</td>
            <td>{{$data->siswa->nisn}}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{$data->siswa->tempat_lahir}}, {{$data->siswa->tanggal_lahir}}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{$data->siswa->jk}}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Agama</td>
            <td>:</td>
            <td>Islam</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Anak ke ...</td>
            <td>:</td>
            <td>{{$data->siswa->anak_ke}}</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Alamat Peserta Didik</td>
            <td>:</td>
            <td>{{$data->siswa->alamat}}</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Nomor Telepon Rumah</td>
            <td>:</td>
            <td>{{$data->siswa->no_hp}}</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Sekolah Asal</td>
            <td>:</td>
            <td>{{$data->siswa->sekolah_asal}}</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Diterima di Sekolah ini</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Kelas</td>
            <td>:</td>
            <td>(Sepuluh)</td>
        </tr>
        <tr>
            <td></td>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{$data->siswa->tahun}}</td>
        </tr>
        <tr>
            <td>11.</td>
            <td>Nama Orang Tua</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Ayah</td>
            <td>:</td>
            <td>{{$data->siswa->nama_ayah}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Ibu</td>
            <td>:</td>
            <td>{{$data->siswa->nama_ibu}}</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Alamat Orang Tua</td>
            <td>:</td>
            <td>{{$data->siswa->alamat}}</td>
        </tr>
        <tr>
            <td>13.</td>
            <td>Nomor Telepon Rumah</td>
            <td>:</td>
            <td>{{$data->siswa->no_hp}}</td>
        </tr>
        <tr>
            <td>14.</td>
            <td>Pekerjaan Orang Tua</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Ayah</td>
            <td>:</td>
            <td>{{$data->siswa->pekerjaan_ayah}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Ibu</td>
            <td>:</td>
            <td>{{$data->siswa->pekerjaan_ibu}}</td>
        </tr>
        <tr>
            <td>15.</td>
            <td>Nama Wali Peserta Didik</td>
            <td>:</td>
            <td>{{$data->siswa->nama_wali}}</td>
        </tr>
        <tr>
            <td>16.</td>
            <td>Alamat Wali Peserta Didik</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>17.</td>
            <td>Nomor Telepon Rumah</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>18.</td>
            <td>Pekerjaan Wali Peserta Didik</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
        <?php $ub=$data->siswa->pic; ?> <td colspan="3" align="center"><img src="{{ $ub == 'belum' ? asset('img/bg3x4.jpg') : url('/').Storage::url($data->siswa->pic)  }}" width="113px" height="151px" alt=""></td>
            <td>
            <p>Mengetahui : <p>
            <p> Kepala Sekolah,<p>
            <br>
            <br>
            <p><strong><u>{{env('KEPALA',null)}}</u></strong></p>
            <p><strong>NIP{{env('NIP',null)}}</strong></p>
            </td>
        </tr>
    </table>
    <footer></footer>
    @endforeach
</body>
</html>
<script>window.print()</script>
