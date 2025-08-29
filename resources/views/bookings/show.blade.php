@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pemesanan</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $booking->tanggal_pemesanan }}</td>
        </tr>
        <tr>
            <th>Customer</th>
            <td>{{ $booking->customer_name }}</td>
        </tr>
        <tr>
            <th>Detail Barang</th>
            <td>{{ $booking->detail_barang }}</td>
        </tr>
        <tr>
            <th>Armada</th>
            <td>{{ $booking->armada->nomor_armada }} ({{ $booking->armada->jenis_kendaraan }})</td>
        </tr>
    </table>

    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection