<?php

namespace App\Http\Controllers;

use App\Models\rute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ruteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = rute::where('ID_Rute', 'like', "%$katakunci%")
                ->orWhere('Nama_Rute', 'like', "%$katakunci%")
                ->orWhere('Waktu_Berangkat', 'like', "%$katakunci%")
                ->orWhere('Waktu_Tiba', 'like', "%$katakunci%")
                ->orWhere('ID_Transport', 'like', "%$katakunci%")
                ->orWhere('IDLokasi_berangkat_ke', 'like', "%$katakunci%")
                ->orWhere('IDLokasi_berangkat_dari', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = rute::orderBy('ID_Rute', 'desc')->paginate($jumlahbaris);
        }
        return view('rute.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Rute', $request->ID_Rute);
        Session::flash('Nama_Rute', $request->Nama_Rute);
        Session::flash('Waktu_Berangkat', $request->Waktu_Berangkat);
        Session::flash('Waktu_Tiba', $request->Waktu_Tiba);
        Session::flash('ID_Transport', $request->ID_Transport);
        Session::flash('IDLokasi_berangkat_ke', $request->IDLokasi_berangkat_ke);
        Session::flash('IDLokasi_berangkat_dari', $request->IDLokasi_berangkat_dari);

        $request->validate([
            'ID_Rute' => 'required|unique:rute,ID_Rute',
            'Nama_Rute' => 'required',
            'Waktu_Berangkat' => 'required',
            'Waktu_Tiba' => 'required',
            'ID_Transport' => 'required|exists:transportasi_publik,ID_Transport',
            'IDLokasi_berangkat_ke' => 'required|exists:lokasi,ID_Lokasi',
            'IDLokasi_berangkat_dari' => 'required|exists:lokasi,ID_Lokasi',
        ], [
            'ID_Rute.required' => 'ID_Rute wajib diisi',
            'ID_Rute.unique' => 'ID_Rute yang diisikan sudah ada dalam database',
            'Nama_Rute.required' => 'Nama_Rute wajib diisi',
            'Waktu_Berangkat.required' => 'Waktu_Berangkat wajib diisi',
            'Waktu_Tiba.required' => 'Waktu_Tiba wajib diisi',
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.exists' => 'ID_Transport tidak valid',
            'IDLokasi_berangkat_ke.required' => 'IDLokasi_berangkat_ke wajib diisi',
            'IDLokasi_berangkat_ke.exists' => 'IDLokasi_berangkat_ke tidak valid',
            'IDLokasi_berangkat_dari.required' => 'IDLokasi_berangkat_dari wajib diisi',
            'IDLokasi_berangkat_dari.exists' => 'IDLokasi_berangkat_dari tidak valid',
        ]);
        $data = [
            'ID_Rute' => $request->ID_Rute,
            'Nama_Rute' => $request->Nama_Rute,
            'Waktu_Berangkat' => $request->Waktu_Berangkat,
            'Waktu_Tiba' => $request->Waktu_Tiba,
            'ID_Transport' => $request->ID_Transport,
            'IDLokasi_berangkat_ke' => $request->IDLokasi_berangkat_ke,
            'IDLokasi_berangkat_dari' => $request->IDLokasi_berangkat_dari,
        ];
        rute::create($data);
        return redirect()->to('rute')->with('success', 'Berhasil menambahkan data');
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
        $data = rute::where('ID_Rute', $id)->first();
        return view('rute.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Rute' => [
                'required',
                Rule::unique('rute')->ignore($id, 'ID_Rute'),
            ],
            'Nama_Rute' => 'required',
            'Waktu_Berangkat' => 'required',
            'Waktu_Tiba' => 'required',
            'ID_Transport' => 'required|exists:transportasi_publik,ID_Transport',
            'IDLokasi_berangkat_ke' => 'required|exists:lokasi,ID_Lokasi',
            'IDLokasi_berangkat_dari' => 'required|exists:lokasi,ID_Lokasi',
        ], [
            'ID_Rute.required' => 'ID_Rute wajib diisi',
            'ID_Rute.unique' => 'ID_Rute yang diisikan sudah ada dalam database',
            'Nama_Rute.required' => 'Nama_Rute wajib diisi',
            'Waktu_Berangkat.required' => 'Waktu_Berangkat wajib diisi',
            'Waktu_Tiba.required' => 'Waktu_Tiba wajib diisi',
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.exists' => 'ID_Transport tidak valid',
            'IDLokasi_berangkat_ke.required' => 'IDLokasi_berangkat_ke wajib diisi',
            'IDLokasi_berangkat_ke.exists' => 'IDLokasi_berangkat_ke tidak valid',
            'IDLokasi_berangkat_dari.required' => 'IDLokasi_berangkat_dari wajib diisi',
            'IDLokasi_berangkat_dari.exists' => 'IDLokasi_berangkat_dari tidak valid',
        ]);
        $data = [
            'ID_Rute' => $request->ID_Rute,
            'Nama_Rute' => $request->Nama_Rute,
            'Waktu_Berangkat' => $request->Waktu_Berangkat,
            'Waktu_Tiba' => $request->Waktu_Tiba,
            'ID_Transport' => $request->ID_Transport,
            'IDLokasi_berangkat_ke' => $request->IDLokasi_berangkat_ke,
            'IDLokasi_berangkat_dari' => $request->IDLokasi_berangkat_dari,
        ];
        rute::where('ID_Rute', $id)->update($data);
        return redirect()->to('rute')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rute::where('ID_Rute', $id)->delete();
        return redirect()->to('rute')->with('success', 'Berhasil melakukan delete data');
    }
}
