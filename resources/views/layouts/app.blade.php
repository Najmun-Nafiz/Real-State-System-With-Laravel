<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Super Admin 2.0</title>

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{asset('back/resources/vendors/zwicon/zwicon.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/overlay-scrollbars/OverlayScrollbars.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/fullcalendar/core/main.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/fullcalendar/daygrid/main.min.css')}}">

        <link rel="stylesheet" href="{{asset('back/resources/vendors/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/dropzone/dropzone.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/flatpickr/flatpickr.min.css')}}" />
        <link rel="stylesheet" href="{{asset('back/resources/vendors/nouislider/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/trumbowyg/ui/trumbowyg.min.css')}}">
        <link rel="stylesheet" href="{{asset('back/resources/vendors/rateyo/jquery.rateyo.min.css')}}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{asset('back/resources/css/app.min.css')}}">

        <!-- Demo only -->
        <link rel="stylesheet" href="{{asset('back/demo/css/demo.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    


   

</head>
<body data-sa-theme="1">
    <main class="main">
         <!-- Preloader -->
        <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>
        <!-- /Preloader -->
        
        <!-- HK Wrapper -->
   

            @if(Request::is('admin*'))
              @include('layouts.partial.topbar');
            @endif

            @if(Request::is('admin*'))
              @include('layouts.partial.sidebar');
            @endif

             <main class="py-4">
                @yield('content')
            </main>
            
            @if(Request::is('admin*'))
              @include('layouts.partial.footer');
            @endif

        <!-- /HK Wrapper -->
</main>
       



    {{-- project j-query are included... --}}

    <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{asset('back/resources/vendors/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/popper.js/popper.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js')}}"></script>

        <script src="{{asset('back/resources/vendors/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('back/resources/vendors/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('back/resources/vendors/flot/flot.curvedlines/curvedLines.js')}}"></script>
        <script src="{{asset('back/resources/vendors/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/jqvmap/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('back/resources/vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/fullcalendar/core/main.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/fullcalendar/daygrid/main.min.js')}}"></script>


        <script src="{{asset('back/resources/vendors/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/dropzone/dropzone.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/nouislider/nouislider.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/trumbowyg/trumbowyg.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/rateyo/jquery.rateyo.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/jquery-text-counter/textcounter.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/autosize/autosize.min.js')}}"></script>


        <!-- Vendors: Data tables -->
        <script src="{{asset('back/resources/vendors/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/datatables/datatables-buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/datatables/datatables-buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('back/resources/vendors/datatables/datatables-buttons/buttons.html5.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('back/resources/js/app.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        {!! Toastr::message() !!}

       

</body>
</html>
