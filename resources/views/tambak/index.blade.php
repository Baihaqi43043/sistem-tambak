@extends('adminlte::page')

@section('title', 'Daftar Tambak')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Tambak</h4>
            <a href="{{ route('tambak.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Tambak
            </a>
        </div>
        <div class="card-body">
            @if ($tambaks->isEmpty())
                <div class="alert alert-info">
                    Belum ada data tambak. Silakan tambahkan data baru.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tambak</th>
                                <th>Pemilik</th>
                                <th>Lokasi</th>
                                <th>Luas Area</th>
                                <th>Kedalaman</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tambaks as $key => $tambak)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tambak->nama_tambak }}</td>
                                    <td>
                                        <a href="{{ route('petambak.show', $tambak->petambak->id_petambak) }}">
                                            {{ $tambak->petambak->nama_petambak }}
                                        </a>
                                    </td>
                                    <td>{{ $tambak->lokasi }}</td>
                                    <td>{{ number_format($tambak->luas_area, 2) }} m²</td>
                                    <td>{{ number_format($tambak->kedalaman, 2) }} m</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $tambak->status == 'aktif' ? 'success' : ($tambak->status == 'perbaikan' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($tambak->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tambak.show', $tambak->id_tambak) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('tambak.edit', $tambak->id_tambak) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('tambak.destroy', $tambak->id_tambak) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
