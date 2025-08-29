@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Armada</h2>
    <form action="{{ route('armadas.update', $armada->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nomor Armada</label>
            <input type="text" name="nomor_armada" value="{{ $armada->nomor_armada }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" value="{{ $armada->jenis_kendaraan }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kapasitas (kg)</label>
            <input type="number" name="kapasitas" value="{{ $armada->kapasitas }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ketersediaan</label>
            <select name="ketersediaan" class="form-control">
                <option value="1" {{ $armada->ketersediaan ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ !$armada->ketersediaan ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('armadas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection