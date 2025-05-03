@extends('adminlte::page')

@section('title', 'Tambah Biaya')

@section('content_header')
    <h1>Tambah Biaya</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Tambah Biaya</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('biaya.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="id_siklus">Pilih Siklus <span class="text-danger">*</span></label>
                                <select class="form-control @error('id_siklus') is-invalid @enderror" id="id_siklus"
                                    name="id_siklus" required>
                                    <option value="">-- Pilih Siklus --</option>
                                    @foreach ($siklus as $s)
                                        <option value="{{ $s->id_siklus }}"
                                            {{ old('id_siklus', $biaya->id_siklus ?? '') == $s->id_siklus ? 'selected' : '' }}>
                                            {{ $s->id_siklus }} - {{ $s->spesies }}
                                            ({{ \Carbon\Carbon::parse($s->tanggal_mulai)->format('d-m-Y') }})
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
                                            {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
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
                                    value="{{ old('tanggal_pengeluaran') ?? date('Y-m-d') }}" required>
                                @error('tanggal_pengeluaran')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jumlah">Jumlah <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required
                                            min="1">
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
                                            id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}"
                                            required>
                                        @error('harga_satuan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_biaya_display">Total Biaya</label>
                                <input type="text" class="form-control" id="total_biaya_display" readonly>
                                <small class="text-muted">Total akan dihitung otomatis: Jumlah × Harga Satuan</small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                    rows="3">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="total_biaya" id="total_biaya_hidden">

                            <div class="form-group d-flex justify-content-between">
                                <a href="{{ route('biaya.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        // Fungsi untuk menghitung total biaya
        function hitungTotal() {
            const jumlah = parseInt(document.getElementById('jumlah').value || 0);
            const hargaSatuan = parseFloat(document.getElementById('harga_satuan').value || 0);
            const total = jumlah * hargaSatuan;

            // Format dengan pemisah ribuan untuk tampilan
            document.getElementById('total_biaya_display').value = 'Rp ' + total.toLocaleString('id-ID');

            // Simpan nilai numerik asli untuk form submission
            document.getElementById('total_biaya_hidden').value = total;
        }

        // Event listener saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener untuk input
            const jumlahInput = document.getElementById('jumlah');
            const hargaInput = document.getElementById('harga_satuan');

            jumlahInput.addEventListener('input', hitungTotal);
            jumlahInput.addEventListener('change', hitungTotal);

            hargaInput.addEventListener('input', hitungTotal);
            hargaInput.addEventListener('change', hitungTotal);

            // Hitung total awal
            hitungTotal();
        });
    </script>
@stop
