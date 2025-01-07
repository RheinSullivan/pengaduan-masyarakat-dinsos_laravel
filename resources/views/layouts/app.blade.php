<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | Dinas Sosial</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <a href="/">
            <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" />
            <div class="logo-text">
            <h1>{{ auth('masyarakat')->user()->name }}</h1>
            <p>{{ auth('masyarakat')->user()->email }}</p>
            </div>
        </a>
    </div>
      <nav id="navbar" class="navbar order-last order-lg-0 ">
        <ul>
          <li><a class="nav-link scrollto {{ (request()->is('/pengaduan')) ? 'active' : '' }}" href="{{ route('pengaduan')}}">Buat Pengaduan</a></li>
          {{-- <li><a class="nav-link scrollto {{ (request()->is('tentang')) ? 'active' : '' }}" href="{{ url('tentang')}}">Tentang</a></li> --}}
          <li><a class="nav-link scrollto {{ (request()->is('pengaduan.laporan')) ? 'active' : '' }}" href="{{ route('pengaduan.laporan', 'saya')}}">Pengaduan Saya</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      @auth('masyarakat')
        <a href="{{ route('user.logout')}}" class="appointment-btn scrollto">Logout</a>
      @else
        <a href="{{ url('login')}}" class="appointment-btn scrollto">Login</a>
      @endauth
    </div>
  </header>
  <!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>DINAS SOSIAL</h3>
            <p>
            Platform ini dirancang untuk memberikan kenyamanan kepada masyarakat dalam menyampaikan pengaduan terkait layanan sosial, dengan proses yang cepat, aman, dan efisien.
            </p>
          </div>
          {{-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('tentang')}}">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('tentang')}}">Pengaduan</a></li>
            </ul>
          </div> --}}
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Kontak Kami</h4>
            <ul>
              <p>
                <strong>Address:</strong> <a href="https://goo.gl/maps/fMkWmHFLFq27mRwh7" target="_blank" rel="nofollow"> Jl. Sunan Drajat No. 16, Sumber <br>Kec. Sumber, Kab. Cirebon Jawa Barat 45611
							</a><br>
                <strong>Phone:</strong> <a href="tel:+(0231) 321208">(0231)321208</a><br>
                <strong>Email:</strong> <a href="mailto:dinsos@cirebonkab.go.id">dinsos@cirebonkab.go.id</a><br>
              </p>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="me-md-auto my-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span><a href="https://sipepeg.cirebonkab.go.id/" target="_blank">Dinas Sosial</a></span></strong> Kab. Cirebon
        </div>
      </div>
    </div>
  </footer>s
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @stack('prepend-script')
  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @stack('addon-script')
</body>
</html>
