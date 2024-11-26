<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Raport</title>
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
    div.pagebr
            {
                page-break-inside:avoid;
            }
    </style>
    <style type="text/css" media="print">
        @page { size: portrait; }
    </style>
    @php($kelas="")
    @php($alamat="Jl. Halmim Perdana Kusuma No. 09")
    @php($jurusan="")
    @php($nama="")
    @php($semester="")
    @php($nis="")
    @php($nisn="")
    @php($tahun="")
</head>
<body style="font-size:12px;">
@foreach($data as $datas)
<div class="pagebr">
    {{-- @php(dd($datas)) --}}
<table  border="0"  width="1000px">
        @php($kelas=$datas->kelas->kelas)
        @php($nama=$datas->siswa->nama_lengkap)
        @php($nis=$datas->siswa->nis)
        @php($nisn=$datas->siswa->nisn)
        @foreach($datas->kelas->mapel as $mapel)
            @php($semester=$mapel->semester)
        @endforeach
        @php($tahun=$datas->kelas->ket)
        @php($jurusan=$datas->kelas->jurusan->jurusan)

    <tr>
        <td>Nama Sekolah</td>
        <td >:</td>
        <td width="500px">{{env('NAMA_SEKOLAH',null)}}</td>
        <td>Kelas</td>
        <td >:</td>
        <td width="200px">{{$kelas}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td >:</td>
        <td width="500px">{{env('ALAMAT',null)}}</td>
        <td>Prog. Keahlian</td>
        <td >:</td>
        <td width="200px">{{$jurusan}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td >:</td>
        <td width="500px">{{$nama}}</td>
        <td>Semester</td>
        <td >:</td>
        <td width="200px">{{$semester}}</td>
    </tr>
    <tr>
        <td>NIS / NISN</td>
        <td >:</td>
        <td width="500px">{{$nis}} / {{$nisn}}</td>
        <td>Tahun Ajaran</td>
        <td >:</td>
        <td width="200px">{{ $tahun }}</td>
    </tr>
</table>
<br>
<br>
<table  border="0">
    <tr>
        <td><strong>Capaian Hasil Belajar</strong></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
</table>
<table  border="0">
    <tr>
        <td><strong>A. Nilai Sikap</strong></td>
    </tr>
</table>
<table  border="1"  width="1000px" height="70">
    <tr>
        <td>
                @foreach($datas->kelas->mapel as $kelompok)
                @if($kelompok->nama_mapel=="PENDIDIKAN AGAMA DAN BUDI PEKERTI" || $kelompok->nama_mapel=="PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN")
                    @foreach($kelompok->nilai_sikap as $sikap)
                    {!!$sikap->deskripsi!!}
                    @endforeach
                @endif
                @endforeach
        </td>
    </tr>
</table>
<table  border="0">
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><strong>B. Nilai Pengetahuan Dan Keterampilan</strong></td>
    </tr>
</table>
    <table border="1" width="1000px">
        <thead>
            <tr>
                <th rowspan="2" width="30" >No</th>
                <th rowspan="2" width="200">Mata Pelajaran</th>
                <th colspan="4" >Pengetahuan</th>
                <th colspan="4" >Keterampilan</th>
                <th rowspan="2" width="50">Sikap</th>
                <th rowspan="2" width="150">Rata-Rata Nilai</th>
            </tr>
            <tr>
                <th>KKM</th>
                <th>Angka</th>
                <th>Peredikat</th>
                <th width="230" >Deskripsi</th>
                <th>KKM</th>
                <th>Angka</th>
                <th>Peredikat</th>
                <th width="230" >Deskripsi</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="12"><strong>A. Muatan Nasional</strong></td>
           
        </tr>
        @php($noa=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="Muatan Nasional")
            @php($noa++)
            <tr align="center">
                <td>{{$noa}}</td>
                <td  align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total=0)
                @php($tugas=0)
                @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_munal = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_munal = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_munal = $kelompoka->nilai_sikap->first())
                    @if (isset($s_munal->sikap))
                    {{ $s_munal->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_munal = ($p_munal+$k_munal)/2)
                    {{number_format($rr_munal, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        <tr>
            <td colspan="12"><strong>B. Muatan Kewilayahan</strong></td>
        </tr>
        @php($nob=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="Muatan Kewilayahan")
            @php($nob++)
            <tr align="center">
                <td>{{$nob}}</td>
                <td align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_mukel = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_mukel ?? '' = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_mukel = $kelompoka->nilai_sikap->first())
                    @if (isset($s_mukel->sikap))    
                    {{ $s_mukel->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_mukel = ($p_mukel+$k_mukel ?? '')/2)
                    {{number_format($rr_mukel, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        <tr>
            <td colspan="12"><strong>C. Muatan Peminatan Kejuruan</strong></td>
        </tr>
        <tr>
            <td colspan="12"><strong>C1. Dasar Bidang Keahlian</strong></td>
        </tr>
        @php($noc1=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="Dasar Bidang Keahlian")
            @php($noc1++)
            <tr align="center">
                <td>{{$noc1}}</td>
                <td align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_dbk = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_dbk = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_dbk = $kelompoka->nilai_sikap->first())
                    @if (isset($s_dbk->sikap))   
                    {{ $s_dbk->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_dbk = ($p_dbk+$k_dbk)/2)
                    {{number_format($rr_dbk, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        <tr>
            <td colspan="12"><strong>C2. Dasar Program Keahlian</strong></td>
        </tr>
        @php($noc2=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="Dasar Program Keahlian")
            @php($noc2++)
            <tr align="center">
                <td>{{$noc2}}</td>
                <td align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_dpk = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_dpk = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_dpk = $kelompoka->nilai_sikap->first())
                    @if (isset($s_dpk->sikap))
                    {{ $s_dpk->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_dpk = ($p_dpk+$k_dpk)/2)
                    {{number_format($rr_dpk, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        <tr>
            <td colspan="12"><strong>C3. Kompetensi Keahlian</strong></td>
        </tr>
        @php($noc3=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="Kompetensi Keahlian")
            @php($noc3++)
            <tr align="center">
                <td>{{$noc3}}</td>
                <td align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_kk = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_kk = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_kk = $kelompoka->nilai_sikap->first())
                    @if (isset($s_kk->sikap))
                    {{ $s_kk->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_kk = ($p_kk+$k_kk)/2)
                    {{number_format($rr_kk, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        <tr>
            <td colspan="12"><strong>MULOK</strong></td>
        </tr>
        @php($nom=0)
            @foreach($datas->kelas->mapel as $kelompoka)
            @if($kelompoka->kategori=="MULOK")
            @php($nom++)
            <tr align="center">
                <td>{{$nom}}</td>
                <td align="left">{{$kelompoka->nama_mapel}}</td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                    @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                        @php($total=0)
                        @php($tugas=0)
                        @php($uh=0)
                        @php($array=array($pengetahuan->tugas6,$pengetahuan->tugas5,$pengetahuan->tugas4,$pengetahuan->tugas3,$pengetahuan->tugas2,$pengetahuan->tugas1))
                        @php($a = array_filter($array))
                        @php($t_tugas=array_sum($a))
                        @php($j_tugas=count($a))
                        @if($j_tugas)
                            @php($tugas=$t_tugas/$j_tugas)
                        @endif
                        @php($array=array($pengetahuan->uh6,$pengetahuan->uh5,$pengetahuan->uh4,$pengetahuan->uh3,$pengetahuan->uh2,$pengetahuan->uh1))
                        @php($a = array_filter($array))
                        @php($t_uh=array_sum($a))
                        @php($j_uh=count($a))
                        @if($j_uh)
                            @php($uh=$t_uh/$j_uh)
                        @endif
                        @php($uts=$pengetahuan->uts)
                        @php($uas=$pengetahuan->uas)
                        @php($skor=($tugas+$uh)/2)
                        @php($total=((70*$skor)+(15*$uts)+(15*$uas))/100)
                        {{number_format($total, 1, ',', ' ')}}
                        @php($p_mulok = $total)
                    @endforeach 
                   
               </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total<$kkm)
                D
                @elseif($total>$kkm && $total<=($kkm+($panjang*1)))
                C
                @elseif($total>($kkm+($panjang*1)) && $total<=($kkm+($panjang*2)))
                B
                @elseif($total>($kkm+($panjang*2)) && $total<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                @if($kd_mapel->kriteria=="PENGETAHUAN")
                @php($kdm[$a]=$kd_mapel->kd)
                @php($nokd[$a]=$kd_mapel->no_kd)
                @php($a++)
                @endif
                @endforeach

                @foreach($kelompoka->nilai_pengetahuan as $pengetahuan)
                @php($kd1=$pengetahuan->tugas1+$pengetahuan->uh1)
                @php($kd2=$pengetahuan->tugas2+$pengetahuan->uh2)
                @php($kd3=$pengetahuan->tugas3+$pengetahuan->uh3)
                @php($kd4=$pengetahuan->tugas4+$pengetahuan->uh4)
                @php($kd5=$pengetahuan->tugas5+$pengetahuan->uh5)
                @php($kd6=$pengetahuan->tugas6+$pengetahuan->uh6)
                @php($array_kd=array($kd1,$kd2,$kd3,$kd4,$kd5,$kd6))
                @php($array_kd = array_filter($array_kd))
                @if($array_kd)
                    @php($tinggi=max($array_kd))
                    @php($rendah=min($array_kd))
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
                
                @endforeach
                </td>
                <td>{{$kelompoka->ket}}</td>
                <td>
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                @php($total_keterampilan=0)
                @php($praktik=0)
                @php($portofolio=0)
                @php($proyek=0)
                @php($array_praktik=array($keterampilan->praktik6,$keterampilan->praktik5,$keterampilan->praktik4,$keterampilan->praktik3,$keterampilan->praktik2,$keterampilan->praktik1))
                @php($array_praktik = array_filter($array_praktik))
                @if($array_praktik)
                @php($praktik= array_sum($array_praktik) / count($array_praktik))
                @endif
                @php($array_portofolio=array($keterampilan->portofolio6,$keterampilan->portofolio5,$keterampilan->portofolio4,$keterampilan->portofolio3,$keterampilan->portofolio2,$keterampilan->portofolio1))
                @php($array_portofolio = array_filter($array_portofolio))
                @if($array_portofolio)
                @php($portofolio= array_sum($array_portofolio) / count($array_portofolio))
                @endif
                @php($array_proyek=array($keterampilan->proyek6,$keterampilan->proyek5,$keterampilan->proyek4,$keterampilan->proyek3,$keterampilan->proyek2,$keterampilan->proyek1))
                @php($array_proyek = array_filter($array_proyek))
                @if($array_proyek)
                @php($proyek= array_sum($array_proyek) / count($array_proyek))
                @endif
                @php($total_keterampilan=($praktik+$portofolio+$proyek)/3)
                {{number_format($total_keterampilan, 1, ',', ' ')}}
                @php($k_mulok = $total)
                @endforeach
                </td>
                <td>
                @php($kkm=$kelompoka->ket)
                @php($panjang=number_format(((100-$kkm)/3),0))
                @if($total_keterampilan<$kkm)
                D
                @elseif($total_keterampilan>$kkm && $total_keterampilan<=($kkm+($panjang*1)))
                C
                @elseif($total_keterampilan>($kkm+($panjang*1)) && $total_keterampilan<=($kkm+($panjang*2)))
                B
                @elseif($total_keterampilan>($kkm+($panjang*2)) && $total_keterampilan<=100)
                A
                @endif
                </td>
                <td align="left" style="font-size: 11px;">
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
                @foreach($kelompoka->kd_mapel as $kd_mapel)
                    @if($kd_mapel->kriteria=="KETERAMPILAN")
                        @php($kdm[$a]=$kd_mapel->kd)
                        @php($nokd[$a]=$kd_mapel->no_kd)
                        @php($a++)
                    @endif
                @endforeach
                @foreach($kelompoka->nilai_keterampilan as $keterampilan)
                    @php($kd1=$keterampilan->praktik1+$keterampilan->portofolio1+$keterampilan->proyek1)
                    @php($kd2=$keterampilan->praktik2+$keterampilan->portofolio2+$keterampilan->proyek2)
                    @php($kd3=$keterampilan->praktik3+$keterampilan->portofolio3+$keterampilan->proyek3)
                    @php($kd4=$keterampilan->praktik4+$keterampilan->portofolio4+$keterampilan->proyek4)
                    @php($kd5=$keterampilan->praktik5+$keterampilan->portofolio5+$keterampilan->proyek5)
                    @php($kd6=$keterampilan->praktik6+$keterampilan->portofolio6+$keterampilan->proyek6)
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
                @endforeach
                </td>
                <td>
                    @php($s_mulok = $kelompoka->nilai_sikap->first())
                    @if (isset($s_mulok->sikap))
                    {{ $s_mulok->sikap }}
                    @endif
                </td>
                <td>
                    @php($rr_mulok = ($p_mulok+$k_mulok)/2)
                    {{number_format($rr_mulok, 1, ',', ' ')}}
                </td>
            <tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table>
       
    </table>
</div>
    @endforeach
</body>
</html>
<script>window.print()</script>