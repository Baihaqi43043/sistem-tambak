@extends('adminlte::page')

@section('title', 'Tambah Panen')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('panen.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="id_siklus">Pilih Siklus</label>
                    <select name="id_siklus" class="form-control" required>
                        <option value="">-- Pilih Siklus --</option>
                        @foreach ($siklusList as $siklus)
                            <option value="{{ $siklus->id_siklus }}"
                                {{ old('id_siklus') == $siklus->id_siklus ? 'selected' : '' }}>
                                {{ $siklus->id_siklus }} - {{ $siklus->spesies }} ({{ $siklus->tanggal_mulai }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_panen">Tanggal Panen</label>
                    <input type="date" name="tanggal_panen" class="form-control" required
                        value="{{ old('tanggal_panen') }}">
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="text" id="harga" name="harga" class="form-control" required
                        value="{{ old('harga') }}">
                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="berat_total">Berat Total (kg)</label>
                    <input type="number" step="0.01" name="berat_total" class="form-control"
                        value="{{ old('berat_total') }}">
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" class="form-control">{{ old('catatan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('panen.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    @push('js')
        <script>
            // Format Rupiah
            var hargaInput = document.getElementById('harga');
            hargaInput.addEventListener('keyup', function(e) {
                var value = this.value.replace(/[^\d]/g, ''); // Menghapus karakter selain angka
                var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Menambahkan titik pemisah ribuan
                this.value = formattedValue;
            });
        </script>
    @endpush
@endsection
