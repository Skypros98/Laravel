<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        if ($mahasiswa->isEmpty()) {
            $response['message'] = 'Tidak ada Mahasiswa yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Mahasiswa ditemukan.';
        $response['data'] = $mahasiswa;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "foto" => "required|image",
            "prodi_id" => "required"
        ]);

        $mahasiswa = Mahasiswa::create($validate);
        if ($mahasiswa) {
            $response['success'] = true;
            $response['message'] = 'Mahasiswa berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
}
