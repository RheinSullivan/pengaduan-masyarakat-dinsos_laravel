<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Login | Dinas Sosial</title>

  @stack('prepend-style')
  @include('includes.admin.style')
  @stack('addon-style')
</head>

<body class="bg-primary">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="/">
        Dinas Sosial
      </a>

      <!-- Toggler for Mobile -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Content -->
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <!-- Header for Mobile -->
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 overflow-hidden collapse-brand d-lg-none">
                <a href="/"> Dinas Sosial</a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation Links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <span class="nav-link-inner--text">
                Home
              </span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('tentang')}}" class="nav-link">
              <span class="nav-link-inner--text">Tentang</span>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-warning py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Login</h1>
              <p class="text-lead text-white">Silahkan login menggunakan akun yang sudah didaftarkan.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-primary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="{{ route('user.login')}}" method="POST">
                  @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-transparent"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="text" value="{{ old('username') }}" class="form-control bg-transparent @error('username') is-invalid @enderror" name="username" id="username" placeholder="Email atau Username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-transparent"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control form-control bg-transparent @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" type="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                    {{-- <a href="#" class="text-black"><small>Lupa password?</small></a> --}}
                  </div>
                  <div class="col-6 text-right">
                    <a href="{{ url('register')}}" class="text-black"><small>Buat akun baru</small></a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="pt-5 mb-3 mt-5" id="footer-main">
    <div class="container">
        <div class="copyright text-center text-white">
          &copy; Copyright <strong><span><a class="text-default" href="https://sipepeg.cirebonkab.go.id/" target="_blank">Dinas Sosial</a></span></strong> Kab. Cirebon
        </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  @stack('prepend-script')
  @include('includes.admin.script')
  @stack('addon-script')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session()->has('pesan'))
        <script>
            Swal.fire(
                'Pemberitahuan!',
                '{{ session()->get('pesan') }}',
                'error'
            );
        </script>
    @endif
</body>
</html>
