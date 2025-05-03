@extends('adminlte::page')

@section('title', 'Tambah Tambak Baru')

@section('title', 'Tambah Petambak')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Tambah Data Petambak</h4>
            <a href="{{ route('petambak.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('petambak.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_petambak" class="form-label">Nama Petambak <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_petambak') is-invalid @enderror"
                        id="nama_petambak" name="nama_petambak" value="{{ old('nama_petambak') }}" required>
                    @error('nama_petambak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror"
                        id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                    @error('nomor_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_registrasi" class="form-label">Tanggal Registrasi <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_registrasi') is-invalid @enderror"
                        id="tanggal_registrasi" name="tanggal_registrasi"
                        value="{{ old('tanggal_registrasi', date('Y-m-d')) }}" required>
                    @error('tanggal_registrasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status_aktif" name="status_aktif" value="1"
                            {{ old('status_aktif', '1') ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_aktif">
                            Status Aktif
                        </label>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-light me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
