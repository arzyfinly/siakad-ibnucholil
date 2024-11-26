@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Ganti Password</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('ganti_password',Auth::User()->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Password Baru * :&nbsp;</strong></label><input class="form-control" type="text" name="password" required="" placeholder="Masukan Password Baru..."></div>
            <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection