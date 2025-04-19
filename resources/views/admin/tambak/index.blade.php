@extends('adminlte::page')

@section('title', 'Manajemen Tambak')

@section('content_header')
    <h1>Manajemen Tambak</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Tambak</h3>
            <div class="card-tools">
                <a href="{{ route('admin.tambak.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Tambak Baru
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    {{ session('success') }}
                </div>
            @endif

            <table id="tambak-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Luas (ha)</th>
                        <th>Jenis</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tambaks as $index => $tambak)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tambak->nama }}</td>
                            <td>{{ $tambak->lokasi }}</td>
                            <td>{{ $tambak->luas }}</td>
                            <td>{{ $tambak->jenis }}</td>
                            <td>{{ \Carbon\Carbon::parse($tambak->tanggal_pembuatan)->format('d-m-Y') }}</td>
                            <td>
                                @if ($tambak->status == 'aktif')
                                    <span class="badge badge-success">Aktif</span>
                                @elseif($tambak->status == 'nonaktif')
                                    <span class="badge badge-danger">Non Aktif</span>
                                @else
                                    <span class="badge badge-warning">Maintenance</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.tambak.show', $tambak->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.tambak.edit', $tambak->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.tambak.destroy', $tambak->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tambak-table').DataTable();
        });
    </script>
@stop
