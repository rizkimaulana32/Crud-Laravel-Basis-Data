<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = user::where('ID_User', 'like', "%$katakunci%")
                ->orWhere('Nama_User', 'like', "%$katakunci%")
                ->orWhere('Sex', 'like', "%$katakunci%")
                ->orWhere('Email', 'like', "%$katakunci%")
                ->orWhere('ID_Kota', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = user::orderBy('ID_User', 'desc')->paginate($jumlahbaris);
        }
        return view('user.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('ID_User', $request->ID_User);
        Session::flash('Nama_User', $request->Nama_User);
        Session::flash('Sex', $request->Sex);
        Session::flash('Email', $request->Email);
        Session::flash('ID_Kota', $request->ID_Kota);

        $request->validate([
            'ID_User' => 'required|numeric|unique:user,ID_User',
            'Nama_User' => 'required',
            'Sex' => 'required',
            'Email' => 'required',
            'ID_Kota' => 'required|exists:kota,ID_Kota',
        ], [
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.numeric' => 'ID_User wajib dalam angka',
            'ID_User.unique' => 'ID_User yang diisikan sudah ada dalam database',
            'Nama_User.required' => 'Nama_User wajib diisi',
            'Sex.required' => 'Sex wajib diisi',
            'Email.required' => 'Email wajib diisi',
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.exists' => 'ID_Kota tidak valid',
        ]);
        $data = [
            'ID_User' => $request->ID_User,
            'Nama_User' => $request->Nama_User,
            'Sex' => $request->Sex,
            'Email' => $request->Email,
            'ID_Kota' => $request->ID_Kota,
        ];
        user::create($data);
        return redirect()->to('user')->with('success', 'Berhasil menambahkan data');
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
        $data = user::where('ID_User', $id)->first();
        return view('user.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ID_User' => [
                'required','numeric:user,ID_User',
                Rule::unique('user')->ignore($id, 'ID_User'),
            ],
            'Nama_User' => 'required',
            'Sex' => 'required',
            'Email' => 'required',
            'ID_Kota' => 'required|exists:kota,ID_Kota',
        ], [
            'ID_User.required' => 'ID_User wajib diisi',
            'ID_User.numeric' => 'ID_User wajib dalam angka',
            'ID_User.unique' => 'ID_User yang diisikan sudah ada dalam database',
            'Nama_User.required' => 'Nama_User wajib diisi',
            'Sex.required' => 'Sex wajib diisi',
            'Email.required' => 'Email wajib diisi',
            'ID_Kota.required' => 'ID_Kota wajib diisi',
            'ID_Kota.exists' => 'ID_Kota tidak valid',
        ]);
        $data = [
            'ID_User' => $request->ID_User,
            'Nama_User' => $request->Nama_User,
            'Sex' => $request->Sex,
            'Email' => $request->Email,
            'ID_Kota' => $request->ID_Kota,
        ];
        user::where('ID_User', $id)->update($data);
        return redirect()->to('user')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::where('ID_User', $id)->delete();
        return redirect()->to('user')->with('success', 'Berhasil melakukan delete data');
    }
}
