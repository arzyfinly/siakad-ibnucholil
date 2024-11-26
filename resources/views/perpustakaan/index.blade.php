@extends('perpustakaan.layout')

@section('content')
<div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                      <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-blue"></div>
                        <div class="text">
                          <h6 class="mb-0">Jumlah Buku</h6><span class="text-gray">{{$j_buku}}</span>
                        </div>
                      </div>
                      <div class="icon text-white bg-blue"><i class="fas fa-server"></i></div>
                    </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                      <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-green"></div>
                        <div class="text">
                          <h6 class="mb-0">Dipinjam</h6><span class="text-gray">{{$j_pinjam}}</span>
                        </div>
                      </div>
                      <div class="icon text-white bg-green"><i class="fas fa-server"></i></div>
                    </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                      <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-red"></div>
                        <div class="text">
                          <h6 class="mb-0">Transaksi</h6><span class="text-gray">{{$j_trx}}</span>
                        </div>
                      </div>
                      <div class="icon text-white bg-red"><i class="fas fa-server"></i></div>
                    </div>
              </div>
            </div>
          </section>
            
</div>
</br>
</br>
 <!-- Basic Form-->
 <div id="container">
   <form action="{{route('perpustakaan.beranda')}}" method="get">
      <div class="form-group">
        <label>Form *</label>
        <input type="date" name="from" class="form-control" required>
      </div>
      <div class="form-group">
        <label>To *</label>
        <input type="date" name="to" class="form-control" required>
      </div>
      <div class="form-group">       
        <input type="submit" value="Lihat Peringkat Pertanggal" class="btn btn-primary">
        <a href="{{route('perpustakaan.beranda')}}" class="btn btn-warning">Bulan Ini</a>
      </div>
   </form>
    <canvas id="myChart" style="width:100%"></canvas>
  </div>
</br>
</br>
 <div class="row">
 <!-- Basic Form-->
 <div class="col-lg-2 mb-5">
 </div>
 <div class="col-lg-8 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Beranda Perpustakaan!</h3>
      </div>
      <div class="card-body">
      <div class="row">
      <div class="col-lg-4 mb-5">
      <h1 align="center"><img src="{{url('/')}}{{ Storage::url(Auth::User()->pic) }}" width="150px" alt=""></h1>
      </div>
      <div class="col-lg-8 mb-5">
      <table>
          <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td> : </td>
            <td>{{Auth::User()->name}}</td>
          </tr>
          <tr>
            <td><strong>Username</strong></td>
            <td> : </td>
            <td>{{Auth::User()->username}}</td>
          </tr>
          <tr>
            <td><strong>Status</strong></td>
            <td> : </td>
            <td>{{Auth::User()->aktif}}</td>
          </tr>
        </table>
      </div>
      </div>
       
      </div>
    </div>
  </div>
  </div>
  
  
@endsection
@push('scripts')
<script type="text/javascript">
    var users =  <?php echo json_encode($data) ?>;
    var y=[];
    var x=[];
    $.each (users, function (b) {
        x[b]=users[b].user.name;
        y[b]=users[b].data;
        // console.log (users[b].user.name);
    });
    console.log(y);
    var myChart = new Chart("myChart", {
    type: "bar",
    data: {
        labels: x,
        datasets: [{
            backgroundColor: "rgba(0,0,255,1)",
            data: y
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "PERINGKAT SISWA"
        }
    }
    });
    </script>
@endpush