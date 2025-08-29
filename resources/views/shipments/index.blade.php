@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengiriman</h2>
    <a href="{{ route('shipments.create') }}" class="btn btn-primary mb-3">+ Tambah Pengiriman</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Pengiriman</th>
                <th>Tanggal</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Armada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $index => $shipment)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $shipment->nomor_pengiriman }}</td>
                <td>{{ $shipment->tanggal_pengiriman }}</td>
                <td>{{ $shipment->lokasi_asal }}</td>
                <td>{{ $shipment->lokasi_tujuan }}</td>
                <td>{{ ucfirst($shipment->status) }}</td>
                <td>{{ $shipment->armada->nomor_armada }}</td>
                <td>
                    <a href="{{ route('shipments.show', $shipment->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection