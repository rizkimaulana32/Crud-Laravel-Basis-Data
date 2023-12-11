<?php

namespace App\Http\Controllers;

use App\Models\transportasi_publik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class transportasipublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = transportasi_publik::where('ID_Transport', 'like', "%$katakunci%")
                ->orWhere('Nama_Transport', 'like', "%$katakunci%")
                ->orWhere('Transport_Company', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = transportasi_publik::orderBy('ID_Transport', 'desc')->paginate($jumlahbaris);
        }
        return view('transportasi_publik.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transportasi_publik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Transport', $request->ID_Transport);
        Session::flash('Nama_Transport', $request->Nama_Transport);
        Session::flash('Transport_Company', $request->Transport_Company);

        $request->validate([
            'ID_Transport' => 'required|unique:transportasi_publik,ID_Transport',
            'Nama_Transport' => 'required',
            'Transport_Company' => 'required',
        ], [
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.unique' => 'ID_Transport yang diisikan sudah ada dalam database',
            'Nama_Transport.required' => 'Nama_Transport wajib diisi',
            'Transport_Company.required' => 'Transport_Company wajib diisi',
        ]);
        $data = [
            'ID_Transport' => $request->ID_Transport,
            'Nama_Transport' => $request->Nama_Transport,
            'Transport_Company' => $request->Transport_Company,
        ];
        transportasi_publik::create($data);
        return redirect()->to('transportasi_publik')->with('success', 'Berhasil menambahkan data');
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
        $data = transportasi_publik::where('ID_Transport', $id)->first();
        return view('transportasi_publik.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Transport' => 'required|unique:transportasi_publik,ID_Transport',
            'Nama_Transport' => 'required',
            'Transport_Company' => 'required',
        ], [
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.unique' => 'ID_Transport yang diisikan sudah ada dalam database',
            'Nama_Transport.required' => 'Nama_Transport wajib diisi',
            'Transport_Company.required' => 'Transport_Company wajib diisi',
        ]);
        $data = [
            'ID_Transport' => $request->ID_Transport,
            'Nama_Transport' => $request->Nama_Transport,
            'Transport_Company' => $request->Transport_Company,
        ];
        transportasi_publik::where('ID_Transport', $id)->update($data);
        return redirect()->to('transportasi_publik')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        transportasi_publik::where('ID_Transport', $id)->delete();
        return redirect()->to('transportasi_publik')->with('success', 'Berhasil melakukan delete data');
    }
}
