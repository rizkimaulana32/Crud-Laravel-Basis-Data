<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transportasi_publik;
use App\Models\kota;
use App\Models\user;
use App\Models\rute;
use App\Models\trip;
use App\Models\trip_mempunyai_rute;
use App\Models\tiket;
use App\Models\lokasi;


class queryController extends Controller
{
    public function index () {
        $data = transportasi_publik::join('tiket', 'transportasi_publik.ID_Transport', '=', 'tiket.ID_Transport')
        ->select('Nama_Transport', 'Transport_Company', DB::raw('COUNT(*) AS Total_Penjualan'))
        ->groupBy('Nama_Transport', 'Transport_Company')
        ->orderBy('Total_Penjualan', 'DESC')
        ->limit(3)
        ->get();

        // Return the view with the data
        return view('query.index')->with('data', $data);
    }

}

// ->join('tabel_dua', 'tabel_satu.id', '=', 'tabel_dua.tabel_satu_id')
// ->select('tabel_satu.*', 'tabel_dua.field_satu', 'tabel_dua.field_dua')
// ->get();

// ->where('kolom', 'operator', 'nilai')
// ->where('usia', '>', 18)

// ->orderBy('kolom', 'asc/desc')
// ->orderBy('nama', 'asc')

// ->groupBy('kolom')
// ->groupBy('jenis')

// ->having('agregat', 'operator', 'nilai')
// ->having('COUNT(kolom)', '>', 5)

// ->limit(10)
