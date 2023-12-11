<?php

namespace App\Http\Controllers;

use App\Models\kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class kotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = kota::where('ID_Kota', 'like', "%$katakunci%")
                ->orWhere('Nama_Kota', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = kota::orderBy('ID_Kota', 'desc')->paginate($jumlahbaris);
        }
        return view('kota.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Kota', $request->ID_Kota);
        Session::flash('Nama_Kota', $request->Nama_Kota);

        $request->validate([
            'ID_Kota' => 'required|unique:kota,ID_Kota',
            'Nama_Kota' => 'required',
        ], [
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.unique' => 'ID_Kota yang diisikan sudah ada dalam database',
            'Nama_Kota.required' => 'Nama_Kota wajib diisi',
        ]);
        $data = [
            'ID_Kota' => $request->ID_Kota,
            'Nama_Kota' => $request->Nama_Kota,
        ];
        kota::create($data);
        return redirect()->to('kota')->with('success', 'Berhasil menambahkan data');
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
        $data = kota::where('ID_Kota', $id)->first();
        return view('kota.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Kota' => 'required|unique:kota,ID_Kota',
            'Nama_Kota' => 'required',
        ], [
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.unique' => 'ID_Kota yang diisikan sudah ada dalam database',
            'Nama_Kota.required' => 'Nama_Kota wajib diisi',
        ]);
        $data = [
            'ID_Kota' => $request->ID_Kota,
            'Nama_Kota' => $request->Nama_Kota,
        ];
        kota::where('ID_Kota', $id)->update($data);
        return redirect()->to('kota')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kota::where('ID_Kota', $id)->delete();
        return redirect()->to('kota')->with('success', 'Berhasil melakukan delete data');
    }
}
