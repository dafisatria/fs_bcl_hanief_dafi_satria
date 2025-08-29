<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function shipments()
    {
        $data = DB::table('shipments')
            ->join('armadas', 'shipments.armada_id', '=', 'armadas.id')
            ->select('armadas.nomor_armada', 'armadas.jenis_kendaraan',
                DB::raw('COUNT(shipments.id) as total_pengiriman'))
            ->where('shipments.status', 'dalam_perjalanan')
            ->groupBy('armadas.nomor_armada', 'armadas.jenis_kendaraan')
            ->get();

        return view('reports.shipments', compact('data'));
    }
}
