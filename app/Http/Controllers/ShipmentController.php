<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Armada;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Shipment::with('armada');

        if ($request->filled('search')) {
            $query->where('nomor_pengiriman', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi_tujuan', 'like', '%' . $request->lokasi . '%');
        }

        $shipments = $query->get();

        return view('shipments.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $armadas = Armada::where('ketersediaan', true)->get();
        return view('shipments.create', compact('armadas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengiriman' => 'required|date|after_or_equal:today',
            'lokasi_asal' => 'required',
            'lokasi_tujuan' => 'required',
            'detail_barang' => 'required',
            'armada_id' => 'required|exists:armadas,id',
        ]);

        Shipment::create($request->all());

        $armada = Armada::find($request->armada_id);
        $armada->update(['ketersediaan' => false]);

        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        $armadas = Armada::all();
        return view('shipments.edit', compact('shipment', 'armadas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'tanggal_pengiriman' => 'required|date|after_or_equal:today',
            'lokasi_asal' => 'required',
            'lokasi_tujuan' => 'required',
            'detail_barang' => 'required',
            'status' => 'required|in:tertunda,dalam_perjalanan,tiba',
            'armada_id' => 'required|exists:armadas,id',
        ]);

        $shipment->update($request->all());

        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('shipments.index')->with('success', 'Pengiriman berhasil dihapus!');
    }
}
