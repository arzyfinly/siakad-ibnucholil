@extends('admin.layout')

@section('content')
<div class="container-fluid px-xl-5">
<section class="py-5">
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                <a href="{{route('data_siswa')}}">
                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                      <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-green"></div>
                        <div class="text">
                          <h6 class="mb-0">Data Siswa</h6><span class="text-gray">{{$jumlah_siswa}} Orang</span>
                        </div>
                      </div>
                      <div class="icon text-white bg-green"><i class="fas fa-server"></i></div>
                    </div>
                </a>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                <a href="{{route('data_guru')}}">
                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                      <div class="flex-grow-1 d-flex align-items-center">
                        <div class="dot mr-3 bg-green"></div>
                        <div class="text">
                          <h6 class="mb-0">Data Guru</h6><span class="text-gray">{{$jumlah_guru}} Orang</span>
                        </div>
                      </div>
                      <div class="icon text-white bg-green"><i class="fas fa-server"></i></div>
                    </div>
                </a>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
              <a href="{{route('sarpras.data_admin')}}" target="_blank">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">SARPRAS</h6><span class="text-gray">Data Sarpras</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                </div>
                </a>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">Perpustakaan</h6><span class="text-gray">400</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0" style="margin-top:10px;">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                      <h6 class="mb-0">New invoices</h6><span class="text-gray">123</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
                </div>
              </div>
            </div>
          </section>
            
</div>
@endsection