<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armadas = Armada::all();
        return view('armadas.index', compact('armadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('armadas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_armada' => 'required|unique:armadas',
            'jenis_kendaraan' => 'required',
            'kapasitas' => 'required|integer|min:1',
        ]);

        Armada::create($request->all());

        return redirect()->route('armadas.index')->with('success', 'Armada berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Armada $armada)
    {
        return view('armadas.edit', compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Armada $armada)
    {
        $request->validate([
            'nomor_armada' => 'required|unique:armadas,nomor_armada,' . $armada->id,
            'jenis_kendaraan' => 'required',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $armada->update($request->all());

        return redirect()->route('armadas.index')->with('success', 'Armada berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Armada $armada)
    {
        $armada->delete();
        return redirect()->route('armadas.index')->with('success', 'Armada berhasil dihapus!');
    }
}
