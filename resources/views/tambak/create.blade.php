@extends('adminlte::page')

@section('title', 'Tambah Tambak')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Tambah Data Tambak</h4>
            <a href="{{ route('tambak.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('tambak.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_petambak" class="form-label">Petambak <span class="text-danger">*</span></label>
                    <select class="form-select @error('id_petambak') is-invalid @enderror" id="id_petambak"
                        name="id_petambak" required>
                        <option value="">-- Pilih Petambak --</option>
                        @foreach ($petambaks as $petambak)
                            <option value="{{ $petambak->id_petambak }}"
                                {{ old('id_petambak', $selectedPetambakId) == $petambak->id_petambak ? 'selected' : '' }}>
                                {{ $petambak->nama_petambak }} - {{ $petambak->nomor_telepon }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_petambak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_tambak" class="form-label">Nama Tambak <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_tambak') is-invalid @enderror" id="nama_tambak"
                        name="nama_tambak" value="{{ old('nama_tambak') }}" required>
                    @error('nama_tambak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                        name="lokasi" value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="luas_area" class="form-label">Luas Area (m²) <span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('luas_area') is-invalid @enderror" id="luas_area"
                                name="luas_area" value="{{ old('luas_area') }}" required min="0">
                            @error('luas_area')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kedalaman" class="form-label">Kedalaman (m) <span
                                    class="text-danger">*</span></label>
                            <input type="number" step="0.01"
                                class="form-control @error('kedalaman') is-invalid @enderror" id="kedalaman"
                                name="kedalaman" value="{{ old('kedalaman') }}" required min="0">
                            @error('kedalaman')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pembuatan" class="form-label">Tanggal Pembuatan <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_pembuatan') is-invalid @enderror"
                        id="tanggal_pembuatan" name="tanggal_pembuatan"
                        value="{{ old('tanggal_pembuatan', date('Y-m-d')) }}" required>
                    @error('tanggal_pembuatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                        required>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif
                        </option>
                        <option value="perbaikan" {{ old('status') == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-light me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
