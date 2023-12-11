<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = tiket::where('ID_Tiket', 'like', "%$katakunci%")
                ->orWhere('Harga', 'like', "%$katakunci%")
                ->orWhere('Jadwal_Berangkat', 'like', "%$katakunci%")
                ->orWhere('Tgl_Beli', 'like', "%$katakunci%")
                ->orWhere('ID_Transport', 'like', "%$katakunci%")
                ->orWhere('ID_Trip', 'like', "%$katakunci%")
                ->orWhere('ID_User', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = tiket::orderBy('ID_Tiket', 'desc')->paginate($jumlahbaris);
        }
        return view('tiket.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Tiket', $request->ID_Tiket);
        Session::flash('Harga', $request->Harga);
        Session::flash('Jadwal_Berangkat', $request->Jadwal_Berangkat);
        Session::flash('Tgl_Beli', $request->Tgl_Beli);
        Session::flash('ID_Transport', $request->ID_Transport);
        Session::flash('ID_Trip', $request->ID_Transport);
        Session::flash('ID_User', $request->ID_Transport);

        $request->validate([
            'ID_Tiket' => 'required|unique:tiket,ID_Tiket',
            'Harga' => 'required',
            'Jadwal_Berangkat' => 'required',
            'Tgl_Beli' => 'required',
            'ID_Transport' => 'required|exists:transportasi_publik,ID_Transport',
            'ID_Trip' => 'required|exists:trip,ID_Trip',
            'ID_User' => 'required|exists:user,ID_User',
        ], [
            'ID_Tiket.required' => 'ID_Tiket wajib diisi',
            'ID_Tiket.unique' => 'ID_Tiket yang diisikan sudah ada dalam database',
            'Harga.required' => 'Harga wajib diisi',
            'Jadwal_Berangkat.required' => 'Jadwal_Berangkat wajib diisi',
            'Tgl_Beli.required' => 'Tgl_Beli wajib diisi',
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.exists' => 'ID_Transport tidak valid',
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.exists' => 'ID_Trip tidak valid',
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.exists' => 'ID_User tidak valid',
        ]);
        $data = [
            'ID_Tiket' => $request->ID_Tiket,
            'Harga' => $request->Harga,
            'Jadwal_Berangkat' => $request->Jadwal_Berangkat,
            'Tgl_Beli' => $request->Tgl_Beli,
            'ID_Transport' => $request->ID_Transport,
            'ID_Trip' => $request->ID_Trip,
            'ID_User' => $request->ID_User,
        ];
        tiket::create($data);
        return redirect()->to('tiket')->with('success', 'Berhasil menambahkan data');
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
        $data = tiket::where('ID_Tiket', $id)->first();
        return view('tiket.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Tiket' => 'required|unique:tiket,ID_Tiket',
            'Harga' => 'required',
            'Jadwal_Berangkat' => 'required',
            'Tgl_Beli' => 'required',
            'ID_Transport' => 'required|exists:transportasi_publik,ID_Transport',
            'ID_Trip' => 'required|exists:trip,ID_Trip',
            'ID_User' => 'required|exists:user,ID_User',
        ], [
            'ID_Tiket.required' => 'ID_Tiket wajib diisi',
            'ID_Tiket.unique' => 'ID_Tiket yang diisikan sudah ada dalam database',
            'Harga.required' => 'Harga wajib diisi',
            'Jadwal_Berangkat.required' => 'Jadwal_Berangkat wajib diisi',
            'Tgl_Beli.required' => 'Tgl_Beli wajib diisi',
            'ID_Transport.required' => 'ID_Transport wajib diisi',
            'ID_Transport.exists' => 'ID_Transport tidak valid',
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.exists' => 'ID_Trip tidak valid',
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.exists' => 'ID_User tidak valid',
        ]);
        $data = [
            'ID_Tiket' => $request->ID_Tiket,
            'Harga' => $request->Harga,
            'Jadwal_Berangkat' => $request->Jadwal_Berangkat,
            'Tgl_Beli' => $request->Tgl_Beli,
            'ID_Transport' => $request->ID_Transport,
            'ID_Trip' => $request->ID_Trip,
            'ID_User' => $request->ID_User,
        ];
        tiket::where('ID_Tiket', $id)->update($data);
        return redirect()->to('tiket')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        tiket::where('ID_Tiket', $id)->delete();
        return redirect()->to('tiket')->with('success', 'Berhasil melakukan delete data');
    }
}
