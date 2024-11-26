@extends('siswa.layout_soal')

@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin-top: 5px;">
            <div class="card">
            <div class="card-body text-center">
                <h4>{{$data->jenis}} {{$data->mapel->nama_mapel}}</h4>
                <h4>SEMESTER {{$data->mapel->semester}}</h4>
            </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($ujian as $data)
            <div class="col-lg-6" style="margin-top: 5px;">
                <div class="card">
                <div class="card-body">
                    <h4>Nama : {{$data->siswa->nama_lengkap}}</h4>
                    <h5>Durasi : {{$data->status}}</h5>
                    @foreach($data->siswa->nilai as $nilai)
                    <h5>Nilai : {{$nilai->nilai}}</h5>
                    @endforeach
                </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')

@endpush