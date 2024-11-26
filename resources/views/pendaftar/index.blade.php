@extends('pendaftar.layout')

@section('content')
</br>
</br>
 <!-- Basic Form-->
 
 <div class="row">
 <!-- Basic Form-->
 
 <div class="col-lg-8 mb-5">
 <div class="alert alert-danger" role="alert">
  Akun anda akan diverifikasi maksimal 5 menit setelah kirim bukti transfer, jika tidak hubungi <strong>Admin</strong>
</div>
        <div class="card">
        <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Ketentuan Verifikasi !</h3>
        </div>
            <div class="card-body">
                <h3>Penting!!!</h3>
                <br>
                <p>1. Catat <Strong>Username</Strong> dan <strong>Password</strong> yang ada pada informasi akun dibawah</p>
                <p>2. Silahkan tranfer uang pendaftaran dengan ketentuan berikut :</p>
                <ul>
                    <li>Siswa diluar SMP Ibnu Cholil Tranfer Sebesar : <strong>Rp. 1.000.000</strong> </li>
                    <li>Siswa SMP Ibnu Cholil Tranfer Sebesar : <strong>Rp. 800.000</strong> </li>
                    <li style="background-color: yellow;">Siswa tidak mampu dibuktikan dengan <strong>Kartu Indonesia Pintar (KIP) dan Surat Keterangan Tidak Mampu dari kelurahan</strong> Silahkan menghubungi Admin</li>
                    <li><strong>Rincian Pembayaran :</strong></li>
                    <table>
                        <tr>
                            <td>- </td>
                            <td width="400">Seragam Olah Raga</td>
                            <td>Rp. </td>
                            <td align="right">150.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Seragam Khas</td>
                            <td>Rp. </td>
                            <td align="right">200.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Seragam Katalpak</td>
                            <td>Rp. </td>
                            <td align="right">150.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Atribut (Nama dada, bed lokasi, dll.)</td>
                            <td>Rp. </td>
                            <td align="right">100.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Pembelian dan perbaikan alat praktek produktif</td>
                            <td>Rp. </td>
                            <td align="right">200.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Lembar Kerja Siswa</td>
                            <td>Rp. </td>
                            <td align="right">100.000</td>
                        </tr>
                        <tr>
                            <td>- </td>
                            <td>Sumbangan Orang Tua untuk kebutuhan SARPRAS</td>
                            <td>Rp. </td>
                            <td align="right">100.000</td>
                        </tr>
                        <tr>
                            <td colspan="4"><hr></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td><strong>TOTAL</strong></td>
                            <td><strong>Rp. </strong></td>
                            <td align="right"><strong>1.000.000</strong></td>
                        </tr>
                    </table>
                </ul>
                <p>3. Uang pendaftaran termasuk biaya sekolah selama 1 tahun</p>
                <p>4. Jika ada yang kurang jelas atau ada pertanyaan bisa hubungi Admin di via :
                <ul>
                <li>Telephone : <strong><a href="tel://082330121039">0823-3012-1039</a></strong></li>
                <li>WhatsApp  : <strong><a href="https://api.whatsapp.com/send?phone=6281931031030">0819-3103-1030</a> & <a href="https://api.whatsapp.com/send?phone=6282301349994">0823-0134-9994</a></strong></li>
                <li>Datang ke <strong><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6533766563402!2d112.74205837997879!3d-7.049954799999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805bc1dbcffe5%3A0x67c569c7f49cb06a!2sSMKS%20IBNU%20CHOLIL!5e0!3m2!1sid!2sid!4v1585747272893!5m2!1sid!2sid" target="_blank" >Pondok Pesantren Ibnu Cholil Bangkalan.</a></strong></li>
                <li>Nomor Rekening BNI : <strong><a href="#">0722255926</a></strong> A/N IBNU CHOLIL BANGKALAN</li>
                </ul>
                 <div class="row">
                 <div class="col-lg-8 mb-5">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6533766563402!2d112.74205837997879!3d-7.049954799999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805bc1dbcffe5%3A0x67c569c7f49cb06a!2sSMKS%20IBNU%20CHOLIL!5e0!3m2!1sid!2sid!4v1585747272893!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                 
                 </div>
                 </div>
                <p>5. Jika sudah melakukan tranfer silahkan masukan bukti tranfer berupa gambar pada isian dibawah ini</p>
            <form action="{{route('pendaftar_bukti_tf')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label><strong>Jumlah Tranfer * :&nbsp;</strong></label>
                    <input class="form-control" type="number" name="jumlah_tf" required="" placeholder="Masukan sesuai ketentuan...">
                </div>
                <div class="form-group">
                    <label><strong>Bukti Tranfer * :&nbsp;</strong></label>
                    <input class="form-control" type="file" name="pic" required="">
                </div>
                <div class="form-group">       
                    <button type="submit" class="btn btn-primary">kirim</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-5">
        <div class="card">
        <div class="card-header">
            <h3 class="h6 text-uppercase mb-0">Informasi Akun Anda!</h3>
        </div>
            <div class="card-body">
            <table>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td> : </td>
                    <td>{{$data->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td> : </td>
                    <td>{{$data->jk}}</td>
                </tr>
                <tr>
                    <td><strong>Nomor Handphone</strong></td>
                    <td> : </td>
                    <td>{{$data->no_hp}}</td>
                </tr>
                <tr>
                    <td><strong>Username</strong></td>
                    <td> : </td>
                    <td>{{$data->nisn}}</td>
                </tr>
                <tr>
                    <td><strong>Password</strong></td>
                    <td> : </td>
                    <td>{{Auth::User()->status}}</td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td> : </td>
                    <td>Menunggu Verifikasi</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    
  </div>
@endsection