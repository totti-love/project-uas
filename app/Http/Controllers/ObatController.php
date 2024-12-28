<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
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
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
    }
    public function getObat(){
        $response['data'] = Obat::all();
        $response['message'] = 'List data Obat';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function getObatById($id)
    {
        // Cari obat berdasarkan ID
        $obat = Obat::find($id);

        // Jika tidak ditemukan, kembalikan respon error
        if (!$obat) {
            return response()->json([
                'message' => 'Obat tidak ditemukan',
            ], 404);
        }

        // Kembalikan data obat
        return response()->json($obat, 200);
    }


    public function storeObat(Request $request){
        // validasi input
        $input = $request->validate([
            "kode"      => "required|unique:obats",
            "nama" => "required",
            "jumlah" => "required"
        ]);

        // simpan
        $hasil = Obat::create($input);
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

    public function destroyObat($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $Obat = Obat::find($id);
        // dd($Obat);
        $hasil = $Obat->delete();
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Obat berhasil dihapus";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Obat gagal dihapus";
            return response()->json($response, 400);
        }
    }

    public function updateObat(Request $request, $id)
    {
        $Obat = Obat::find($id);
       
        // validasi input
        $input = $request->validate([
            "kode"      => "required|unique:obats",
            "nama" => "required",
            "jumlah" => "required"
        ]);

        // update data
        $hasil = $Obat->update($input);

        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Obat berhasil diubah";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Obat gagal diubah";
            return response()->json($response, 400);
        }
    }

}
