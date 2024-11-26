<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id Card</title>
    <style>
        
        .card{
            position: relative;
            z-index: 1;
            height:323px;
            width:186px;
            margin:1px;
            float: left;
        }
        .card1{
            position: relative;
            z-index: 1;
            height:26.45px;
            width:186px;
            margin:0px;
            float: left;
        }
        #bg-id{
            height:323px;
            width:186px;
            position: absolute;
            z-index: 2;
        }
        #foto{
            height:155px;
            width:115px;
            border-radius:50%;
            position: absolute;
            z-index: 2;
        }
        .box-foto{
            position: absolute;
            z-index: 3;
            top: 51px;
            left: 61px;
        }
        .box{
            position: absolute;
            z-index: 3;
        }
        .data{
            position: absolute;
            z-index: 3;
            width:183px;
            top: 217px;
        }
        .qr{
            position: absolute;
            z-index: 3;
            top: 243px;
            left: 108px;
        }
        b {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    
@php($no=1)
        <div class="card" >
            <img id="bg-id" src="{{asset('img/idcardguru.jpg')}}" alt="{{$datas->nama_lengkap}}">
            <div class="box">
                <div class="data">
                <center>
                    @if (strlen($datas->nama_lengkap) > 17)
                    <b style="color:white; font-size: 11px;">{{strtoupper($datas->nama_lengkap)}}</b><br>    
                    @else
                    <b style="color:white; font-size: 14px;">{{strtoupper($datas->nama_lengkap)}}</b><br>    
                    @endif
                    {{-- <b style="color:white; font-size: 14px;">{{strtoupper($datas->pilihan_jurusan)}}</b><br> --}}
                </center>
                </div>
                <div class="qr" >
                <center>
                    {!! QrCode::margin(1)->errorCorrection('H')->encoding('UTF-8')->size(62)->generate($datas->nama_lengkap); !!}
                    {{-- <br>
                    <b style="color:white; font-size: 12px;">{{strtoupper($datas->nisn)}}</b> --}}
                <center>
                </div>
                <div class="box-foto">
                @if($datas->pic!="belum")
                    <!-- <img id="foto" src="{{asset('img/idcarddepan1.jpg')}}" alt="{{$datas->name}}"> -->
                    <img id="foto" src="{{url('/').Storage::url($datas->pic)}}" alt="{{$datas->nama_lengkap}}">
                @endif
                </div>
            </div>
        </div>
        <!-- s -->
        @if($no%10==0)
        <div style="break-after:page"></div>
        @endif
        @php($no++)
</body>
</html>