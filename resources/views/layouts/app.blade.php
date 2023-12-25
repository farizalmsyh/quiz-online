<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta -->
    @include('layouts.dev.meta')

    <title>Testify</title>

    <!-- Styles -->
    @include('layouts.dev.link')
</head>

<body>
    @include('sweetalert::alert')

    <div class="wrapper">

        <!-- Sidebar -->
        @include('layouts.component.sidebar')
        <!-- End Sidebar -->

        <div class="main">

            <!-- Header -->
            @include('layouts.component.header')
            <!-- End Header -->

            @yield('content')

            <!-- Footer -->
            @include('layouts.component.footer')
            <!-- End Footer -->

        </div>
    </div>

</body>

<!-- Script -->
@include('layouts.dev.script')
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('id')
        var modal = $(this)
        console.log(recipient)
        modal.find('#delUserId').val(recipient)
    })
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var konten = document.getElementById("editor");
        if(konten) {
            CKEDITOR.replace(konten,{
                language:'en-gb'
               });
               var kontens = document.getElementsByClassName("editor");
            CKEDITOR.replace(konten,{
                language:'en-gb'
               });
           CKEDITOR.config.allowedContent = true;
        }
	});
</script>
@yield('script')
</html>