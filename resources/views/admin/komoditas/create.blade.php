@extends('adminlte::page')

@section('title', isset($komoditas) ? 'Edit Komoditas' : 'Tambah Komoditas')

@section('content_header')
    <h1>{{ isset($komoditas) ? 'Edit Komoditas' : 'Tambah Komoditas' }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($komoditas) ? 'Form Edit Komoditas' : 'Form Tambah Komoditas' }}</h3>
        </div>
        <div class="card-body">
            <form
                action="{{ isset($komoditas) ? route('admin.komoditas.update', $komoditas->id) : route('admin.komoditas.store') }}"
                method="POST">
                @csrf
                @if (isset($komoditas))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="kode">Kode Komoditas</label>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                        name="kode" value="{{ old('kode', $komoditas->kode ?? '') }}">
                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Komoditas</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama', $komoditas->nama ?? '') }}" required>
                    @error('nama')
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
                        <option value="ikan" {{ old('jenis', $komoditas->jenis ?? '') == 'ikan' ? 'selected' : '' }}>
                            Ikan</option>
                        <option value="udang" {{ old('jenis', $komoditas->jenis ?? '') == 'udang' ? 'selected' : '' }}>
                            Udang</option>
                        <option value="kepiting"
                            {{ old('jenis', $komoditas->jenis ?? '') == 'kepiting' ? 'selected' : '' }}>Kepiting</option>
                        <option value="lainnya" {{ old('jenis', $komoditas->jenis ?? '') == 'lainnya' ? 'selected' : '' }}>
                            Lainnya</option>
                    </select>
                    @error('jenis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                        rows="3">{{ old('keterangan', $komoditas->keterangan ?? '') }}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($komoditas) ? 'Perbarui' : 'Simpan' }}
                    </button>
                    <a href="{{ route('admin.komoditas.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@stop
