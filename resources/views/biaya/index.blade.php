@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Biaya</h5>
                        <a href="{{ route('biaya.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Biaya
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Siklus</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Biaya</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($biayas as $key => $biaya)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $biaya->siklusBudidaya->catatan ?? 'N/A' }}</td>
                                            <td>{{ $biaya->kategoriBiaya->nama_kategori ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($biaya->tanggal_pengeluaran)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $biaya->jumlah }}</td>
                                            <td>Rp {{ number_format($biaya->harga_satuan, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($biaya->total_biaya, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('biaya.show', $biaya->id_biaya) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('biaya.edit', $biaya->id_biaya) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('biaya.destroy', $biaya->id_biaya) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data biaya</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
