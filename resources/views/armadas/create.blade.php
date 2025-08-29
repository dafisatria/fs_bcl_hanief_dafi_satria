@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Armada</h2>
    <form action="{{ route('armadas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nomor Armada</label>
            <input type="text" name="nomor_armada" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kapasitas (kg)</label>
            <input type="number" name="kapasitas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('armadas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection