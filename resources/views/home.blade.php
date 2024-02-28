<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio: Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{asset('/assets/frontend')}}/img/favicon.png" rel="icon">
    <link href="{{asset('/assets/frontend')}}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset('/assets/frontend')}}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('/assets/frontend')}}/vendor/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{asset('/assets/frontend')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/assets/frontend')}}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('/assets/frontend')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('/assets/frontend')}}/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a>
                </li>
                <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                        <span>Portfolio</span></a></li>
                <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a>
                </li>
                <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
                </li>
            </ul>
        </nav>
        <!-- .nav-menu -->
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @include('frontend.home-partials.banner')
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        @include('frontend.home-partials.about')
        <!-- End About Section -->

        <!-- ======= Facts Section ======= -->
        @include('frontend.home-partials.facts')
        <!-- End Facts Section -->

        <!-- ======= Skills Section ======= -->
        @include('frontend.home-partials.skills')
        <!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        @include('frontend.home-partials.resume')
        <!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.home-partials.portfolio')
        <!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        @include('frontend.home-partials.services')
        <!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('frontend.home-partials.testimonials')
        <!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.home-partials.contact')
        <!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Brandon Johnson</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
                placeat.</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('/assets/frontend')}}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/aos/aos.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/typed.js/typed.umd.js"></script>
    <script src="{{asset('/assets/frontend')}}/vendor/waypoints/noframework.waypoints.js"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('/assets/frontend')}}/js/main.js"></script>

</body>

</html>