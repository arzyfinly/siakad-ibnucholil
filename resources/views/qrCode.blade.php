<!DOCTYPE html>
<html>
<head>
    <title>{{$data->nomor_barang}}</title>
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
    
<div class="visible-print text-center">
    @for ($i = 0; $i < 12; $i++) 
        <table border="1" align="left">
            <tr>
                <td rowspan="3" align="center">{!! QrCode::size(100)->generate($data->nomor_barang); !!}</td>
            </tr>
            <tr>
                <td width="200" align="center"><b>{{env('NAMA_SEKOLAH',null)}}</b></td>
                
            </tr>
            <tr>
                <td align="center">{{$data->nama_barang}}</td>
            </tr>
            <tr>
                <td colspan="2">{{$data->ruangan->nama_ruang}}</td>
            </tr>
            <tr>
                <td>No. Barang &nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $data->nomor_barang }}</td>
            </tr>
            <tr>
                <td>Nominal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ "Rp. " . number_format($data->nominal,2,',','.') }}</td>
            </tr>
        </table>
    @endfor


</div>
    
</body>
<script>window.print()</script>
</html>
