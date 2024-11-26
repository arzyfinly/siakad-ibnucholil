<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Hasil Ujian</title>
    <style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding: 2px;
            }
    </style>
</head>
<body>
    <table align="center">
        <tr>
            <td align="center" style="font-size:20px"><b>SMK IBNU CHOLIL</b></td>
        </tr>
        <tr>
            <td align="center" style="font-size:25px"><b>ANALISIS HASIL BELAJAR</b></td>
        </tr>
        <tr>
            <td align="center" style="font-size:20px"><b>TAHUN AJARAN {{$mapel->tahun}}</b></td>
        </tr>
    </table>
    <table border="1" align="center">
    <tr>
        <td rowspan="4"><b>NAMA LENGKAP</b></td>
        @if($jumlah_ganda!=0)
        <td colspan="{{$jumlah_ganda}}" align="center"><b>NOMOR SOAL PILIHAN GANDA</b></td>
        @endif
        @if($jumlah_uraian!=0)
        <td colspan="{{$jumlah_uraian}}" align="center"><b>NOMOR SOAL URAIAN</b></td>
        @endif
        <td rowspan="4"><b>NILAI TOTAL</b></td>
    </tr>
    <tr>
        @php($no=1)
            @foreach($soal as $soals)
                @if($soals->tipe="GANDA")
                    <td align="center">{{$no}}</td>
                @elseif($soals->tipe="URAIAN")
                    <td align="center">{{$no}}</td>
                @endif
                @php($no++)
            @endforeach
        </tr>
        <tr>
        @if($jumlah_ganda!=0)
        <td colspan="{{$jumlah_ganda}}" align="center"><b>SKOR SOAL PILIHAN GANDA</b></td>
        @endif
        @if($jumlah_uraian!=0)
        <td colspan="{{$jumlah_uraian}}" align="center"><b>SKOR SOAL URAIAN</b></td>
        @endif
    </tr>
        <tr>
            @foreach($soal as $soals)
                @if($soals->tipe="GANDA")
                    <td align="center">{{$soals->skor}}</td>
                @elseif($soals->tipe="URAIAN")
                    <td align="center">{{$soals->skor}}</td>
                @endif
            @endforeach
        </tr>
    @foreach($nilai as $nilais)
        <tr>
        <td>{{$nilais->siswa->nama_lengkap}}</td>
        @php($total_nilai=0)
            @foreach($soal as $soals)
                @if($soals->tipe="GANDA")
                    <td align="center">@foreach($jawaban as $jawabans) 
                    @if($nilais->siswa_id==$jawabans->siswa_id&&$soals->id==$jawabans->soal_id)
                    {{$jawabans->skor}}
                    @php($total_nilai+=$jawabans->skor)
                    @endif
                    @endforeach
                    </td>
                @elseif($soals->tipe="URAIAN")
                <td align="center">@foreach($jawaban as $jawabans) 
                    @if($nilais->siswa_id==$jawabans->siswa_id&&$soals->id==$jawabans->soal_id)
                    {{$jawabans->skor}}
                    @php($total_nilai+=$jawabans->skor)
                    @endif
                    @endforeach
                    </td>
                @endif
            @endforeach
        <td align="center">{{$total_nilai}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>