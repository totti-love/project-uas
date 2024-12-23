<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Panggil model Fakultas
        $result = Dokter::all();
        // dd($result);

        // Kirim data $result ke views fakultas/index.blade.php
        return view('dokter.index')->with('dokter', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        //
    }

    public function getDokter(){
        $response['data'] = Dokter::all();
        $response['message'] = 'List data dokter';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function storeDokter(Request $request){
        // validasi input
        $input = $request->validate([
            "nama"      => "required",
            "keahlian"     => "required",
            "jenis_kelamin" => "required"
        ]);

        // simpan
        $hasil = Dokter::create($input);
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

    public function destroyDokter($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $dokter = Dokter::find($id);
        // dd($dokter);
        $hasil = $dokter->delete();
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Dokter berhasil dihapus";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Dokter gagal dihapus";
            return response()->json($response, 400);
        }
    }

    public function updateDokter(Request $request, $id)
    {
        $dokter = Dokter::find($id);
       
        // validasi input
        $input = $request->validate([
            "nama"      => "required",
            "keahlian"     => "required",
            "jenis_kelamin" => "required"
        ]);

        // update data
        $hasil = $dokter->update($input);

        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Dokter berhasil diubah";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Dokter gagal diubah";
            return response()->json($response, 400);
        }
    }
}
