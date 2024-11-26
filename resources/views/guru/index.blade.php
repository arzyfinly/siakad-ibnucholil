@extends('guru.layout')

@section('content')
</br>
</br>
 <!-- Basic Form-->
 
 <div class="row">
 <!-- Basic Form-->
 <div class="col-lg-2 mb-5">
 </div>
 <div class="col-lg-8 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Selamat Datang !</h3>
      </div>
      <div class="card-body">
      <div class="row">
      <div class="col-lg-4 mb-5">
      <h1 align="center"><img src="{{url('/')}}{{ Storage::url($data->pic) }}" width="150px" alt=""></h1>
      </div>
      <div class="col-lg-8 mb-5">
      <table>
          <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td> : </td>
            <td>{{$data->nama_lengkap}}</td>
          </tr>
          <tr>
            <td><strong>Tanggal Lahir</strong></td>
            <td> : </td>
            <td>{{$data->tempat_lahir}},{{$data->tanggal_lahir}}</td>
          </tr>
          <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td> : </td>
            <td>{{$data->jk}}</td>
          </tr>
          <tr>
            <td><strong>Alamat</strong></td>
            <td> : </td>
            <td>{{$data->alamat}}</td>
          </tr>
          <tr>
            <td>
                <br>
                <a href="{{ route('cetak_idcard_guru', $data->id ) }}" data-id="{{ $data->id }}" class="btn btn-xs btn-success" target="_blank"> ID Card</a>
            </td>
          </tr>
        </table>
      </div>
      </div>
       
      </div>
    </div>
  </div>
  </div>
@endsection