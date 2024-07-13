<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;

class Pegawai_API extends Controller
{
    //
    public function index()
{
    $pegawai = Pegawai::all();
    return response()->json(['pegawai' => $pegawai], 200);
}

}
