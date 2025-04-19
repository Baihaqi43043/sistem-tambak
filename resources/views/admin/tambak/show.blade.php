@extends('adminlte::page')

@section('title', 'Detail Tambak')

@section('content_header')
    <h1>Detail Tambak</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Tambak</h3>
            <div class="card-tools">
                <a href="{{ route('admin.tambak.edit', $tambak->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.tambak.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30%">Nama Tambak</th>
                            <td>{{ $tambak->nama }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $tambak->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Luas</th>
                            <td>{{ $tambak->luas }} hektar</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ ucfirst($tambak->jenis) }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembuatan</th>
                            <td>{{ \Carbon\Carbon::parse($tambak->tanggal_pembuatan)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($tambak->status == 'aktif')
                                    <span class="badge badge-success">Aktif</span>
                                @elseif($tambak->status == 'nonaktif')
                                    <span class="badge badge-danger">Non Aktif</span>
                                @else
                                    <span class="badge badge-warning">Maintenance</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat pada</th>
                            <td>{{ $tambak->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir diperbarui</th>
                            <td>{{ $tambak->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Keterangan</h3>
                        </div>
                        <div class="card-body">
                            {!! nl2br(e($tambak->keterangan)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Box untuk Kolam di Tambak ini -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Kolam di Tambak Ini</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Kolam
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($tambak->kolams) && $tambak->kolams->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Luas</th>
                            <th>Kedalaman</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tambak->kolams as $index => $kolam)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $kolam->nama }}</td>
                                <td>{{ $kolam->luas }} m²</td>
                                <td>{{ $kolam->kedalaman }} m</td>
                                <td>{{ $kolam->jenis }}</td>
                                <td>
                                    @if ($kolam->status == 'aktif')
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    Belum ada kolam di tambak ini. Silakan tambahkan kolam baru.
                </div>
            @endif
        </div>
    </div>
@stop
