@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Detail Kategori Biaya</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID Kategori</th>
                                <td>{{ $kategoribiaya->id_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Nama Kategori</th>
                                <td>{{ $kategoribiaya->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $kategoribiaya->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat pada</th>
                                <td>{{ $kategoribiaya->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui pada</th>
                                <td>{{ $kategoribiaya->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('kategori-biaya.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('kategori-biaya.edit', $kategoribiaya->id_kategori) }}"
                                class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
