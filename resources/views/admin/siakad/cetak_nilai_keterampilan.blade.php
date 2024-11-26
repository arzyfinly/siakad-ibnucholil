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
            margin: 5%;
         }
    </style>
</head>
<body style="font-size:12px;">
                @php($kdm[1]='')
                @php($kdm[2]='')
                @php($kdm[3]='')
                @php($kdm[4]='')
                @php($kdm[5]='')
                @php($kdm[6]='')
                @php($nokd[1]='')
                @php($nokd[2]='')
                @php($nokd[3]='')
                @php($nokd[4]='')
                @php($nokd[5]='')
                @php($nokd[6]='')
                @php($a=1)
                @foreach($kd_mapel as $kd_mapel)
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endforeach
<table  border="0">
    <tr>
        <td colspan="3"></td>
        <td width="30" align="center"> <strong> KD</strong></td>
        <td width="265" align="center"> <strong>Kompentensi Dasar</strong></td>
    </tr>
    <tr>
        <td rowspan="6"><img src="{{asset('img/logo.png')}}" alt="" width="100"></td>
    </tr>
    <tr>
        <td > <strong> PEMERINTAH KABUPATEN {{env('KABUPATEN',null)}}</strong></td>
        <td align="right" width="400"> <strong> DAFTAR NILAI KETERAMPILAN SISWA</strong></td>
        <td width="30" align="center"> <strong>{{$nokd[1]}}</strong></td>
        <td>{{$kdm[1]}}</td>
    </tr>
    <tr>
        <td><strong>DINAS PENDIDIKAN</strong></td>
        <td align="right"> <strong> Tahun Pelajaran {{$mapel->tahun}}</strong></td>
        <td width="30" align="center"> <strong> {{$nokd[2]}}</strong></td>
        <td>{{$kdm[2]}}</td>

    </tr>
    <tr>
        <td><strong>SEKOLAH MENENGAH KEJURUAN SWASTA</strong></td>
        <td align="right"> <strong> SEMESTER {{$mapel->semester}}</strong></td>
        <td width="30" align="center"> <strong> {{$nokd[3]}}</strong></td>
        <td>{{$kdm[3]}}</td>
    </tr>
    <tr>
        <td><strong>{{env('NAMA_SEKOLAH',null)}}</strong></td>
        <td align="right"> <strong>{{$mapel->nama_mapel}}</strong></td>
        <td width="30" align="center"> <strong> {{$nokd[4]}}</strong></td>
        <td>{{$kdm[4]}}</td>
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
        <td width="30" align="center"> <strong>{{$nokd[5]}}</strong></td>
        <td>{{$kdm[5]}}</td>
    </tr>

    <tr>
        <td colspan="3"><hr style="border: 2px solid black;"></td>
        <td width="30" align="center"> <strong>{{$nokd[6]}}</strong></td>
        <td>{{$kdm[6]}}</td>
    </tr>
</table>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="3" width="30" >No</th>
                <th rowspan="3" width="150">NIS</th>
                <th rowspan="3" width="200">NAMA SISWA</th>
                <th rowspan="3" width="50" >L/P</th>
                <th colspan="22">Nilai</th>
                <th rowspan="3">Prdikat</th>
                <th rowspan="3" width="50" >Ket</th>
                <th rowspan="3" width="30" ></th>
                <th rowspan="3" width="350" >Deskripsi</th>
            </tr>
            <tr>
                <th colspan="7">Praktik</th>
                <th colspan="7">Portofolio</th>
                <th colspan="7">Proyek</th>
                <th rowspan="2" width="30">Skor Akhir</th>
            </tr>
            <tr>
                <th width="30">1</th>
                <th width="30">2</th>
                <th width="30">3</th>
                <th width="30">4</th>
                <th width="30">5</th>
                <th width="30">6</th>
                <th width="30">RT</th>
                <th width="30">1</th>
                <th width="30">2</th>
                <th width="30">3</th>
                <th width="30">4</th>
                <th width="30">5</th>
                <th width="30">6</th>
                <th width="30">RT</th>
                <th width="30">1</th>
                <th width="30">2</th>
                <th width="30">3</th>
                <th width="30">4</th>
                <th width="30">5</th>
                <th width="30">6</th>
                <th width="30">RT</th>
            </tr>
        </thead>
        <tbody>
        @php($no=1)
        @foreach($data as $datas)
            @php($praktik=0)
            @php($portofolio=0)
            @php($proyek=0)
            <tr align="center">
                <td>{{$no}}</td>
                <td>{{$datas->siswa->nis}}</td>
                <td align="left">{{$datas->siswa->nama_lengkap}}</td>
                <td>{{$datas->siswa->jk}}</td>
                <td>{{$datas->praktik1}}</td>
                <td>{{$datas->praktik2}}</td>
                <td>{{$datas->praktik3}}</td>
                <td>{{$datas->praktik4}}</td>
                <td>{{$datas->praktik5}}</td>
                <td>{{$datas->praktik6}}</td>
                <td>
                @php($array=array($datas->praktik6,$datas->praktik5,$datas->praktik4,$datas->praktik3,$datas->praktik2,$datas->praktik1))
                @php($array = array_filter($array))
                @if($array)
                    @php($praktik= array_sum($array) / count($array))
                    {{number_format($praktik, 1, ',', ' ')}}
                @endif
                </td>
                <td>{{$datas->portofolio1}}</td>
                <td>{{$datas->portofolio2}}</td>
                <td>{{$datas->portofolio3}}</td>
                <td>{{$datas->portofolio4}}</td>
                <td>{{$datas->portofolio5}}</td>
                <td>{{$datas->portofolio6}}</td>
                <td>
                @php($array_portofolio=array($datas->portofolio6,$datas->portofolio5,$datas->portofolio4,$datas->portofolio3,$datas->portofolio2,$datas->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                {{number_format($portofolio, 1, ',', ' ')}}
                @endif
                </td>
                <td>{{$datas->proyek1}}</td>
                <td>{{$datas->proyek2}}</td>
                <td>{{$datas->proyek3}}</td>
                <td>{{$datas->proyek4}}</td>
                <td>{{$datas->proyek5}}</td>
                <td>{{$datas->proyek6}}</td>
                <td>
                @php($array_proyek=array($datas->proyek6,$datas->proyek5,$datas->proyek4,$datas->proyek3,$datas->proyek2,$datas->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                {{number_format($proyek, 1, ',', ' ')}}
                @endif
                </td>
                <td>
                @php($total=($praktik+$portofolio+$proyek)/3)
                {{number_format($total, 1, ',', ' ')}}
                </td>
                <td>
                @php($kkm=$mapel->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<=$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td>-</td>
                <td></td>
                <td align="left">
                
                @php($kd1=$datas->praktik1+$datas->portofolio1+$datas->proyek1)
                @php($kd2=$datas->praktik2+$datas->portofolio2+$datas->proyek2)
                @php($kd3=$datas->praktik3+$datas->portofolio3+$datas->proyek3)
                @php($kd4=$datas->praktik4+$datas->portofolio4+$datas->proyek4)
                @php($kd5=$datas->praktik5+$datas->portofolio5+$datas->proyek5)
                @php($kd6=$datas->praktik6+$datas->portofolio6+$datas->proyek6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max(array_filter($array_kd)))
                    @php($rendah=min(array_filter($array_kd)))
                    @if($tinggi==$kd1)
                        Kompeten pada {{$kdm[1]}}
                    @elseif($tinggi==$kd2)
                        Kompeten pada {{$kdm[2]}}
                    @elseif($tinggi==$kd3)
                        Kompeten pada {{$kdm[3]}}
                    @elseif($tinggi==$kd4)
                        Kompeten pada {{$kdm[4]}}
                    @elseif($tinggi==$kd5)
                        Kompeten pada {{$kdm[5]}}
                    @elseif($tinggi==$kd6)
                        Kompeten pada {{$kdm[6]}}
                    @endif
                    @if($rendah==$kd1)
                        dan perlu peningkatan pada {{$kdm[1]}}
                    @elseif($rendah==$kd2)
                        dan perlu peningkatan pada {{$kdm[2]}}
                    @elseif($rendah==$kd3)
                        dan perlu peningkatan pada {{$kdm[3]}}
                    @elseif($rendah==$kd4)
                        dan perlu peningkatan pada {{$kdm[4]}}
                    @elseif($rendah==$kd5)
                        dan perlu peningkatan pada {{$kdm[5]}}
                    @elseif($rendah==$kd6)
                        dan perlu peningkatan pada {{$kdm[6]}}
                    @endif
                @endif
                </td>
            </tr>
            @php($no++)
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table>
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