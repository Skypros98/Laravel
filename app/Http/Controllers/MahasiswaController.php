<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view ("mahasiswa.create")->with("prodi",$prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "foto" => "required|image",
            "prodi_id" => "required"
        ]);

        //ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        //rename file to npm.extensi
        $validasi["foto"] = $request->npm.".".$ext;
        //upload foto kedalam folder public
        $request->foto->move(public_path('foto'), $validasi["foto"]);

        //simpan data
        Mahasiswa::create($validasi);
        return redirect("mahasiswa")->with("success","Data Mahasiswa Berhasil di Simpan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view("mahasiswa.edit")->with("mahasiswa", $mahasiswa)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validasi = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "image|nullable",
            "prodi_id" => "required"
        ]);

        //ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        //rename file to npm.extensi
        $validasi["foto"] = $request->npm.".".$ext;
        //upload foto kedalam folder public
        $request->foto->move(public_path('foto'), $validasi["foto"]);

        //simpan data
        $mahasiswa->update($validasi);
        return redirect("mahasiswa")->with("success","Data Mahasiswa Berhasil di Simpan!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route("mahasiswa.index")->with("success","Berhasil dihapus");
    }
}
