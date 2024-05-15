<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('user.mahasiswa');
    }
    public function pmb()
    {
        $mahasiswa = MahasiswaModel::where('user_id', auth()->user()->id)->get();

        return view('user.pmb', ['mahasiswa' => $mahasiswa]);
    }
    public function create(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'nama_mhs' => $request->nama_mhs,
            'alamat_mhs'  => $request->alamat_mhs,
            'email'  => $request->email,
            'no_telp'  => $request->no_telp,
            'prodi'  => $request->prodi,
        ];

        MahasiswaModel::create($data);
        return redirect()->route('user.pmb');
    }
}
