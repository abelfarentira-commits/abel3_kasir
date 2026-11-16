@extends('adminlte::page')

@section('title', 'Detail Jenjang')

@section('content_header')
    <h1>Detail Jenjang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">

                {{-- KOLOM KANAN: DATA --}}
                <div class="col-md-8">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Kode Jenjang</th>
                            <td>{{ $jenjang->kode_jenjang }}</td>
                        </tr>
                        <tr>
                            <th style="width: 200px">Nama Jenjang</th>
                            <td>{{ $jenjang->nama_jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jenjang->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $jenjang->status }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar Pada</th>
                            <td>{{ $jenjang->created_at->format('d F Y') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('jenjang.edit', $jenjang->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
