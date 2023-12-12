<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        return response()->json($prodi, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view("prodi.create")->with("fakultas", $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Prodi::class);

        $validasi = $request->validate([
            "nama" => "required|unique:prodis",
            "fakultas_id" => "required"
        ]);

        Prodi::create($validasi);
        return redirect("prodi")->with("success", "Data Prodi Berhasil di Simpan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view("prodi.edit")->with("prodi", $prodi)->with("fakultas", $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validasi = $request->validate([
            "nama" => "required",
            "fakultas_id" => "required"
        ]);

        $prodi->update($validasi);
        return redirect("prodi")->with("success", "Data Prodi barhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route("prodi.index")->with("success", "Berhasil dihapus");
    }
}
