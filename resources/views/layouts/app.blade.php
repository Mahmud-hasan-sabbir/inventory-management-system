<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" zoom="0.8">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend')}}/images/favicon.png">
    <!-- Datatable -->
    <link href="{{asset('public/backend')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Sweetalert & Toaster-->
    <link href="{{asset('public/backend')}}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{asset('public/backend')}}/vendor/toaster/css/toastr.min.css" rel="stylesheet">
    <!-- Chart -->
	<link href="{{asset('public/backend')}}/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/vendor/select2/css/select2.min.css">
    <!-- Gallery -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/vendor/lightgallery/css/lightgallery.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Form step -->
     <link href="{{asset('public/backend')}}/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="{{asset('public/backend')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{asset('public/backend')}}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crosso

    <!-- Jquery -->
    <script src="{{asset('public/backend')}}/js/jquery-3.5.1.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.partial.header')
        @include('layouts.partial.sidebar')


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
                <!-- row -->
                {{ $slot }}
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">Cubix informatio system</a> {{ now()->year }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Required vendors -->
    <script src="{{asset('public/backend')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('public/backend')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Apex Chart -->
    <script src="{{asset('public/backend')}}/vendor/apexchart/apexchart.js"></script>
    <!-- Sweetalert -->
    <script src="{{asset('public/backend')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/sweetalert.init.js"></script>
    <!-- Datatable -->
    <script src="{{asset('public/backend')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/datatables.init.js"></script>
    <!-- Select2 1 -->
    <script src="{{asset('public/backend')}}/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins-init/select2-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Dashboard 1 -->
    <script src="{{asset('public/backend')}}/js/dashboard/dashboard-1.js"></script>
    <script src="{{asset('public/backend')}}/js/deznav-init.js"></script>
    <script src="{{asset('public/backend')}}/js/demo.js"></script>
    <script src="{{asset('public/backend')}}/js/styleSwitcher.js"></script>
    <script src="{{asset('public/backend')}}/js/custom.min.js"></script>

    <!-- Light Gallery -->
    <script src="{{asset('public/backend')}}/vendor/lightgallery/js/lightgallery-all.min.js"></script>

    <!-- Form Steps -->
	{{-- <script src="{{asset('public/backend')}}/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script> --}}

    <!-- Start Toaster & Sweetalert -->
    <script src="{{asset('public/backend')}}/vendor/toaster/js/toastr.min.js"></script>
    <script src="{{asset('public/backend')}}/vendor/toaster/js/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
                case 'update':
                    swal("Success Message Title", "Well done, you pressed a button", "success");
                    break;
                case 'fail':
                    swal("Error!", "{{ Session::get('messege') }}", "error");
                    break;
            }
        @endif
    </script>


    <script>
    $(document).on('click', '#delete', function(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            var employeeId = $(this).data('id');
            $.ajax({
                url:'',
                method:"GET",
                dataType:"JSON",
                data:{'id': employeeId},
                success:function (response) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    );
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });

                }
        });
        }
        })
    });

    </script>
    <!-- End Toaster & Sweetalert -->
    {{-- <script>
        $('select:not(.normal)').each(function () {
            $(this).select2({
                dropdownParent: $(this).parent()
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
          $('.dropdwon_select').each(function () {
            $(this).select2({
              dropdownParent: $(this).parent()
            });
          });
        });
    </script>

    @stack('script')
</body>
</html>
