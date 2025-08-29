@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Armada</h2>
    <a href="{{ route('armadas.create') }}" class="btn btn-primary mb-3">+ Tambah Armada</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('armadas.index') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <select name="jenis" class="form-control">
                <option value="">-- Semua Jenis --</option>
                @foreach($jenisList as $jenis)
                <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="ketersediaan" class="form-control">
                <option value="">-- Semua Status --</option>
                <option value="1" {{ request('ketersediaan') == '1' ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ request('ketersediaan') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Armada</th>
                <th>Jenis Kendaraan</th>
                <th>Kapasitas</th>
                <th>Ketersediaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($armadas as $index => $armada)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $armada->nomor_armada }}</td>
                <td>{{ $armada->jenis_kendaraan }}</td>
                <td>{{ $armada->kapasitas }} kg</td>
                <td>{{ $armada->ketersediaan ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                <td>
                    <a href="{{ route('armadas.edit', $armada->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('armadas.destroy', $armada->id) }}" method="POST" style="display:inline;">
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