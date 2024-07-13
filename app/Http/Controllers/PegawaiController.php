<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $data = Pegawai::all();
            Carbon::setLocale('id');
            return view('pegawai.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request data
         $validatedData = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'asal_kota' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Create a new Pegawai instance
        $pegawai = new Pegawai();
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->alamat = $request->asal_kota;
        $pegawai->provinsi = $request->provinsi;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->NIK = mt_rand(10000, 99999); // Menghasilkan nomor acak antara 10000 dan 99999\
        $pegawai->save();
    
        return response()->json([
            'message' => 'Data pegawai berhasil ditambahkan',
            'data' => $pegawai
        ], 201);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pegawai::find($id);
        $data->IsDelete = 1;
        $data->save();

        
        $isDelete = true; 

        return response()->json(['isDelete' => $isDelete]);
        return redirect('/')->with('hapus', 'Pengaduan berhasil dihapus.');
    }
}
