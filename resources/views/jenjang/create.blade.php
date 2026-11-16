
@extends('adminlte::page')

@section('title', 'Tambah Jenjang')

@section('content_header')
    <h1>Tambah Jenjang</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Jenjang</h3>
    </div>

    <form action="{{ route('jenjang.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Kode Jenjang</label>
                <input type="text"
                    name="kode_jenjang"
                    class="form-control @error('kode_jenjang') is-invalid @enderror"
                    value="{{ old('kode_jenjang') }}"
                    placeholder="Contoh: J001"
                    required>
                @error('kode_jenjang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Jenjang</label>
                <input type="text"
                    name="nama_jenjang"
                    class="form-control @error('nama_jenjang') is-invalid @enderror"
                    value="{{ old('nama_jenjang') }}"
                    placeholder="Contoh: X, XI, XII"
                    required>
                @error('nama_jenjang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    rows="3"
                    placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@stop
