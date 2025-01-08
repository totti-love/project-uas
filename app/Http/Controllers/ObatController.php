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


public function storeObat(Request $request)
{
    // Validasi input tanpa kode karena akan dibuat otomatis
    $input = $request->validate([
        "nama"   => "required",
        "jumlah" => "required|integer|min:1"
    ]);

    // Buat kode otomatis
    $latestRecord = Obat::latest('id')->first(); // Ambil data terakhir
    $nextNumber = $latestRecord ? ((int)substr($latestRecord->kode, 2) + 1) : 1; // Hitung nomor urut berikutnya
    $kode = 'OB' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // Format kode (OB0001, OB0002, ...)

    // Tambahkan kode ke input
    $input['kode'] = $kode;

    // Simpan data ke database
    $hasil = Obat::create($input);

    // Respon berdasarkan hasil penyimpanan
    if ($hasil) {
        $response['success'] = true;
        $response['message'] = $request->nama . " berhasil disimpan dengan kode " . $kode;
        return response()->json($response, 201); // 201 Created
    } else {
        $response['success'] = false;
        $response['message'] = $request->nama . " gagal disimpan";
        return response()->json($response, 400); // 400 Bad Request
    }
}


    public function destroyObat($id)
    {
        // cari data di tabel fakultas berdasarkan "id" fakultas
        $obat = Obat::find($id);
        // dd($Obat);
        $hasil = $obat->delete();
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
        $obat = Obat::find($id);
       
        // validasi input
        $input = $request->validate([
            "kode"      => "required",
            "nama" => "required",
            "jumlah" => "required"
        ]);

        // update data
        $hasil = $obat->update($input);

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
