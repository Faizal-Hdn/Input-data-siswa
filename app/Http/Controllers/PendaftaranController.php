<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('no_pendaftaran', 'desc')->first();
        return view('daftar', compact('siswa'));
    }

    public function create()
    {
        $agama = Agama::orderBy('id', 'asc')->paginate(10);
        return view('create', compact('agama'));
    }

    public function edit($no_pendaftaran)
    {
    // Find the student by 'no_pendaftaran'
    $siswa = Siswa::where('no_pendaftaran', $no_pendaftaran)->first();

    // If the student is not found, you can redirect or handle the error
    if (!$siswa) {
        return redirect()->route('siswa.index')->with('error', 'Student not found');
    }

    return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $no_pendaftaran)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
    
        // Find the student using 'no_pendaftaran'
        $siswa = Siswa::where('no_pendaftaran', $no_pendaftaran)->first();
    
        // If the student is not found, return an error
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Student not found');
        }
    
        // Update the student's data
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->save();
    
        // Redirect with a success message
        return redirect()->route('siswa.index')->with('success', 'Student updated successfully');
    }

    // store data todatabase
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->agama_id = $request->agama_id;
        $siswa->nilai_ind = $request->nilai_ind;
        $siswa->nilai_ipa = $request->nilai_ipa;
        $siswa->nilai_mtk = $request->nilai_mtk;
        $siswa->save();
        return redirect()->route('siswa.index')->with('success', 'Anggota has been created successfully.');
    }
}