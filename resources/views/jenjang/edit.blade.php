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
                <label for="nama_jenjang">Nama Jenjang</label>
                <input
                    type="text"
                    name="nama_jenjang"
                    id="nama_jenjang"
                    class="form-control @error('nama_jenjang') is-invalid @enderror"
                    value="{{ old('nama_jenjang') }}"
                    placeholder="Contoh: X, XI, XII"
                    required
                >

                @error('nama_jenjang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea
                    name="keterangan"
                    id="keterangan"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    rows="3"
                    placeholder="Masukkan keterangan (opsional)"
                >{{ old('keterangan') }}</textarea>

                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
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
