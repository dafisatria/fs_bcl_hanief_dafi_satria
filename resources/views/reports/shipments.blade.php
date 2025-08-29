@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Pengiriman (Sedang Dalam Perjalanan)</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Armada</th>
                <th>Jenis Kendaraan</th>
                <th>Jumlah Pengiriman Dalam Perjalanan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $row)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $row->nomor_armada }}</td>
                <td>{{ $row->jenis_kendaraan }}</td>
                <td>{{ $row->total_pengiriman }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection