<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class lokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = lokasi::where('ID_Lokasi', 'like', "%$katakunci%")
                ->orWhere('Jenis_Lokasi', 'like', "%$katakunci%")
                ->orWhere('Nama_Lokasi', 'like', "%$katakunci%")
                ->orWhere('ID_Kota', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = lokasi::orderBy('ID_Lokasi', 'desc')->paginate($jumlahbaris);
        }
        return view('lokasi.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Lokasi', $request->ID_Lokasi);
        Session::flash('Jenis_Lokasi', $request->Jenis_Lokasi);
        Session::flash('Nama_Lokasi', $request->Nama_Lokasi);
        Session::flash('ID_Kota', $request->ID_Kota);

        $request->validate([
            'ID_Lokasi' => 'required|unique:lokasi,ID_Lokasi',
            'Jenis_Lokasi' => 'required',
            'Nama_Lokasi' => 'required',
            'ID_Kota' => 'required|exists:kota,ID_Kota',
        ], [
            'ID_Lokasi.required' => 'ID_Lokasi wajib diisi',
            'ID_Lokasi.unique' => 'ID_Lokasi yang diisikan sudah ada dalam database',
            'Jenis_Lokasi.required' => 'Jenis_Lokasi wajib diisi',
            'Nama_Lokasi.required' => 'Nama_Lokasi wajib diisi',
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.exists' => 'ID_Kota tidak valid',
        ]);
        $data = [
            'ID_Lokasi' => $request->ID_Lokasi,
            'Jenis_Lokasi' => $request->Jenis_Lokasi,
            'Nama_Lokasi' => $request->Nama_Lokasi,
            'ID_Kota' => $request->ID_Kota,
        ];
        lokasi::create($data);
        return redirect()->to('lokasi')->with('success', 'Berhasil menambahkan data');
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
        $data = lokasi::where('ID_Lokasi', $id)->first();
        return view('lokasi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Lokasi' => [
                'required',
                Rule::unique('lokasi')->ignore($id, 'ID_Lokasi'),
            ],
            'Jenis_Lokasi' => 'required',
            'Nama_Lokasi' => 'required',
            'ID_Kota' => 'required|exists:kota,ID_Kota',
        ], [
            'ID_Lokasi.required' => 'ID_Lokasi wajib diisi',
            'ID_Lokasi.unique' => 'ID_Lokasi yang diisikan sudah ada dalam database',
            'Jenis_Lokasi.required' => 'Jenis_Lokasi wajib diisi',
            'Nama_Lokasi.required' => 'Nama_Lokasi wajib diisi',
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.exists' => 'ID_Kota tidak valid',
        ]);
        $data = [
            'ID_Lokasi' => $request->ID_Lokasi,
            'Jenis_Lokasi' => $request->Jenis_Lokasi,
            'Nama_Lokasi' => $request->Nama_Lokasi,
            'ID_Kota' => $request->ID_Kota,
        ];
        lokasi::where('ID_Lokasi', $id)->update($data);
        return redirect()->to('lokasi')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        lokasi::where('ID_Lokasi', $id)->delete();
        return redirect()->to('lokasi')->with('success', 'Berhasil melakukan delete data');
    }
}
