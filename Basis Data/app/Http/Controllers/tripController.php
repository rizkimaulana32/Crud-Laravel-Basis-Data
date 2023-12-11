<?php

namespace App\Http\Controllers;

use App\Models\trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = trip::where('ID_Trip', 'like', "%$katakunci%")
                ->orWhere('Nama_Trip', 'like', "%$katakunci%")
                ->orWhere('Jenis_Trip', 'like', "%$katakunci%")
                ->orWhere('ID_User', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = trip::orderBy('ID_Trip', 'desc')->paginate($jumlahbaris);
        }
        return view('trip.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_Trip', $request->ID_Trip);
        Session::flash('Nama_Trip', $request->Nama_Trip);
        Session::flash('Jenis_Trip', $request->Jenis_Trip);
        Session::flash('ID_User', $request->ID_User);

        $request->validate([
            'ID_Trip' => 'required|numeric|unique:trip,ID_Trip',
            'Nama_Trip' => 'required',
            'Jenis_Trip' => 'required',
            'ID_User' => 'required|exists:user,ID_User',
        ], [
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.numeric' => 'ID_Trip wajib dalam angka',
            'ID_Trip.unique' => 'ID_Trip yang diisikan sudah ada dalam database',
            'Nama_Trip.required' => 'Nama_Trip wajib diisi',
            'Jenis_Trip.required' => 'Jenis_Trip wajib diisi',
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.exists' => 'ID_User tidak valid',
        ]);
        $data = [
            'ID_Trip' => $request->ID_Trip,
            'Nama_Trip' => $request->Nama_Trip,
            'Jenis_Trip' => $request->Jenis_Trip,
            'ID_User' => $request->ID_User,
        ];
        trip::create($data);
        return redirect()->to('trip')->with('success', 'Berhasil menambahkan data');
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
        $data = trip::where('ID_Trip', $id)->first();
        return view('trip.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_Trip' => 'required|numeric|unique:trip,ID_Trip',
            'Nama_Trip' => 'required',
            'Jenis_Trip' => 'required',
            'ID_User' => 'required|exists:user,ID_User',
        ], [
            'ID_Trip.required' => 'ID_Trip wajib diisi',
            'ID_Trip.numeric' => 'ID_Trip wajib dalam angka',
            'ID_Trip.unique' => 'ID_Trip yang diisikan sudah ada dalam database',
            'Nama_Trip.required' => 'Nama_Trip wajib diisi',
            'Jenis_Trip.required' => 'Jenis_Trip wajib diisi',
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.exists' => 'ID_User tidak valid',
        ]);
        $data = [
            'ID_Trip' => $request->ID_Trip,
            'Nama_Trip' => $request->Nama_Trip,
            'Jenis_Trip' => $request->Jenis_Trip,
            'ID_User' => $request->ID_User,
        ];
        trip::where('ID_Trip', $id)->update($data);
        return redirect()->to('trip')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        trip::where('ID_Trip', $id)->delete();
        return redirect()->to('trip')->with('success', 'Berhasil melakukan delete data');
    }
}
