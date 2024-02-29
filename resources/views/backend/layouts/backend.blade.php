<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portfolio: @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link href="{{asset('/assets/frontend')}}/img/favicon.png" rel="icon">
    <link href="{{asset('/assets/frontend')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/vendor/boxicons/css/boxicons.min.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/dropify.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/css/tagify.css" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />

    <!-- Custom Style CSS -->
    @stack('styles')
    <!-- Helpers -->
    <script src="{{ asset('assets/backend') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('assets/backend') }}/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('backend.layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('backend.layouts.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y main-content">
                        @yield('main-content')
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js /vendor/js/core.js -->

    <script src="{{ asset('assets/backend') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/backend') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('assets/backend') }}/js/toastr.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/sweetalert.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/dropify.min.js"></script>
    <script src="{{ asset('assets/backend') }}/js/jQuery.tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="{{ asset('assets/backend') }}/js/main.js"></script>
    <!-- Page JS -->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/backend') }}/js/custom.js"></script>
    <script>
        // Toaster
        @if (session()->has('message'))
            var type = "{{session()->get('alert-type', 'info')}}";
            switch (type) {
                case 'info':
                    toastr.info("{{session()->get('message')}}");
                    break;
                case 'success':
                    toastr.success("{{session()->get('message')}}");
                    break;
                case 'warning':
                    toastr.warning("{{session()->get('message')}}");
                    break;
                case 'error':
                    toastr.error("{{session()->get('message')}}");
                    break;
            }
        @endif       
    </script>
    {{-- Custom Scripts Js --}}
    @stack('scripts')
</body>

</html>