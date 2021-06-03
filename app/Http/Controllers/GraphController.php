<?php

namespace App\Http\Controllers;

use App\Pembangunan;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    /**
     * Show pembangunan graph
     *
     * @return \Illuminate\View\View
     */
    public function graphPembangunan()
    {
        return view('pembangunan.graph');
    }
    public function graphPengguna()
    {
        return view('pengguna.grafik');
    }
    /**
     * Json for graph
     *
     * @return mixed
     */
    public function graphPembangunanJson()
    {
        $data = Pembangunan::selectRaw("tahun, COUNT(1) AS total")
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->groupBy('tahun')
                            ->get();

        return response()->json($data);
    }
    public function graphPenggunaJson()
    {
        $data = Pembangunan::selectRaw("tahun, COUNT(1) AS total")
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->groupBy('tahun')
                            ->get();

        return response()->json($data);
    }
}
