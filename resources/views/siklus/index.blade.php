@extends('adminlte::page')

@section('title', 'Daftar Siklus Budidaya')

@section('content')
    <div class="container">
        <!-- Form Pencarian -->
        <form class="mb-4" action="{{ route('siklus.index') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" value="{{ request()->query('search') }}"
                        placeholder="Cari berdasarkan Tambak, Jenis Budidaya, atau Spesies">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>

        <!-- Button Tambah -->
        <a href="{{ route('siklus.create') }}" class="btn btn-success mb-4">Tambah Siklus Budidaya</a>

        <!-- Tabel Daftar Siklus Budidaya -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Siklus</th>
                    <th>Tambak</th>
                    <th>Jenis Budidaya</th>
                    <th>Spesies</th>
                    <th>Tanggal Mulai</th>
                    <th>Status Siklus</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siklusBudidaya as $siklus)
                    <tr>
                        <td>{{ $siklus->id_siklus }}</td>
                        <td>{{ $siklus->tambak->nama_tambak }}</td>
                        <td>{{ ucfirst($siklus->jenis_budidaya) }}</td>
                        <td>{{ $siklus->spesies }}</td>
                        <td>{{ \Carbon\Carbon::parse($siklus->tanggal_mulai)->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($siklus->status_siklus) }}</td>
                        <td>
                            <a href="{{ route('siklus.show', $siklus->id_siklus) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('siklus.edit', $siklus->id_siklus) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('siklus.destroy', $siklus->id_siklus) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {!! $siklusBudidaya->links() !!}
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.querySelectorAll('.btn-danger').forEach(function(button) {
            button.addEventListener('click', function(event) {
                if (!confirm('Apakah Anda yakin ingin menghapus Siklus Budidaya ini?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
