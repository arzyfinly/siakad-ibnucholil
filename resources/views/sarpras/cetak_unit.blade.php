<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit</title>
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
</head>
<body>
    <table align="center" width="800">
        <tr>
            <td  rowspan="8" width="200" align="center" ><img src="{{asset('img/logo.png')}}" alt="" width="100"></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><b style="font-size:16px;">YAYASAN IBNU CHOLIL BANGKALAN</b></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><b style="font-size:16px;">PONDOK PESANTREN IBNU COLIL</b></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><b style="font-size:20px;">SEKOLAH MENENGAH KEJURUAN</b></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><b style="font-size:20px;">SMKS IBNU CHOLIL</b></td>
        </tr>
        <tr>
            <td></td>
            <td align="center" style="font-size:12px;">Jalan Halim Perdana Kusuma No. 9 (Ring Road), Kelurahan Mlajah, Kecamatan Bangkalan</td>
        </tr>
        <tr>
            <td></td>
            <td align="center" style="font-size:12px;">Telp. (031)51994337, 082335379738, 08564552920, 081931031030</td>
        </tr>
        <tr>
            <td></td>
            <td align="center" style="font-size:12px;">NPSN : 20573284, NSS : 322052901006, NIS : 320106</td>
        </tr>
        <tr>
        <td colspan="3"><hr style="border: 2px solid black;"></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b style="font-size:19px;"><u>INVENTARIS BARANG</u></b></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b style="font-size:19px;">Jurusan : {{$data->inventaris_barang}}</b></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><br><br><br></td>
        </tr>
    </table>
            <table align="center" width="800">
                <tr>
                    <td width="400" valign="top">
                    <table>
                        <tr>
                            <td width="150">Nomor Barang</td>
                            <td>:</td>
                            <td>{{$data->nomor_barang}}</td>
                        </tr>
                        <tr>
                            <td>Letak Barang</td>
                            <td>:</td>
                            <td>{{$data->letak}}</td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>:</td>
                            <td>{{$data->nama_barang}}</td>
                        </tr>
                        <tr>
                            <td>Merek </td>
                            <td>:</td>
                            <td>{{$data->merek}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah </td>
                            <td>:</td>
                            <td>{{$data->jumlah}}</td>
                        </tr>
                    </table>
                    </td>
                    <td width="400">
                    <table>
                        <tr>
                            <td  width="150">Tanggal Perolehan</td>
                            <td>:</td>
                            <td>{{$data->tahun}}</td>
                        </tr>
                        <tr>
                            <td>Anggaran Dari</td>
                            <td>:</td>
                            <td>{{$data->anggaran}}</td>
                        </tr>
                        <tr>
                            <td>Nominal / Harga</td>
                            <td>:</td>
                            <td>{{$data->nominal}}</td>
                        </tr>
                        <tr>
                            <td>Spesifikasi</td>
                            <td>:</td>
                            <td>{{$data->spesifikasi}}</td>
                        </tr>
                        <tr>
                            <td>Fungsi</td>
                            <td>:</td>
                            <td>{{$data->fungsi}}</td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>
            <table align="center">
                <tr>
                    <td><br><br></td>
                </tr>
                <tr>
                    <td><img src="{{url('/')}}{{Storage::url($data->pic)}}" alt="" width="500"></td>
                </tr>
            </table>
    <table style="font-size:12px;" border="1" align="center">
            <thead>
                <th width="50">No.</th>
                <th width="150">Tanggal</th>
                <th width="400">KETERANGAN</th>
                <th width="150">NOMINAL</th>
                <th width="100">TTD PENANGGUNG JAWAB</th>
                <th width="100">TTD WAKA SARPRAS</th>
            </thead>
            <tbody>
            @php($no=1)
            @foreach($data->perawatan as $datas)
                <tr align="center">
                    <td>{{$no}}</td>
                    <td>{{$datas->tanggal}}</td>
                    <td>{{$datas->ket}}</td>
                    <td>{{$datas->nominal}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @php($no++)
            @endforeach
</body>
</html>