@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pemesanan</h2>
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal Pemesanan</label>
            <input type="date" name="tanggal_pemesanan" value="{{ $booking->tanggal_pemesanan }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Customer</label>
            <input type="text" name="customer_name" value="{{ $booking->customer_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Detail Barang</label>
            <textarea name="detail_barang" class="form-control" required>{{ $booking->detail_barang }}</textarea>
        </div>
        <div class="mb-3">
            <label>Pilih Armada</label>
            <select name="armada_id" class="form-control" required>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}" {{ $booking->armada_id == $armada->id ? 'selected' : '' }}>
                    {{ $armada->nomor_armada }} - {{ $armada->jenis_kendaraan }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection