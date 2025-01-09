@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
        <!-- Header -->
        <div class="header bg-gradient-warning pb-6">
            <div class="container-fluid">
              <div class="header-body">
                <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                    <h2 class="text-white pb-2">Hai, 👋🏻 <b class="text-dark"><i>{{ auth('admin')->user()->nama_petugas ?? 'Guest' }}</i></b> selamat datang, dan selamat beraktifitas...</h2>
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                      {{-- <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                      </ol> --}}
                    </nav>
                  </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                  <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $pengaduan }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                              <i class="fas fa-bullhorn"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Diproses</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $proses }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                              <i class="fas fa-sync"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Selesai</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $selesai }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                              <i class="fas fa-check-circle"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                      <!-- Card body -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Masyarakat</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $masyarakat }}</span>
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                              <i class="fas fa-users"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
