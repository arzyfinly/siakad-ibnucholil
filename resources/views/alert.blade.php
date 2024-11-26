
<!--
<script type="text/javascript">
	$(document).ready(function(){ 
                swal("Good job!", "You clicked the button!", "success");
         }); 
</script>
-->
<script type="text/javascript" language="javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>

@if(session()->get('success')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Sukses", "{{session()->get('success')}}", "success");
                         }); 
                </script>
                @elseif(session()->get('gagal')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Maaf", "{{session()->get('gagal')}}", "error");
                         }); 
                </script>
                @elseif(session()->get('gagaldaftar')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Maaf NIM Tidak Valid", "{{session()->get('gagaldaftar')}}", "error");
                         }); 
                </script>
                @elseif(session()->get('hapus')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Sukses Hapus Data", "{{session()->get('hapus')}}", "success");
                         }); 
                </script>
                @elseif(session()->get('tambah')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Sukses Tambah Data", "{{session()->get('tambah')}}", "success");
                         }); 
                </script>
                @elseif(session()->get('edit')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Sukses Edit Data", "{{session()->get('edit')}}", "success");
                         }); 
                </script>
                @elseif(session()->get('update_benar')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Sukses", "{{session()->get('update_benar')}}", "success");
                         }); 
                </script>
                @elseif(session()->get('update_salah')) 
                <script type="text/javascript">
                    $(document).ready(function(){ 
                            swal("Gagal", "{{session()->get('update_salah')}}", "error");
                         }); 
                </script>
              @endif
