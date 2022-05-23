<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Dashboard</title>
    {{-- other css --}}
    <link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/cms/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/cms/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/cms/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('assets/cms/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/cms/css/main.min.css') }}" rel="stylesheet" />

    <link rel="manifest" href="{{ asset('assets/manifest.json') }}">
    {{-- <meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
    <meta name="theme-color" media="(prefers-color-scheme: dark)"  content="black"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/addtohomescreen/addtohomescreen.css') }}">
    <script src="{{ asset('assets/addtohomescreen/addtohomescreen.js') }}"></script>
    <script>
        addToHomescreen();
    </script> --}}

    @yield('css')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('cms.includes.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('cms.includes.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <br>
            @include('cms.includes.messages')
            <script src="{{ asset('assets/cms/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/cms/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript">
            </script>
            @yield('content')

            <script src="{{ asset('assets/cms/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous">
            </script>
            <!-- END PAGE CONTENT-->
            @include('cms.includes.footer')
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    @include('cms.includes.themeconfig')
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ asset('assets/cms/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('assets/cms/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/cms/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/cms/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript">
    </script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/cms/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('assets/cms/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>

    {{-- other js --}}
    <script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/js/scripts/form-plugins.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        // Don't register the service worker
        // until the page has fully loaded
        window.addEventListener('load', () => {
            // Is service worker available?
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('assets/sw.js').then(() => {
                    console.log('Service worker registered!');
                }).catch((error) => {
                    console.warn('Error registering service worker:');
                    console.warn(error);
                });
            }
        });
    </script>
    @yield('js')
</body>

</html>
