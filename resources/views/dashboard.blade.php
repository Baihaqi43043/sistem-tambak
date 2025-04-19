<!-- resources/views/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('styles')
    <style>
        .info-box-icon {
            font-size: 1.5rem;
        }

        .small-box h3 {
            font-size: 2rem;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalTambak }}</h3>
                    <p>Total Tambak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-water"></i>
                </div>
                <a href="{{ route('tambak.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalKolam }}</h3>
                    <p>Total Kolam</p>
                </div>
                <div class="icon">
                    <i class="fas fa-square"></i>
                </div>
                <a href="{{ route('kolam.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalIkan }}</h3>
                    <p>Total Ikan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fish"></i>
                </div>
                <a href="{{ route('ikan.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($totalPanen, 0, ',', '.') }}</h3>
                    <p>Total Panen (kg)</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-basket"></i>
                </div>
                <a href="{{ route('panen.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Panen Mendatang</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tambak/Kolam</th>
                                <th>Jenis Ikan</th>
                                <th>Tebar</th>
                                <th>Perkiraan Panen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwalPanen as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->kolam->tambak->nama }} / {{ $jadwal->kolam->nama }}</td>
                                    <td>{{ $jadwal->jenis }}</td>
                                    <td>{{ $jadwal->tanggal_tebar->format('d M Y') }}</td>
                                    <td>{{ $jadwal->perkiraan_panen->format('d M Y') }}</td>
                                    <td>
                                        @if ($jadwal->perkiraan_panen->isPast())
                                            <span class="badge badge-danger">Terlambat</span>
                                        @elseif($jadwal->perkiraan_panen->diffInDays(now()) <= 7)
                                            <span class="badge badge-warning">Segera</span>
                                        @else
                                            <span
                                                class="badge badge-info">{{ $jadwal->perkiraan_panen->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada jadwal panen mendatang</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Stok Pakan Menipis</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
