@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengiriman</h2>
    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tanggal Pengiriman</label>
            <input type="date" name="tanggal_pengiriman" value="{{ $shipment->tanggal_pengiriman }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lokasi Asal</label>
            <input type="text" name="lokasi_asal" value="{{ $shipment->lokasi_asal }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lokasi Tujuan</label>
            <input type="text" name="lokasi_tujuan" value="{{ $shipment->lokasi_tujuan }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Detail Barang</label>
            <textarea name="detail_barang" class="form-control" required>{{ $shipment->detail_barang }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="tertunda" {{ $shipment->status == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                <option value="dalam_perjalanan" {{ $shipment->status == 'dalam_perjalanan' ? 'selected' : '' }}>Dalam Perjalanan</option>
                <option value="tiba" {{ $shipment->status == 'tiba' ? 'selected' : '' }}>Tiba</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Pilih Armada</label>
            <select name="armada_id" class="form-control" required>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}" {{ $shipment->armada_id == $armada->id ? 'selected' : '' }}>
                    {{ $armada->nomor_armada }} - {{ $armada->jenis_kendaraan }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection