<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petunjuk</title>
</head>
<style>
    table {
        border-collapse: collapse;
        }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th, td {
            padding-left: 3px;
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
<body>
@foreach($data as $data)
    <h2 align="center" >PETUNJUK PENGGUNAAN</h2>
    <ol>
        <li> Rapor merupakan ringkasan hasil penilaian terhadap seluruh aktivitas pembelajaran yang dilakukan siswa dalam kurun waktu tertentu;</li>
        <li> Rapor dipergunakan selama siswa yang bersangkutan mengikuti seluruh pembelajaran di Sekolah menengah Kejuruan tersebut;</li>
        <li> Identitas Sekolah diisi dengan data yang sesuai dengan keberadaan Sekolah Menengah Kejuruan;</li>
        <li> Keterangan tentang diri siswa diisi lengkap;</li>
        <li> Rapor harus dilengkapi dengan pas foto terbaru berwarna (3 x 4 ) dan pengisiannya dilakukan oleh Wali Kelas;</li>
        <li> Deskripsi sikap spiritual diambil dari hasil observasi terutama pada mata pelajaran Pendidikan Agama dan Budi Pekerti, dan PPKn;</li>
        <li> Deskripsi sikap sosial diambil dari hasil observasi pada semua mata pelajaran;</li>
        <li> Deskripsi pada kompetensi sikap ditulis dengan <b><i>kalimat positif</i></b>  untuk aspek yang sangat baik atau kurang baik;</li>
        <li> Capaian siswa dalam kompetensi pengetahuan dan kompetensi keterampilan ditulis dalam <b><i>bentuk angka, predikat dan deskripsi</i></b> untuk masing-masing mata pelajaran;</li>
        <li> Predikat ditulis dalam bentuk huruf sesuai kriteria;</li>
        <li> Kolom KKM (Kriteria Ketuntasan Minimal) merupakan acuan bagi kriteria kenaikan kelas sehingga wali kelas wajib menerangkan konsekuensi ketuntasan belajar tersebut kepada orang tua/wali;</li>
        <li> Batas bawah predikat C adalah nilai KKM (ini dijadikan patokan awal)</li>
        <li> Rentang predikat pencapaian kompetensi dapat dihitung dengan cara :	
            <ul>
                <br>Rentang = (100 - Nilai KKM) / 3 
                <br><b>Contoh KKM = 60</b>
                <br>Rentang = (100 - 60 ) / 3 = 40 / 3 = 13,3
                <br><br> Jadi Rentang Predikat = 13 atau 14
                <br><br><b>Maka Predikatnya :</b>
                <table>
                    <tr>
                        <td>Sangat Baik (A)</td>
                        <td> : </td>
                        <td>88 - 100</td>
                    </tr>
                    <tr>
                        <td>Baik (B)</td>
                        <td> : </td>
                        <td>74 - 87</td>
                    </tr>
                    <tr>
                        <td>Cukup (C)</td>
                        <td> : </td>
                        <td>60 - 73</td>
                    </tr>
                    <tr>
                        <td>Kurang (D)</td>
                        <td> : </td>
                        <td> > 60</td>
                    </tr>
                </table>

            </ul>
        </li>

        <li>Deskripsi pada kompetensi pengetahuan dan kompetensi keterampilan ditulis dengan kalimat positif sesuai capaian tertinggi dan terendah yang diperoleh siswa. Apabila capaian kompetensi dasar yang diperoleh dalam muatan pelajaran itu sama, kolom deskripsi ditulis berdasarkan capaian yang diperoleh;</li>
        <li>Laporan Praktik Kerja Lapangan diisi berdasarkan kegiatan praktik kerja yang diikuti oleh siswa di industri/perusahaan mitra;</li>
        <li>Laporan Ekstrakurikuler diisi berdasarkan kegiatan ekstrakurikuler yang diikuti oleh siswa;</li>
        <li>Saran-saran wali kelas diisi berdasarkan kegiatan yang perlu mendapatkan perhatian siswa;</li>
        <li>Prestasi diisi dengan prestasi yang dicapai oleh siswa dalam bidang akademik dan non akademik;</li>
        <li>Ketidakhadiran diisi dengan data akumulasi ketidakhadiran siswa karena sakit, izin, atau tanpa keterangan dalam satu semester.</li>
        <li>Tanggapan orang tua/wali adalah tanggapan atas pencapaian hasil belajar siswa.</li>
        <li>Keterangan pindah keluar sekolah diisi dengan alasan kepindahan. Sedangkan pindah masuk diisi dengan sekolah asal.</li>
    </ol>
    <footer></footer>
    @endforeach
</body>
</html>
<script>window.print()</script>