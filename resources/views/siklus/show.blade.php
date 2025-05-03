@extends('adminlte::page')

@section('title', 'Detail Siklus Budidaya')

@section('content')
    <div class="container">
        <div class="form-group">
            <label>Tambak</label>
            <p>{{ $siklusBudidaya->tambak->nama_tambak }}</p>
        </div>
        <div class="form-group">
            <label>Jenis Budidaya</label>
            <p>{{ $siklusBudidaya->jenis_budidaya }}</p>
        </div>
        <div class="form-group">
            <label>Spesies</label>
            <p>{{ $siklusBudidaya->spesies }}</p>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <p>{{ $siklusBudidaya->tanggal_mulai }}</p>
        </div>
        <div class="form-group">
            <label>Status Siklus</label>
            <p>{{ $siklusBudidaya->status_siklus }}</p>
        </div>
        <div class="form-group">
            <label>Catatan</label>
            <p>{{ $siklusBudidaya->catatan }}</p>
        </div>

        <a href="{{ route('siklus.edit', $siklusBudidaya->id_siklus) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('siklus.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
