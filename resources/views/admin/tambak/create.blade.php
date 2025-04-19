@extends('adminlte::page')

@section('title', 'Tambah Tambak Baru')

@section('content_header')
    <h1>Tambah Tambak Baru</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Tambak</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tambak.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Tambak</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <textarea class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" rows="3"
                        required>{{ old('lokasi') }}</textarea>
                    @error('lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="luas">Luas (ha)</label>
                    <input type="number" step="0.01" class="form-control @error('luas') is-invalid @enderror"
                        id="luas" name="luas" value="{{ old('luas') }}" required>
                    @error('luas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                        required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="air tawar" {{ old('jenis') == 'air tawar' ? 'selected' : '' }}>Air Tawar</option>
                        <option value="payau" {{ old('jenis') == 'payau' ? 'selected' : '' }}>Payau</option>
                        <option value="laut" {{ old('jenis') == 'laut' ? 'selected' : '' }}>Laut</option>
                    </select>
                    @error('jenis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
                    <input type="date" class="form-control @error('tanggal_pembuatan') is-invalid @enderror"
                        id="tanggal_pembuatan" name="tanggal_pembuatan"
                        value="{{ old('tanggal_pembuatan') ?? date('Y-m-d') }}" required>
                    @error('tanggal_pembuatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                        required>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                        <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance
                        </option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                        rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.tambak.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        // Jika Anda ingin menambahkan datepicker yang lebih baik
        // $(document).ready(function() {
        //    $('#tanggal_pembuatan').datepicker({
        //        format: 'yyyy-mm-dd',
        //        autoclose: true
        //    });
        // });
    </script>
@stop
