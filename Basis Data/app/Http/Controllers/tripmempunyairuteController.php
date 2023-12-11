<?php

namespace App\Http\Controllers;

use App\Models\trip_mempunyai_rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tripmempunyairuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = trip_mempunyai_rute::where('ID_Trip', 'like', "%$katakunci%")
                ->orWhere('ID_Rute', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = trip_mempunyai_rute::orderBy('ID_Trip', 'desc')->paginate($jumlahbaris);
        }
        return view('trip_mempunyai_rute.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trip_mempunyai_rute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Trip', $request->ID_Trip);
        Session::flash('ID_Rute', $request->ID_Rute);

        $request->validate([
            'ID_Trip' => 'required|numeric|unique:trip,ID_Trip|exists:trip,ID_Trip',
            'ID_Rute' => 'required|unique:rute,ID_Rute|exists:rute,ID_Rute',
        ], [
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.numeric' => 'ID_Trip wajib dalam angka',
            'ID_Trip.unique' => 'ID_Trip yang diisikan sudah ada dalam database',
            'ID_Trip.exists' => 'ID_Trip tidak valid',
            'ID_Rute.required' => 'ID_Rute wajib diisi',
            'ID_Rute.unique' => 'ID_Rute yang diisikan sudah ada dalam database',
            'ID_Rute.exists' => 'ID_Rute tidak valid',
        ]);
        trip_mempunyai_rute::create($data);
        return redirect()->to('trip_mempunyai_rute')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = trip_mempunyai_rute::where('ID_Trip', $id)->first();
        return view('trip_mempunyai_rute.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Trip' => 'required|numeric|exists:trip,ID_Trip',
            'ID_Rute' => 'required|exists:rute,ID_Rute',
        ], [
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.numeric' => 'ID_Trip wajib dalam angka',
            'ID_Trip.exists' => 'ID_Trip tidak valid',
            'ID_Rute.required' => 'ID_Rute wajib diisi',
            'ID_Rute.exists' => 'ID_Rute tidak valid',
        ]);
        trip_mempunyai_rute::where('ID_Trip', $id)->update($data);
        return redirect()->to('trip_mempunyai_rute')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        trip_mempunyai_rute::where('ID_Trip', $id)->delete();
        return redirect()->to('trip_mempunyai_rute')->with('success', 'Berhasil melakukan delete data');
    }
}
