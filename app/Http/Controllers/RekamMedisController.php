<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
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
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }

    public function getRekamMedis(){
        $response['data'] = RekamMedis::all();
        $response['data'] = RekamMedis::with('kunjungan')->get();
        $response['data'] = RekamMedis::with('obat')->get();
        $response['message'] = 'List data Rekam Medis';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function getRekamMedisById($id)
    {
        // Cari obat berdasarkan ID
        $rekamMedis = RekamMedis::find($id);

        // Jika tidak ditemukan, kembalikan respon error
        if (!$rekamMedis) {
            return response()->json([
                'message' => 'Rekam Medis tidak ditemukan',
            ], 404);
        }

        // Kembalikan data rekamMedis
        return response()->json($rekamMedis, 200);
    }

    public function storeRekamMedis(Request $request){
        // validasi input
        $input = $request->validate([
            "kode"      => "required",
            "tanggal"   => "required", 
            "kunjungan_id" => "required",
            "obat_id" => "required"
        ]);

        // simpan
        $hasil = RekamMedis::create($input);
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->kode." berhasil disimpan";
            return response()->json($response, 201); // 201 Created
        } else {
            $response['success'] = false;
            $response['message'] = $request->kode." gagal disimpan";
            return response()->json($response, 400); // 400 Bad Request
        }
    }

    public function destroyRekamMedis($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $rekamMedis = RekamMedis::find($id);
        // dd($rekamMedis);
        $hasil = $rekamMedis->delete();
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Rekam Medis berhasil dihapus";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Rekam Medis gagal dihapus";
            return response()->json($response, 400);
        }
    }

    public function updateRekamMedis(Request $request, $id)
    {
        $rekamMedis = RekamMedis::find($id);
       
        // validasi input
        $input = $request->validate([
            "kode"      => "required",
            "tanggal"   => "required", 
            "kunjungan_id" => "required",
            "obat_id" => "required"
        ]);

        // update data
        $hasil = $rekamMedis->update($input);

        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Rekam Medis berhasil diubah";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Rekam Medis gagal diubah";
            return response()->json($response, 400);
        }
    }
    
}
