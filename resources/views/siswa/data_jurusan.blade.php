@extends('siswa.layout')

@section('content')
</br>
</br>
 <div class="row">
  <!-- Basic Form-->
 <div class="col-lg-12 mb-5">
    <div class="card">
      <div class="card-header">
        <h3 class="h6 text-uppercase mb-0">Pilih Jurusan</h3>
      </div>
      <div class="card-body">
        <form id="loginForm" action="{{route('update_pilihan_jurusan',$data->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group"><label><strong>Pilih Jurusan :</strong></label>
                <div class="form-row">
                    <div class="col">
                        <div class="carousel slide" data-ride="carousel" id="carousel-1">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item"><img class="w-100 d-block" src="{{asset('img/tkj.jpg')}}" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="{{asset('img/apat.jpg')}}" alt="Slide Image"></div>
                                <div class="carousel-item active"><img class="w-100 d-block" src="{{asset('img/tbsm.jpg')}}" alt="Slide Image"></div>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                                    role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0"></li>
                                <li data-target="#carousel-1" data-slide-to="1"></li>
                                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                    <hr>
                    </div>
                </div>
                <div class="form-row">
                <?php $jurusan=$data->pilihan_jurusan; ?>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="pilihan_jurusan" required="" value="TKJ" {{ $jurusan == "TKJ" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-2"><strong>Teknik Komputer Jaringan</strong></label></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="pilihan_jurusan" value="APAT" {{ $jurusan == "APAT" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-3"><strong>Agribisnis Perikanan Air Tawar</strong></label></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="pilihan_jurusan" value="TBSM" {{ $jurusan == "TBSM" ? 'checked' : '' }}><label class="form-check-label" for="formCheck-4"><strong>Teknik &amp; Bisnis Sepeda Motor</strong></label></div>
                    </div>
                </div>
            </div>
            <div class="form-group"><label><strong>Ukuran Baju * :&nbsp;</strong></label>
          <?php $ub=$data->ukuran_baju; ?>
                <select class="form-control" name="ukuran_baju">
                    <optgroup label="This is a group">
                    <option value="S" {{ $ub == "S" ? 'selected' : '' }}>S</option>
                    <option value="M" {{ $ub == "M" ? 'selected' : '' }}>M</option>
                    <option value="L" {{ $ub == "L" ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ $ub == "XL" ? 'selected' : '' }}>XL</option>
                    <option value="XXL" {{ $ub == "XXL" ? 'selected' : '' }}>XXL</option>
                    </optgroup>
              </select>
            </div>
          <div class="form-group">       
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection