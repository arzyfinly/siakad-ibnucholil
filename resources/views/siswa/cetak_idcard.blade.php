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
            height:100px;
            width:70px;
            border-radius:50%;
            position: absolute;
            z-index: 2;
        }
        .box-foto{
            position: absolute;
            z-index: 3;
            top: 55px;
            left: 61px;
        }
        .box{
            position: absolute;
            z-index: 3;
        }
        .data{
            position: absolute;
            z-index: 3;
            width:200px;
            top: 160px;
        }
        .qr{
            position: absolute;
            z-index: 3;
            top: 215px;
            left: 65px;
        }
        b {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    
@php($no=1)
@foreach($data as $datas)
        <div class="card" >
            <img id="bg-id" src="{{asset('img/idcarddepan1.jpg')}}" alt="{{$datas->nama}}">
            <div class="box">
                <div class="data">
                <center>
                    <b style="color:white; font-size: 14px;">{{strtoupper($datas->nama_lengkap)}}</b><br>
                    <b style="color:white; font-size: 14px;">{{strtoupper($datas->pilihan_jurusan)}}</b><br>
                </center>
                </div>
                <div class="qr" >
                <center>
                    {!! QrCode::margin(1)->errorCorrection('H')->encoding('UTF-8')->size(70)->generate($datas->nisn); !!}
                    <br>
                    <b style="color:white; font-size: 12px;">{{strtoupper($datas->nisn)}}</b>
                <center>
                </div>
                <div class="box-foto">
                @if($datas->pic!="belum")
                    <!-- <img id="foto" src="{{asset('img/idcarddepan1.jpg')}}" alt="{{$datas->name}}"> -->
                    <img id="foto" src="{{url('/').Storage::url($datas->pic)}}" alt="{{$datas->name}}">
                @endif
                </div>
            </div>
        </div>
        <!-- s -->
        @if($no%10==0)
        <div style="break-after:page"></div>
        @endif
        @php($no++)
@endforeach
</body>
</html>