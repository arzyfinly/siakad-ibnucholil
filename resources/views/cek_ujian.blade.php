@extends('siswa.layout_soal')

@section('content')
    <div class="row">
            <div class="col-lg-4" style="margin-top: 5px;">
            </div>
            <div class="col-lg-4" style="margin-top: 5px;">
                <div class="card">
                <div class="card-body">
                <form action="{{route('cek_ujian')}}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                <label>Masukan Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                              </div>
                              
                              <div class="form-group">       
                                <input type="submit" value="CEK" class="btn btn-primary">
                              </div>
                            </form>
                </div>
                </div>
            </div>
    </div>
@endsection
@push('scripts')

@endpush