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
    <table align="center">
        <tr >
            <td  rowspan="8"><img src="{{asset('img/logo.png')}}" alt="" width="100"></td>
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
            <td align="center" style="font-size:12px;">Telp. (031)99301370, 081931031030, 082330121039, 085855679070</td>
        </tr>
        <tr>
            <td></td>
            <td align="center" style="font-size:12px;">NPSN : 20573284, NSS : 322052901006, NIS : 320106</td>
        </tr>
        <tr>
        <td colspan="3"><hr style="border: 2px solid black;"></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b style="font-size:12px;">{{ $ruangan_atas->ruangan->nama_ruang }}</b></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b style="font-size:12px;">SMKS IBNU CHOLIL</b></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b style="font-size:12px;">Tahun {{date('Y')}}</b></td>
        </tr>
    </table>

    <table style="font-size:12px;" border="1">
            <thead>
                <th>No.</th>
                <th>INVENTARIS BARANG</th>
                <th>NOMOR BARANG</th>
                <th>LETAK BARANG</th>
                <th>NAMA BARANG</th>
                <th>MEREK</th>
                <th>TANGGAL PEROLEHAN</th>
                <th>ANGGARAN DARI</th>
                <th>NOMINAL</th>
                <th>JUMLAH BARANG</th>
                <th>SPESIFIKASI</th>
                <th>FUNGSI</th>
                <th>FOTO</th>
                <th>QR</th>
            </thead>
            <tbody>
            @php($no=1)
            @foreach($data as $datas)
                <tr align="center">
                    <td>{{$no}}</td>
                    <td>{{$datas->inventaris_barang}}</td>
                    <td>{{$datas->nomor_barang}}</td>
                    <td>{{$datas->ruangan->nama_ruang}}</td>
                    <td>{{$datas->nama_barang}}</td>
                    <td>{{$datas->merek}}</td>
                    <td>{{$datas->tahun}}</td>
                    <td>{{$datas->anggaran}}</td>
                    <td>{{$datas->nominal}}</td>
                    <td>{{$datas->jumlah}}</td>
                    <td>{{$datas->spesifikasi}}</td>
                    <td>{{$datas->fungsi}}</td>
                    <td><img src="{{url('/')}}{{Storage::url($datas->pic)}}" alt="" width="100"></td>
                    <td>{!! QrCode::size(100)->generate($datas->nomor_barang); !!}</td>
                </tr>
                @php($no++)
            @endforeach
           
            <table>
                    <tr>
                        <td width="400" ></td>
                        <td></td>
                        <td width="400"></td>
                        <td><br>{{env('TTD',null)}},............/............./..............</td>
                    </tr>
                    <tr>
                        <td width="100" ></td>
                        <td></td>
                        <td></td>
                        <td>Waka Sarana dan Prasarana</td>
                    </tr>
                    <tr>
                        <td width="100" ></td>
                        <td><br><br><br><br><strong></strong></td>
                        <td></td>
                        <td><br><br><br><br><strong>{{env('WAKASARPRAS',null)}}</strong></td>
                    </tr>
                </table>
            </tbody>
    </table>
</body>
</html>