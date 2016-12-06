<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LaporanKeuanganController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
        return view('pages.laporan_keuangan');
    }
}
