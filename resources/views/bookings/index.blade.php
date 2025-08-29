@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pemesanan Armada</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">+ Tambah Pemesanan</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pemesanan</th>
                <th>Customer</th>
                <th>Detail Barang</th>
                <th>Armada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $booking->tanggal_pemesanan }}</td>
                <td>{{ $booking->customer_name }}</td>
                <td>{{ $booking->detail_barang }}</td>
                <td>{{ $booking->armada->nomor_armada }} ({{ $booking->armada->jenis_kendaraan }})</td>
                <td>
                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
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