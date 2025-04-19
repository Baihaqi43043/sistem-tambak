// LANGKAH 1: Menginstall Laravel UI dan AdminLTE 3
// Jalankan perintah berikut di terminal
// composer require laravel/ui:^2.4
// php artisan ui bootstrap --auth
// npm install
// npm install admin-lte@^3.0
// npm run dev

// LANGKAH 2: Membuat file layout admin
// Buat file resources/views/layouts/admin.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title') | SI Tambak</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome Icons -->
<!-- Di bagian head -->
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
<!-- App CSS -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('profile.edit') }}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SI TAMBAK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ request()->is('tambak*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('tambak*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-water"></i>
              <p>
                Tambak
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tambak.index') }}" class="nav-link {{ request()->routeIs('tambak.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tambak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tambak.create') }}" class="nav-link {{ request()->routeIs('tambak.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Tambak</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('kolam*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('kolam*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-swimming-pool"></i>
              <p>
                Kolam
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kolam.index') }}" class="nav-link {{ request()->routeIs('kolam.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Kolam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kolam.create') }}" class="nav-link {{ request()->routeIs('kolam.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kolam</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('ikan*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('ikan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-fish"></i>
              <p>
                Budidaya Ikan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ikan.index') }}" class="nav-link {{ request()->routeIs('ikan.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Budidaya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ikan.create') }}" class="nav-link {{ request()->routeIs('ikan.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Budidaya</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('pakan*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('pakan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-drumstick-bite"></i>
              <p>
                Pakan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pakan.index') }}" class="nav-link {{ request()->routeIs('pakan.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Pakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pemberian-pakan.index') }}" class="nav-link {{ request()->routeIs('pemberian-pakan.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemberian Pakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('pengukuran*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('pengukuran*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-thermometer-half"></i>
              <p>
                Pengukuran Air
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pengukuran.index') }}" class="nav-link {{ request()->routeIs('pengukuran.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pengukuran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pengukuran.create') }}" class="nav-link {{ request()->routeIs('pengukuran.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pengukuran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('panen*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('panen*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Panen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('panen.index') }}" class="nav-link {{ request()->routeIs('panen.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Panen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('panen.create') }}" class="nav-link {{ request()->routeIs('panen.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catat Panen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('keuangan*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('keuangan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Keuangan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pengeluaran.index') }}" class="nav-link {{ request()->routeIs('pengeluaran.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-keuangan.index') }}" class="nav-link {{ request()->routeIs('laporan-keuangan.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('laporan*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporan.produksi') }}" class="nav-link {{ request()->routeIs('laporan.produksi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Produksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan.pakan') }}" class="nav-link {{ request()->routeIs('laporan.pakan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pakan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">PENGATURAN</li>
          <li class="nav-item">
            <a href="{{ route('karyawan.index') }}" class="nav-link {{ request()->routeIs('karyawan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Karyawan</p>
            </a>
          </li>
          @if(Auth::user()->role == 'admin')
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Pengguna</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('page-title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Sistem Informasi Tambak
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">SI Tambak</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
@yield('scripts')
</body>
</html>

// LANGKAH 3: Menyesuaikan Login Page
// Edit file resources/views/auth/login.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI Tambak | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>SI</b>Tambak</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi anda</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      @if (Route::has('password.request'))
      <p class="mb-1">
        <a href="{{ route('password.request') }}">Lupa password?</a>
      </p>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>

// LANGKAH 4: Buat halaman Dashboard
// Buat file resources/views/dashboard.blade.php

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $jumlah_tambak ?? 0 }}</h3>
        <p>Total Tambak</p>
      </div>
      <div class="icon">
        <i class="fas fa-water"></i>
      </div>
      <a href="{{ route('tambak.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $jumlah_kolam ?? 0 }}</h3>
        <p>Total Kolam</p>
      </div>
      <div class="icon">
        <i class="fas fa-swimming-pool"></i>
      </div>
      <a href="{{ route('kolam.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $jumlah_budidaya_aktif ?? 0 }}</h3>
        <p>Budidaya Aktif</p>
      </div>
      <div class="icon">
        <i class="fas fa-fish"></i>
      </div>
      <a href="{{ route('ikan.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $jumlah_panen ?? 0 }}</h3>
        <p>Panen Tahun Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-cash-register"></i>
      </div>
      <a href="{{ route('panen.index') }}" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-md-6">
    <!-- DONUT CHART -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Status Kolam</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Produksi Tahun Ini</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Budidaya Yang Akan Panen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Kolam</th>
              <th>Jenis Ikan</th>
              <th>Perkiraan Panen</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @forelse($panen_mendatang ?? [] as $ikan)
            <tr>
              <td>{{ $ikan->kolam->nama }}</td>
              <td>{{ $ikan->jenis }}</td>
              <td>{{ $ikan->perkiraan_panen }}</td>
              <td>{{ $ikan->jumlah }} ekor</td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Stok Pakan Menipis</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Pakan</th>
              <th>Jenis</th>
              <th>Stok</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pakan_menipis ?? [] as $pakan)
            <tr>
              <td>{{ $pakan->nama }}</td>
              <td>{{ $pakan->jenis }}</td>
              <td>{{ $pakan->stok }} kg</td>
              <td>
                @if($pakan->stok <= 5)
                <span class="badge badge-danger">Kritis</span>
                @else
                <span class="badge badge-warning">Menipis</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('scripts')
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
  $(function () {
    // Donut chart data - Status Kolam
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: ['Kosong', 'Terisi', 'Panen', 'Maintenance'],
      datasets: [
        {
          data: [{{ $status_kolam['kosong'] ?? 0 }}, {{ $status_kolam['terisi'] ?? 0 }}, {{ $status_kolam['panen'] ?? 0 }}, {{ $status_kolam['maintenance'] ?? 0 }}],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    // Line chart data - Produksi Tahun Ini
    var produksiData = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [
        {
          label: 'Produksi (kg)',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: 3,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: {{ json_encode($produksi_bulanan ?? [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]) }}
        },
      ]
    }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }

    new Chart(lineChartCanvas, {
      type: 'line',
      data: produksiData,
      options: lineChartOptions
    })
  })
</script>
@endsection

// LANGKAH 5: Membuat file DashboardController.php
// Buat file app/Http/Controllers/DashboardController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tambak;
use App\Kolam;
use App\Ikan;
use App\Pakan;
use App\Panen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan jumlah untuk status
        $jumlah_tambak = Tambak::count();
        $jumlah_kolam = Kolam::count();
        $jumlah_budidaya_aktif = Ikan::where('status', 'aktif')->count();

        // Hitung jumlah panen tahun ini
        $tahun_ini = Carbon::now()->year;
        $jumlah_panen = Panen::whereYear('tanggal_panen', $tahun_ini)->count();

        // Status kolam untuk chart
        $status_kolam = [
            'kosong' => Kolam::where('status', 'kosong')->count(),
            'terisi' => Kolam::where('status', 'terisi')->count(),
            'panen' => Kolam::where('status', 'panen')->count(),
            'maintenance' => Kolam::where('status', 'maintenance')->count(),
        ];

        // Data produksi bulanan untuk chart
        $produksi_bulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            $produksi = Panen::whereYear('tanggal_panen', $tahun_ini)
                ->whereMonth('tanggal_panen', $i)
                ->sum('berat_total');
            $produksi_bulanan[] = $produksi ?: 0;
        }

        // Daftar ikan yang akan panen dalam 30 hari
        $tgl_sekarang = Carbon::now();
        $tgl_30_hari = Carbon::now()->addDays(30);
        $panen_mendatang = Ikan::with('kolam')
                          ->where('status', 'aktif')
                          ->whereBetween('perkiraan_panen', [$tgl_sekarang, $tgl_30_hari])
                          ->orderBy('perkiraan_panen')
                          ->take(5)
                          ->get();

        // Daftar pakan yang stoknya menipis (kurang dari 15kg)
        $pakan_menipis = Pakan::where('stok', '<', 15)
                        ->orderBy('stok')
                        ->take(5)
                        ->get();

        return view('dashboard', compact(
            'jumlah_tambak',
            'jumlah_kolam',
            'jumlah_budidaya_aktif',
            'jumlah_panen',
            'status_kolam',
            'produksi_bulanan',
            'panen_mendatang',
            'pakan_menipis'
        ));
    }
}

// LANGKAH 6: Menambahkan Route untuk Dashboard
// Edit routes/web.php

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]); // Menonaktifkan registrasi publik

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Routes untuk Tambak
    Route::resource('tambak', 'TambakController');

    // Routes untuk Kolam
    Route::resource('kolam', 'KolamController');

    // Routes untuk Ikan
    Route::resource('ikan', 'IkanController');

    // Routes untuk Pakan dan Pemberian Pakan
    Route::resource('pakan', 'PakanController');
    Route::resource('pemberian-pakan', 'PemberianPakanController');

    // Routes untuk Pengukuran Air
    Route::resource('pengukuran', 'PengukuranAirController');

    // Routes untuk Panen
    Route::resource('panen', 'PanenController');

    // Routes untuk Pengeluaran
    Route::resource('pengeluaran', 'PengeluaranController');

    // Routes untuk Laporan
    Route::get('laporan/produksi', 'LaporanController@produksi')->name('laporan.produksi');
    Route::get('laporan/pakan', 'LaporanController@pakan')->name('laporan.pakan');
    Route::get('laporan-keuangan', 'LaporanController@keuangan')->name('laporan-keuangan.index');

    // Routes untuk Karyawan
    Route::resource('karyawan', 'KaryawanController');

    // Routes untuk User (hanya untuk admin)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', 'UserController');
    });

    // Profile pengguna
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
});

// LANGKAH 7: Membuat Middleware untuk Role
// Buat file app/Http/Middleware/CheckRole.php

<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
        return $next($request);
    }
}

// Daftarkan middleware di app/Http/Kernel.php
// Tambahkan baris berikut di $routeMiddleware array:
// 'role' => \App\Http\Middleware\CheckRole::class,

// LANGKAH 8: Menambahkan method hasRole di User model
// Edit app/User.php

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_active', 'karyawan_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Check if user has specific role
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Get karyawan associated with user
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

// LANGKAH 9: Membuat seeder untuk User Admin awal
// Buat file database/seeds/UsersTableSeeder.php

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sitambak.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}

// Edit file database/seeds/DatabaseSeeder.php
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

// Jalankan seeder:
// php artisan db:seed
