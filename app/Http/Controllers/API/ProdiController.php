<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        if ($prodi->isEmpty()) {
            $response['message'] = 'Tidak ada Prodi yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Prodi ditemukan.';
        $response['data'] = $prodi;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required|unique:prodis",
            "fakultas_id" => "required",
        ]);

        $prodi = Prodi::create($validate);
        if ($prodi) {
            $response['success'] = true;
            $response['message'] = 'Prodi berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
}
