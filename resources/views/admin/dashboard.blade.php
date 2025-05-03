@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-4">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- Jumlah Kolam -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>12</h3>
                    <p>Jumlah Kolam</p>
                </div>
                <div class="icon">
                    <i class="fas fa-water"></i>
                </div>
            </div>
        </div>

        <!-- Jumlah Petambak -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>8</h3>
                    <p>Jumlah Petambak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
            </div>
        </div>

        <!-- Total Benih -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>5,000</h3>
                    <p>Total Benih</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fish"></i>
                </div>
            </div>
        </div>

        <!-- Stok Pakan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>1,200 Kg</h3>
                    <p>Stok Pakan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Dashboard loaded!');
    </script>
@stop
