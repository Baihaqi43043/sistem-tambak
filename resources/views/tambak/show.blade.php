@extends('adminlte::page')

@section('title', 'Detail Petambak')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Detail Petambak</h4>
            <div>
                <a href="{{ route('petambak.edit', $petambak->id_petambak) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('petambak.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID Petambak</th>
                    <td>{{ $petambak->id_petambak }}</td>
                </tr>
                <tr>
                    <th>Nama Petambak</th>
                    <td>{{ $petambak->nama_petambak }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $petambak->alamat }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $petambak->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $petambak->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Registrasi</th>
                    <td>{{ $petambak->tanggal_registrasi->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-{{ $petambak->status_aktif ? 'success' : 'danger' }}">
                            {{ $petambak->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Terdaftar Pada</th>
                    <td>{{ $petambak->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $petambak->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <form action="{{ route('petambak.destroy', $petambak->id_petambak) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Hapus Petambak
                </button>
            </form>
        </div>
    </div>

    <!-- Tambahkan section ini jika tambak sudah diimplementasikan -->
    <!--
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">Daftar Tambak</h4>
        </div>
        <div class="card-body">
            @if ($petambak->tambaks->isEmpty())
                <div class="alert alert-info">
                    Belum ada data tambak untuk petambak ini.
                </div>
@else
    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tambak</th>
                                <th>Lokasi</th>
                                <th>Luas Area</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petambak->tambaks as $key => $tambak)
    <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tambak->nama_tambak }}</td>
                                    <td>{{ $tambak->lokasi }}</td>
                                    <td>{{ $tambak->luas_area }} m²</td>
                                    <td>
                                        <span class="badge bg-{{ $tambak->status === 'aktif' ? 'success' : ($tambak->status === 'perbaikan' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($tambak->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('tambak.show', $tambak->id_tambak) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
    @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="mt-3">
                <a href="{{ route('tambak.create', ['petambak_id' => $petambak->id_petambak]) }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Tambak Baru
                </a>
            </div>
        </div>
    </div>
    -->
@endsection
