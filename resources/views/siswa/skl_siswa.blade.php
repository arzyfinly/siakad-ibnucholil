@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
   <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    @if (isset($data->skl))
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">SKL</h3>
      </div>
      <div class="card-body">
        <iframe src="{{ url('/').Storage::url($data->skl) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection