@extends('adminlte::page')

@section('title', 'Manajemen Tambak')

@section('content_header')
    <h1>Petambak</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Petambak</h4>
            <a href="{{ route('petambak.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Petambak
            </a>
        </div>
        <div class="card-body">
            @if ($petambaks->isEmpty())
                <div class="alert alert-info">
                    Belum ada data petambak. Silakan tambahkan data baru.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Email</th>
                                <th>Tanggal Registrasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petambaks as $key => $petambak)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $petambak->nama_petambak }}</td>
                                    <td>{{ $petambak->alamat }}</td>
                                    <td>{{ $petambak->nomor_telepon }}</td>
                                    <td>{{ $petambak->email ?? '-' }}</td>
                                    <td>{{ $petambak->tanggal_registrasi->format('d-m-Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $petambak->status_aktif ? 'success' : 'danger' }}">
                                            {{ $petambak->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('petambak.show', $petambak->id_petambak) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('petambak.edit', $petambak->id_petambak) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('petambak.destroy', $petambak->id_petambak) }}"
                                                method="POST" class="d-inline"
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
