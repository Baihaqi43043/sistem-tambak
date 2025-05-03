@extends('adminlte::page')

@section('title', 'Daftar Panen')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('panen.create') }}" class="btn btn-primary mb-3">Tambah Panen</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Panen</th>
                    <th>ID Siklus</th>
                    <th>Tanggal Panen</th>
                    <th>Total Harga</th>
                    <th>Berat Total (kg)</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $panen)
                    <tr>
                        <td>{{ $panen->id_panen }}</td>
                        <td>{{ $panen->id_siklus }}</td>
                        <td>{{ $panen->tanggal_panen }}</td>
                        <td>Rp {{ number_format($panen->harga, 0, ',', '.') }}</td>
                        <td>{{ $panen->berat_total ?? '-' }}</td>
                        <td>{{ $panen->catatan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('panen.edit', $panen->id_panen) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('panen.destroy', $panen->id_panen) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Tidak ada data panen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
