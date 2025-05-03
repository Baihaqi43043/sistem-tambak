@extends('adminlte::page')

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Biaya</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('biaya.update', $biaya->id_biaya) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="id_siklus">Siklus <span class="text-danger">*</span></label>
                                <select class="form-control @error('id_siklus') is-invalid @enderror" id="id_siklus"
                                    name="id_siklus" required>
                                    <option value="">-- Pilih Siklus --</option>
                                    @foreach ($siklus as $s)
                                        <option value="{{ $s->id_siklus }}"
                                            {{ old('id_siklus', $biaya->id_siklus) == $s->id_siklus ? 'selected' : '' }}>
                                            {{ $s->nama_siklus }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_siklus')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="id_kategori">Kategori Biaya <span class="text-danger">*</span></label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori"
                                    name="id_kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori_biayas as $kategori)
                                        <option value="{{ $kategori->id_kategori }}"
                                            {{ old('id_kategori', $biaya->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_pengeluaran">Tanggal Pengeluaran <span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('tanggal_pengeluaran') is-invalid @enderror"
                                    id="tanggal_pengeluaran" name="tanggal_pengeluaran"
                                    value="{{ old('tanggal_pengeluaran', $biaya->tanggal_pengeluaran) }}" required>
                                @error('tanggal_pengeluaran')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah">Jumlah <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            id="jumlah" name="jumlah" value="{{ old('jumlah', $biaya->jumlah) }}"
                                            required min="1" onchange="hitungTotal()">
                                        @error('jumlah')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="harga_satuan">Harga Satuan <span class="text-danger">*</span></label>
                                        <input type="number"
                                            class="form-control @error('harga_satuan') is-invalid @enderror"
                                            id="harga_satuan" name="harga_satuan"
                                            value="{{ old('harga_satuan', $biaya->harga_satuan) }}" required
                                            onchange="hitungTotal()">
                                        @error('harga_satuan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_biaya">Total Biaya</label>
                                <input type="text" class="form-control" id="total_biaya" readonly
                                    value="Rp {{ number_format($biaya->total_biaya, 0, ',', '.') }}">
                                <small class="text-muted">Total akan dihitung otomatis: Jumlah × Harga Satuan</small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                    rows="3">{{ old('keterangan', $biaya->keterangan) }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <a href="{{ route('biaya.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function hitungTotal() {
                const jumlah = document.getElementById('jumlah').value || 0;
                const hargaSatuan = document.getElementById('harga_satuan').value || 0;
                const total = jumlah * hargaSatuan;

                document.getElementById('total_biaya').value = 'Rp ' + total.toLocaleString('id-ID');
            }

            // Call on page load
            document.addEventListener('DOMContentLoaded', function() {
                hitungTotal();
            });
        </script>
    @endpush
@endsection
