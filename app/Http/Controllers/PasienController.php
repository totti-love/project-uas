<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }

    public function getPasien(){
        $response['data'] = Pasien::all();
        $response['message'] = 'List data Pasien';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function getPasienById($id)
    {
        // Cari obat berdasarkan ID
        $pasien = Pasien::find($id);

        // Jika tidak ditemukan, kembalikan respon error
        if (!$pasien) {
            return response()->json([
                'message' => 'pasien tidak ditemukan',
            ], 404);
        }

        // Kembalikan data pa$pasien
        return response()->json($pasien, 200);
    }

    public function storePasien(Request $request){
        // validasi input
        $input = $request->validate([
            "nama"      => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "alamat"     => "required",
            "no_telp"     => "required"
        ]);

        // simpan
        $hasil = Pasien::create($input);
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama." berhasil disimpan";
            return response()->json($response, 201); // 201 Created
        } else {
            $response['success'] = false;
            $response['message'] = $request->nama." gagal disimpan";
            return response()->json($response, 400); // 400 Bad Request
        }
    }

    public function destroyPasien($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $Pasien = Pasien::find($id);
        // dd($Pasien);
        $hasil = $Pasien->delete();
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Pasien berhasil dihapus";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Pasien gagal dihapus";
            return response()->json($response, 400);
        }
    }

    public function updatePasien(Request $request, $id)
    {
        $Pasien = Pasien::find($id);
       
        // validasi input
        $input = $request->validate([
            "nama"      => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "alamat"     => "required",
            "no_telp"     => "required"
        ]);

        // update data
        $hasil = $Pasien->update($input);

        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Pasien berhasil diubah";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Pasien gagal diubah";
            return response()->json($response, 400);
        }
    }
}
