<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SparepartController extends Controller
{



    public function lihat($key)
{
    // Simulasi data tanpa database
    $licenses = [
        // Data lisensi pertama
        [
            'id' => 'BC03A2F9-A3C3-4392-9801-9459E151E5C0',
            'price' => 0,
            'license_price_id' => 110,
            'author_id' => 14,
            'buyer_id' => null,
            'expired_date' => 1716380434,
            'comment' => 'partner Tahiti',
            'order_detail_id' => null,
            'max_window' => 1,
            'price_usd' => 0,
            'enable' => 1,
            'duration' => 1,
            'created_at' => 1713788443,
            'updated_at' => 1713788443,
            'author' => [
                'id' => 14,
                'role_id' => 11,
                'name' => null,
                'username' => null,
                'email' => 'thanhloan071196@gmail.com',
                'phone' => null,
                'avatar' => 'users/default.png',
                'email_verified_at' => null
            ]
        ],
        // Data lisensi kedua, dst.
    ];

    // Cari lisensi yang sesuai dengan kunci yang diberikan
    $foundLicense = null;
    foreach ($licenses as $license) {
        if ($license['id'] === $key) {
            $foundLicense = $license;
            break;
        }
    }

    if ($foundLicense === null) {
        // Jika lisensi tidak ditemukan, kirim respons error
        return response()->json(['error' => 'Data lisensi tidak ditemukan'], 404);
    }

    // Jika lisensi ditemukan, kirim respons dengan lisensi yang sesuai
    return response()->json(['license' => $foundLicense]);
}










    public function index()
    {
        $data = Sparepart::all();

        return response()->json([
           'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = new Sparepart();

        $rules = [
            "name" => "required",
            "category" => "required",
            "harga" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->category = $request->category;
        $data->harga = $request->harga;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sparepart::find($id);
        
        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Sparepart::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update'
            ], 404);
        }

        $rules = [
            "name" => "required",
            "category" => "required",
            "harga" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan update',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->category = $request->category;
        $data->harga = $request->harga;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sparepart::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 201);
    }




}
