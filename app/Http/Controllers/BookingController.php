<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Armada;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('armada')->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $armadas = Armada::where('ketersediaan', true)->get();
        return view('bookings.create', compact('armadas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date|after_or_equal:today',
            'customer_name' => 'required|string|max:100',
            'detail_barang' => 'required',
            'armada_id' => 'required|exists:armadas,id',
        ]);

        Booking::create($request->all());

        $armada = Armada::find($request->armada_id);
        $armada->update(['ketersediaan' => false]);

        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $armadas = Armada::all();
        return view('bookings.edit', compact('booking', 'armadas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date|after_or_equal:today',
            'customer_name' => 'required|string|max:100',
            'detail_barang' => 'required',
            'armada_id' => 'required|exists:armadas,id',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dihapus!');
    }
}
