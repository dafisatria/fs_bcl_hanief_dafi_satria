@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pemesanan</h2>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Pemesanan</label>
            <input type="date" name="tanggal_pemesanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Customer</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Detail Barang</label>
            <textarea name="detail_barang" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Pilih Armada</label>
            <select name="armada_id" class="form-control" required>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}">{{ $armada->nomor_armada }} - {{ $armada->jenis_kendaraan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection