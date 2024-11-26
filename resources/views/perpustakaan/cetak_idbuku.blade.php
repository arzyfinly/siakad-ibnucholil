<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <title>Cetak</title>
    <style>
        @media print {
            .pagebreak { page-break-before: always; } /* page-break-after works, as well */
        }
        .box{
            float: left;
            width:150px;
            height:300px;
            border-style: solid;
            border-width: 1px;
        }
        body {
  font-family: Arial, Helvetica, sans-serif;
}
    </style>
  </head>
  <body>

      @php ($no=1)
      @foreach($data as $datas)
        <div class="box">
            <center>
            <p><b style="font-size: 14px;">PERPUSTAKAAN SMKS IBNU CHOLIL</b></p>
            {!! QrCode::size(130)->generate($datas->no_klasifikasi); !!}
            <br>
            {{$datas->no_klasifikasi}}
            <p>{{substr($datas->pengarang,0,3)}}</p>
            <p>{{substr($datas->judul,0,1)}}</p>
            </center>
        </div>
        @if($no%12==0)
        <div style="page-break-after: always;"></div>
        @endif
      @php ($no++)
    @endforeach


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  </body>
</html>