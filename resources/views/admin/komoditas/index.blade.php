@extends('adminlte::page')

@section('title', 'Manajemen Komoditas')

@section('content_header')
    <h1>Manajemen Komoditas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Komoditas</h3>
            <div class="card-tools">
                <a href="{{ route('admin.komoditas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Komoditas
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

            <table id="komoditas-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komoditas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if ($item->jenis == 'ikan')
                                    <span class="badge badge-primary">Ikan</span>
                                @elseif($item->jenis == 'udang')
                                    <span class="badge badge-success">Udang</span>
                                @elseif($item->jenis == 'kepiting')
                                    <span class="badge badge-warning">Kepiting</span>
                                @else
                                    <span class="badge badge-info">{{ $item->jenis }}</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="{{ route('admin.komoditas.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.komoditas.destroy', $item->id) }}" method="POST"
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

@section('js')
    <script>
        $(document).ready(function() {
            $('#komoditas-table').DataTable();
        });
    </script>
@stop
