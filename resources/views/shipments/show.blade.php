@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pengiriman</h2>

    <table class="table table-bordered">
        <tr>
            <th>Nomor Pengiriman</th>
            <td>{{ $shipment->nomor_pengiriman }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $shipment->tanggal_pengiriman }}</td>
        </tr>
        <tr>
            <th>Asal</th>
            <td>{{ $shipment->lokasi_asal }}</td>
        </tr>
        <tr>
            <th>Tujuan</th>
            <td>{{ $shipment->lokasi_tujuan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($shipment->status) }}</td>
        </tr>
        <tr>
            <th>Detail Barang</th>
            <td>{{ $shipment->detail_barang }}</td>
        </tr>
        <tr>
            <th>Armada</th>
            <td>{{ $shipment->armada->nomor_armada }} ({{ $shipment->armada->jenis_kendaraan }})</td>
        </tr>
    </table>

    <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection