<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
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
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        //
    }

    public function getKunjungan(){
        $response['data'] = Kunjungan::all();
        $response['data'] = Kunjungan::with('pasien')->get();
        $response['data'] = Kunjungan::with('dokter')->get();
        $response['message'] = 'List data kunjungan';
        $response['success'] = true;

        return response()->json($response, 200);
    }

    public function storeKunjungan(Request $request){
        // validasi input
        $input = $request->validate([
            "kode"      => "required|unique:kunjungans",
            "tanggal"   => "required", 
            "pasien_id" => "required",
            "dokter_id" => "required"
        ]);

        // simpan
        $hasil = Kunjungan::create($input);
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

    public function destroyKunjungan($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $kunjungan = Kunjungan::find($id);
        // dd($kunjungan);
        $hasil = $kunjungan->delete();
        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Kunjungan berhasil dihapus";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Kunjungan gagal dihapus";
            return response()->json($response, 400);
        }
    }

    public function updateKunjungan(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
       
        // validasi input
        $input = $request->validate([
            "kode"      => "required|unique:kunjungans",
            "tanggal"   => "required", 
            "pasien_id" => "required",
            "dokter_id" => "required"
        ]);

        // update data
        $hasil = $kunjungan->update($input);

        if($hasil){ // jika data berhasil disimpan
            $response['success'] = true;
            $response['message'] = "Data Kunjungan berhasil diubah";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['message'] = "Data Kunjungan gagal diubah";
            return response()->json($response, 400);
        }
    }
}

