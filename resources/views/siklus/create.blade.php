@extends('adminlte::page')

@section('title', 'Tambah Siklus Budidaya')

@section('content')
    <style>
        /* Gaya untuk container Select2 */
        .select2-container .select2-selection--multiple {
            background-color: #f0f8ff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            color: #333;
        }

        /* Gaya untuk opsi yang dipilih dalam Select2 */
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #007bff !important;
            color: white !important;
        }

        /* Gaya untuk opsi ketika hover */
        .select2-container--default .select2-results__option:hover {
            background-color: #d1e7fd;
            color: #007bff;
        }

        /* Gaya untuk tombol clear di dropdown Select2 */
        .select2-selection__clear {
            color: #007bff;
            font-weight: bold;
        }

        .text-danger {
            font-size: 13px;
            font-weight: bold;
            color: #e53e3e;
        }
    </style>

    <div class="container">
        <form action="{{ route('siklus.store') }}" method="POST">
            @csrf

            <!-- Single select untuk "Tambak" -->
            <div class="form-group">
                <label for="id_tambak">Tambak</label>
                <select name="id_tambak" id="id_tambak" class="form-control" required>
                    <option value="">Pilih Tambak</option>
                    @foreach ($tambaks as $tambak)
                        <option value="{{ $tambak->id_tambak }}"
                            {{ old('id_tambak') == $tambak->id_tambak ? 'selected' : '' }}>
                            {{ $tambak->nama_tambak }}
                        </option>
                    @endforeach
                </select>
                @error('id_tambak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Multi-select untuk "Tambak" menggunakan Select2 -->
            <div class="form-group">
                <label for="id_tambak_multi">Tambak</label>
                <select name="id_tambak[]" id="id_tambak_multi" class="form-control" multiple="multiple">
                    @foreach ($tambaks as $tambak)
                        <option value="{{ $tambak->id_tambak }}"
                            {{ collect(old('id_tambak'))->contains($tambak->id_tambak) ? 'selected' : '' }}>
                            {{ $tambak->nama_tambak }}
                        </option>
                    @endforeach
                </select>
                @error('id_tambak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Jenis Budidaya -->
            <div class="form-group">
                <label for="jenis_budidaya">Jenis Budidaya</label>
                <select name="jenis_budidaya" id="jenis_budidaya" class="form-control" required>
                    <option value="udang" {{ old('jenis_budidaya') == 'udang' ? 'selected' : '' }}>Udang</option>
                    <option value="ikan" {{ old('jenis_budidaya') == 'ikan' ? 'selected' : '' }}>Ikan</option>
                </select>
                @error('jenis_budidaya')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Spesies -->
            <div class="form-group">
                <label for="spesies">Spesies</label>
                <input type="text" name="spesies" id="spesies" class="form-control" value="{{ old('spesies') }}"
                    required>
                @error('spesies')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Tanggal Mulai -->
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                    value="{{ old('tanggal_mulai') }}" required>
                @error('tanggal_mulai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Jumlah Tebar -->
            <div class="form-group">
                <label for="jumlah_tebar">Jumlah Tebar</label>
                <input type="number" name="jumlah_tebar" id="jumlah_tebar" class="form-control"
                    value="{{ old('jumlah_tebar') }}" required>
                @error('jumlah_tebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Status Siklus -->
            <div class="form-group">
                <label for="status_siklus">Status Siklus</label>
                <select name="status_siklus" id="status_siklus" class="form-control" required>
                    <option value="aktif" {{ old('status_siklus') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ old('status_siklus') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status_siklus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Catatan -->
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection

@section('js')
    <!-- jQuery (harus di-load sebelum Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS dan JS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Inisialisasi Select2 -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen dengan id #id_tambak_multi
            $('#id_tambak_multi').select2({
                placeholder: "Pilih Tambak",
                allowClear: true
            });
        });
    </script>
@endsection
