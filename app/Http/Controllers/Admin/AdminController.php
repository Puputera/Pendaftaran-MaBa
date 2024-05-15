<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MahasiswaModel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function data()
    {
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('admin.data', ['mahasiswa' => $mahasiswa]);
    }
    public function pendaftaran()
    {
        // $mahasiswa = DB::table('mahasiswa')->get();
        $mahasiswa = MahasiswaModel::where('status', 'diterima')->get();

        return view('admin.pendaftaran', ['mahasiswa' => $mahasiswa]);
    }

    public function updateStatus(Request $request)
    {
        $mahasiswa = MahasiswaModel::where('id', $request->id)->first();
        $mahasiswa->update([
            'status' => $request->status
        ]);
        return redirect()->back();
    }
}
