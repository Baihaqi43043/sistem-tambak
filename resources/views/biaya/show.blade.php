@extends('adminlte::page')

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Detail Biaya</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID Biaya</th>
                                <td>{{ $biaya->id_biaya }}</td>
                            </tr>
                            <tr>
                                <th>Siklus</th>
                                <td>{{ $biaya->siklus->nama_siklus ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Biaya</th>
                                <td>{{ $biaya->kategoriBiaya->nama_kategori ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengeluaran</th>
                                <td>{{ \Carbon\Carbon::parse($biaya->tanggal_pengeluaran)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $biaya->jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Harga Satuan</th>
                                <td>Rp {{ number_format($biaya->harga_satuan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Biaya</th>
                                <td>Rp {{ number_format($biaya->total_biaya, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $biaya->keterangan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat pada</th>
                                <td>{{ $biaya->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui pada</th>
                                <td>{{ $biaya->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('biaya.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('biaya.edit', $biaya->id_biaya) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
