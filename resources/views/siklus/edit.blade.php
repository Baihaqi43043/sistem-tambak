@extends('adminlte::page')

@section('title', 'Edit Siklus Budidaya')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Siklus Budidaya</h1>

        <!-- Form Edit Siklus Budidaya -->
        <form action="{{ route('siklus.update', $siklusBudidaya->id_siklus) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tambak_id">Nama Tambak</label>
                        <select name="id_tambak" id="tambak_id" class="form-control @error('id_tambak') is-invalid @enderror">
                            <option value="">Pilih Tambak</option>
                            @foreach ($tambaks as $tambak)
                                <option value="{{ $tambak->id_tambak }}" @if ($siklusBudidaya->id_tambak == $tambak->id_tambak) selected @endif>
                                    {{ $tambak->nama_tambak }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_tambak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_budidaya">Jenis Budidaya</label>
                        <select name="jenis_budidaya" id="jenis_budidaya"
                            class="form-control @error('jenis_budidaya') is-invalid @enderror">
                            <option value="udang" @if ($siklusBudidaya->jenis_budidaya == 'udang') selected @endif>Udang</option>
                            <option value="ikan" @if ($siklusBudidaya->jenis_budidaya == 'ikan') selected @endif>Ikan</option>
                        </select>
                        @error('jenis_budidaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="spesies">Spesies</label>
                <input type="text" name="spesies" id="spesies"
                    class="form-control @error('spesies') is-invalid @enderror"
                    value="{{ old('spesies', $siklusBudidaya->spesies) }}">
                @error('spesies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($siklusBudidaya->tanggal_mulai)->format('Y-m-d')) }}">
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_panen_estimasi">Tanggal Panen Estimasi</label>
                        <input type="date" name="tanggal_panen_estimasi" id="tanggal_panen_estimasi"
                            class="form-control @error('tanggal_panen_estimasi') is-invalid @enderror"
                            value="{{ old('tanggal_panen_estimasi', $siklusBudidaya->tanggal_panen_estimasi ? $siklusBudidaya->tanggal_panen_estimasi->format('Y-m-d') : '') }}">
                        @error('tanggal_panen_estimasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_tebar">Jumlah Tebar (Ekor)</label>
                <input type="number" name="jumlah_tebar" id="jumlah_tebar"
                    class="form-control @error('jumlah_tebar') is-invalid @enderror"
                    value="{{ old('jumlah_tebar', $siklusBudidaya->jumlah_tebar) }}">
                @error('jumlah_tebar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status_siklus">Status Siklus</label>
                <select name="status_siklus" id="status_siklus"
                    class="form-control @error('status_siklus') is-invalid @enderror">
                    <option value="aktif" @if ($siklusBudidaya->status_siklus == 'aktif') selected @endif>Aktif</option>
                    <option value="selesai" @if ($siklusBudidaya->status_siklus == 'selesai') selected @endif>Selesai</option>
                </select>
                @error('status_siklus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan', $siklusBudidaya->catatan) }}</textarea>
                @error('catatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Siklus Budidaya</button>
        </form>
    </div>
@endsection
